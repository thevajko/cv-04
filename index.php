<?php
    include  "faktorial.php";
    include  "Osoba.php";
    include  "OsobaManager.php";
?><html>
<head></head>
<body>
<?php
    $osoby = OsobaManager::getOsoby();

    foreach ($osoby as $osoba) {
        echo "<div>{$osoba->getMeno()}</div>";
    }
?></body>
</html>