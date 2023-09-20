<?php
    // needed imports
    include "inc/factorial.php";
    include "inc/Person.php";
    include "inc/PersonsLoader.php";
    include "inc/PersonSorter.php";
    include "inc/PersonsStats.php";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        table {
            border: 1px;
        }
    </style>
</head>
<body>

<?php for ($i=0; $i < 10; $i++) { ?>
    <h2>Toto je nadpis č. <?php echo $i+1 ?></h2>
<?php } ?>
Faktoriál 12 je <?php echo factorial(12) ?>.

<?php

// get value of sorting order
$sortingOrder = (int)(isset($_GET['order']) ? $_GET['order'] : -1);

// loads all persons from file
$persons = PersonsLoader::loadPersonsFromCSV("data/osoby.csv");
// sorts the persons in array
$persons = PersonSorter::sort($persons, isset($_GET['sort']) ? $_GET['sort'] : "s", $sortingOrder );

// invert order, so it will be possible to using reverse order
$sortingOrder = $sortingOrder == 1 ? -1 : 1;
?>
<table>
    <tr>
        <th><a href="?sort=surname&order=<?php echo $sortingOrder ?>">Priezvisko</a></th>
        <th><a href="?sort=name&order=<?php echo $sortingOrder ?>">Meno</a></th>
        <th><a href="?sort=year&order=<?php echo $sortingOrder ?>">Rok narodenia</a></th>
        <th><a href="?sort=year&order=<?php echo $sortingOrder ?>">Vek</a></th>
        <th><a href="?sort=sex&order=<?php echo $sortingOrder ?>">Pohlavie</a></th>
    </tr>
    <?php foreach ($persons as $person) { ?>
        <tr>
            <td><?php echo $person->getSurname() ?></td>
            <td><?php echo $person->getName() ?></td>
            <td><?php echo $person->getYear() ?></td>
            <td><?php echo date("Y") - $person->getYear() ?></td>
            <td><?php echo $person->getSex() == "f" ? "žena" : "muž" ?></td>
        </tr>
    <?php } ?>
</table>
<?php
$youngest = PersonsStats::getYoungest($persons);
$oldest = PersonsStats::getOldest($persons);
$maleFemaleCounts = PersonsStats::getMaleFemaleCounts($persons);
$mostCommonYear =  PersonsStats::getMostCommonYear($persons);
?>

<h2>Štatistiky</h2>

Najmladšia osoba je <?php echo "{$youngest->getSurname()}, {$youngest->getName()} ({$youngest->getYear()})" ?>.
Najstašia osoba je <?php echo "{$oldest->getSurname()}, {$oldest->getName()} ({$oldest->getYear()})" ?>.

Počet mužov/žien <?php echo "{$maleFemaleCounts['m']}/{$maleFemaleCounts['f']}" ?>.

Najviac osôb sa narodilo v roku <?php echo "{$mostCommonYear[0]} a to {$mostCommonYear[1]}" ?>.


</body>
</html>