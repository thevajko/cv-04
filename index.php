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