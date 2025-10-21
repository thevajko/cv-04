<?php

include "inc/funkcie.php";
require_once "inc/OsobaLoader.php";
require_once "inc/OsobaTableRenderer.php";

$premenna = "Hello World!";

echo "Ahoj svet! {$premenna} 65465";

// Print factorials from 0 to 10
for ($i = 0; $i <= 10; $i++) {
    $fact = factorial($i);
    if ($fact === null) {
        echo "<p>{$i}! = (invalid)</p>";
    } else {
        echo "<p>{$i}! = {$fact}</p>";
    }
}

// Načítanie osôb a zobrazenie tabuľky
$osoby = OsobaLoader::loadFromCsv(__DIR__ . '/data/osoby.csv');
echo '<h2>Zoznam osôb</h2>';
echo OsobaTableRenderer::renderTable($osoby);
