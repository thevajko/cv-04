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