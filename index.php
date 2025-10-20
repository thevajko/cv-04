<?php
require_once 'Person.php';


echo "Ahoj svet!";

for ($i = 1; $i <= 10; $i++) {
    echo "\nCislo: " . $i . "</br>";
}

echo "<hr>";
$n = 10;
echo "Faktorial cisla $n je: " . faktorial($n);

function faktorial(int $n)
{
    if ($n <= 1) {
        return 1;
    } else {
        return $n * faktorial($n - 1);
    }
}

$people = Person::readFromCSV('data/osoby.csv');

foreach ($people as $person) {
    echo "<p>" . $person->getFullName() . " (" . $person->getSex() . ", " . $person->getYearOfBirth() . ")</p>";
}

function printPeopleTable(array $people): void
{
    // compute maximum widths per column (multibyte-safe)
    $firstLen = 0;
    $lastLen = 0;
    $yearLen = 0;
    $sexLen = 0;

    foreach ($people as $p) {
        $full = $p->getFullName() ?? '';
        $parts = preg_split('/\s+/', trim($full), 2);
        $first = $parts[0] ?? '';
        $last = $parts[1] ?? '';

        $firstLen = max($firstLen, mb_strlen($first, 'UTF-8'));
        $lastLen  = max($lastLen, mb_strlen($last, 'UTF-8'));
        $yearStr  = (string)$p->getYearOfBirth();
        $yearLen  = max($yearLen, mb_strlen($yearStr, 'UTF-8'));
        $sexLen   = max($sexLen, mb_strlen((string)$p->getSex(), 'UTF-8'));
    }

    // ensure minimum widths (avoid zero)
    $firstLen = max(1, $firstLen);
    $lastLen  = max(1, $lastLen);
    $yearLen  = max(1, $yearLen);
    $sexLen   = max(1, $sexLen);

    // helper for mb-safe right padding/truncation
    $padRight = function (string $s, int $width): string {
        $s = (string)$s;
        $len = mb_strlen($s, 'UTF-8');
        if ($len > $width) {
            return mb_substr($s, 0, $width, 'UTF-8');
        }
        if ($len === $width) {
            return $s;
        }
        return $s . str_repeat(' ', $width - $len);
    };

    $total = $firstLen + $lastLen + $yearLen + $sexLen + 5; // 4 separators and leading/trailing |
    $border = str_repeat('-', $total);

    echo "<pre>{$border}\n";
    foreach ($people as $p) {
        $full = $p->getFullName() ?? '';
        $parts = preg_split('/\s+/', trim($full), 2);
        $first = $parts[0] ?? '';
        $last  = $parts[1] ?? '';

        $firstP = $padRight($first, $firstLen);
        $lastP  = $padRight($last, $lastLen);
        $yearP  = $padRight((string)$p->getYearOfBirth(), $yearLen);
        $sexP   = $padRight((string)$p->getSex(), $sexLen);

        echo "|{$firstP}|{$lastP}|{$yearP}|{$sexP}|\n";
    }
    echo "{$border}</pre>";
}

// call this instead of the original foreach
printPeopleTable($people);

function printStatistics(array $people): void
{
    // sexes normalized and counted using array_map + array_count_values
    $normalizedSexes = array_map(fn($p) => mb_strtolower(trim($p->getSex()), 'UTF-8'), $people);
    $normalizedSexes = array_map(fn($s) => $s === 'm' ? 'm' : ($s === 'f' ? 'f' : 'other'), $normalizedSexes);
    $sexCounts = array_count_values($normalizedSexes);
    $mCount = $sexCounts['m'] ?? 0;
    $fCount = $sexCounts['f'] ?? 0;
    $oCount = $sexCounts['other'] ?? 0;

    // extract valid years (integers) using array_map + array_filter
    $yearsRaw = array_map(fn($p) => trim((string)$p->getYearOfBirth()), $people);
    $validYears = array_filter($yearsRaw, fn($y) => is_numeric($y) && (int)$y > 0 && (int)$y < 3000);
    $validYears = array_map(fn($y) => (int)$y, $validYears);

    echo "<h2>Štatistiky</h2>";
    echo "<pre>";

    if (empty($validYears)) {
        echo "Žiadne platné údaje o roku narodenia.\n";
        echo "\nPočet podľa pohlavia:\n";
        echo "  muži: {$mCount}\n";
        echo "  ženy:  {$fCount}\n";
        if ($oCount > 0) echo "  iné:   {$oCount}\n";
        echo "</pre>";
        return;
    }

    // youngest = max year, oldest = min year
    $youngestYear = max($validYears);
    $oldestYear = min($validYears);

    // find persons born in those years using array_filter
    $youngestPeople = array_values(array_filter($people, fn($p) => (int)trim($p->getYearOfBirth()) === $youngestYear));
    $oldestPeople = array_values(array_filter($people, fn($p) => (int)trim($p->getYearOfBirth()) === $oldestYear));

    echo "Najmladšia osoba(yi) - rok: {$youngestYear}\n";
    foreach ($youngestPeople as $p) {
        echo "  - " . $p->getFullName() . " (" . $p->getYearOfBirth() . ")\n";
    }

    echo "\nNajstaršia osoba(yi) - rok: {$oldestYear}\n";
    foreach ($oldestPeople as $p) {
        echo "  - " . $p->getFullName() . " (" . $p->getYearOfBirth() . ")\n";
    }

    // sex counts
    echo "\nPočet podľa pohlavia:\n";
    echo "  muži: {$mCount}\n";
    echo "  ženy:  {$fCount}\n";
    if ($oCount > 0) echo "  iné:   {$oCount}\n";

    // year with most births using array_count_values + max
    $countsByYear = array_count_values($validYears);
    $maxCount = max($countsByYear);
    $mostYears = array_keys(array_filter($countsByYear, fn($c) => $c === $maxCount));
    sort($mostYears);

    echo "\nRok(y) s najväčším počtom narodení ({$maxCount}): " . implode(', ', $mostYears) . "\n";

    echo "</pre>";
}

