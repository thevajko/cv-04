<?php
require_once 'Osoba.php';

echo "Ahoj svet!\n";

for ($i = 0; $i < 10; $i++) {
    echo "Cislo: " . $i . "<br>\n";
}

function faktorial(int $n) : int {
    if ($n <= 1) {
        return 1;
    }
    return $n * faktorial($n - 1);
}

$n = 20;
echo "Faktorial $n je: " . faktorial($n) . "\n";

$osoby = Osoba::nacitajOsoby("data/osoby.csv");

//vypise pocet osob
echo "Pocet osob: " . count($osoby) . "\n";
