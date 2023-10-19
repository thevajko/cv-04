<?php
require "Osoba.php";

$osoby = [];
if (($handle = fopen("data/osoby.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $osoby[] = new Osoba($data[0], $data[1], $data[2], $data[3]);
    }
    fclose($handle);
}

var_dump($osoby);
?>
