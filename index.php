<?php

    include "inc/factorial.php";
    include "inc/Person.php";
    include "inc/PersonsLoader.php";
    include "inc/PersonSorter.php";

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php for ($i=0; $i < 10; $i++) { ?>
    <h2>Toto je nadpis č. <?php echo $i+1 ?></h2>
<?php } ?>
Faktoriál 12 je <?php echo factorial(12) ?>.

<?php

$osoby = PersonsLoader::loadPersonsFromCSV("data/osoby.csv");
$osoby = PersonSorter::sort($osoby, isset($_GET['sort']) ? $_GET['sort'] : "s",  isset($_GET['asc']) ? $_GET['asc'] : "0");
?>
<table border="1">
    <tr>
        <th><a href="?sort=surname">Priezvisko</a></th>
        <th><a href="?sort=name">Meno</a></th>
        <th><a href="?sort=year">Rok narodenia</a></th>
        <th><a href="?sort=year">Vek</a></th>
        <th><a href="?sort=sex">Pohlavie</a></th>
    </tr>
    <?php foreach ($osoby as $osoba) { ?>
        <tr>
            <td><?php echo $osoba->getSurname() ?></td>
            <td><?php echo $osoba->getName() ?></td>
            <td><?php echo $osoba->getYear() ?></td>
            <td><?php echo date("Y") - $osoba->getYear() ?></td>
            <td><?php echo $osoba->getSex() == "f" ? "žena" : "muž" ?></td>
        </tr>
    <?php } ?>


</table>

</body>
</html>