<?php
declare(strict_types=1);
require_once "funkcie.php";
require_once "Osoba.php";

echo "Ahoj svet!";

echo "<br>";

for ($i = 1; $i <= 10; $i++) {
    echo "$i<br>\n";
}

for ($i = 1; $i <= 10; $i++) {
    echo "$i! = " . faktorial($i) . "<br>";
}


foreach (Osoba::loadFromCSV("data/osoby.csv") as $osoba) {
    var_dump($osoba);
}

