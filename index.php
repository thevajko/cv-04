<?php
    // needed imports
    include "inc/factorial.php";
    include "inc/Person.php";
    include "inc/PersonsLoader.php";
    include "inc/PersonsStats.php";
    include "inc/PersonTable.php";

for ($i=0; $i < 10; $i++) {
    echo "## Riadok č.".($i+1),"\n";
}

echo "\n\nFaktoriál 12 je ".factorial(12)."\n";

// get value of sorting order
$sortingOrder = (int)(isset($_GET['order']) ? $_GET['order'] : -1);

// loads all persons from file
$persons = PersonsLoader::loadPersonsFromCSV("data/osoby.csv");

$t = new PersonTable();
// tables render
echo "\n\nNEZORADENA\n";
$t->renderTable($persons);
echo "\n\nZORADENA\n";
$t->renderTable($persons, true);


$youngest = PersonsStats::getYoungest($persons);
$oldest = PersonsStats::getOldest($persons);
$maleFemaleCounts = PersonsStats::getMaleFemaleCounts($persons);
$mostCommonYear =  PersonsStats::getMostCommonYear($persons);

// stats render
echo "\n\n### Štatistiky ###\n";
echo "Najmladšia osoba je {$youngest->getSurname()}, {$youngest->getName()} ({$youngest->getYear()}).\n";
echo "Najstašia osoba je{$oldest->getSurname()}, {$oldest->getName()} ({$oldest->getYear()}).\n";
echo "Počet mužov/žien {$maleFemaleCounts['m']}/{$maleFemaleCounts['f']}.\n";
echo "Najviac osôb sa narodilo v roku {$mostCommonYear[0]} a to {$mostCommonYear[1]}.\n";