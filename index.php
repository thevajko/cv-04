<?php

require_once "Osoba.php";
require_once "func.php";

for ($i = 1; $i < 11; $i++) {
    echo "!".$i."=".faktorial($i)."<br>\n";
}

$fh = fopen('data/osoby.csv','r');


$pole = [];
while ($line = fgets($fh)) {
    $r = explode(";", $line);
    $pole[] = new Osoba($r[0], $r[1], $r[2] == 'm' ? true: false, $r[3]);
}
fclose($fh);

print_r($pole);