// print statistics for the current (unsorted) list
printStatistics($people);

// --- HTML outputs: table + statistics ---
function escapeHtml(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function printPeopleHTMLTable(array $people): void
{
    echo "<h2>People (HTML table)</h2>\n";
    echo "<table border=\"1\" cellpadding=\"4\" cellspacing=\"0\">\n";
    echo "  <thead><tr><th>First</th><th>Last</th><th>Year</th><th>Sex</th></tr></thead>\n";
    echo "  <tbody>\n";
    foreach ($people as $p) {
        $full = $p->getFullName() ?? '';
        $parts = explode(' ', trim($full), 2);
        $first = $parts[0] ?? '';
        $last = $parts[1] ?? '';
        echo "    <tr>";
        echo "<td>" . escapeHtml($first) . "</td>";
        echo "<td>" . escapeHtml($last) . "</td>";
        echo "<td>" . escapeHtml((string)$p->getYearOfBirth()) . "</td>";
        echo "<td>" . escapeHtml((string)$p->getSex()) . "</td>";
        echo "</tr>\n";
    }
    echo "  </tbody>\n";
    echo "</table>\n";
}

function printStatisticsHTML(array $people): void
{
    // reuse functional-style calculations from printStatistics
    $normalizedSexes = array_map(fn($p) => mb_strtolower(trim($p->getSex()), 'UTF-8'), $people);
    $normalizedSexes = array_map(fn($s) => $s === 'm' ? 'm' : ($s === 'f' ? 'f' : 'other'), $normalizedSexes);
    $sexCounts = array_count_values($normalizedSexes);
    $mCount = $sexCounts['m'] ?? 0;
    $fCount = $sexCounts['f'] ?? 0;
    $oCount = $sexCounts['other'] ?? 0;

    $yearsRaw = array_map(fn($p) => trim((string)$p->getYearOfBirth()), $people);
    $validYears = array_filter($yearsRaw, fn($y) => is_numeric($y) && (int)$y > 0 && (int)$y < 3000);
    $validYears = array_map(fn($y) => (int)$y, $validYears);

    echo "<h2>Štatistiky (HTML)</h2>\n";

    if (empty($validYears)) {
        echo "<p>Žiadne platné údaje o roku narodenia.</p>\n";
        echo "<p>Počet podľa pohlavia: muži: " . $mCount . ", ženy: " . $fCount . (
            $oCount > 0 ? (", iné: " . $oCount) : "") . "</p>\n";
        return;
    }

    $youngestYear = max($validYears);
    $oldestYear = min($validYears);
    $youngestPeople = array_values(array_filter($people, fn($p) => (int)trim($p->getYearOfBirth()) === $youngestYear));
    $oldestPeople = array_values(array_filter($people, fn($p) => (int)trim($p->getYearOfBirth()) === $oldestYear));

    echo "<h3>Najmladší (rok {$youngestYear})</h3>\n<ul>\n";
    foreach ($youngestPeople as $p) {
        echo "<li>" . escapeHtml($p->getFullName()) . " (" . escapeHtml($p->getYearOfBirth()) . ")</li>\n";
    }
    echo "</ul>\n";

    echo "<h3>Najstarší (rok {$oldestYear})</h3>\n<ul>\n";
    foreach ($oldestPeople as $p) {
        echo "<li>" . escapeHtml($p->getFullName()) . " (" . escapeHtml($p->getYearOfBirth()) . ")</li>\n";
    }
    echo "</ul>\n";

    echo "<p>Počet podľa pohlavia: muži: " . $mCount . ", ženy: " . $fCount . (
        $oCount > 0 ? (", iné: " . $oCount) : "") . "</p>\n";

    $countsByYear = array_count_values($validYears);
    $maxCount = max($countsByYear);
    $mostYears = array_keys(array_filter($countsByYear, fn($c) => $c === $maxCount));
    sort($mostYears);
    echo "<p>Rok(y) s najväčším počtom narodení ({$maxCount}): " . escapeHtml(implode(', ', $mostYears)) . "</p>\n";
}

// output HTML versions as well
printPeopleHTMLTable($people);
printStatisticsHTML($people);

usort($people, function (Person $a, Person $b) {
    return strcmp($a->getLastName(), $b->getLastName());
});

printPeopleTable($people);

