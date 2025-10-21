<?php
require_once __DIR__ . '/Osoba.php';

class OsobaLoader {
    /**
     * Načíta osoby zo CSV súboru do poľa objektov Osoba.
     * Očakáva CSV s bodkočiarkou ako oddeľovač: meno;priezvisko;pohlavie;rok_narodenia
     * @param string $csvPath
     * @return Osoba[]
     */
    public static function loadFromCsv(string $csvPath): array {
        $osoby = [];
        if (!file_exists($csvPath) || !is_readable($csvPath)) {
            return $osoby;
        }
        $handle = fopen($csvPath, 'r');
        if ($handle === false) {
            return $osoby;
        }
        while (($row = fgetcsv($handle, 1000, ';')) !== false) {
            if (count($row) < 4) continue;
            [$meno, $priezvisko, $pohlavie, $rok_narodenia] = $row;
            $rok_narodenia = (int)$rok_narodenia;
            $osoba = new Osoba($meno, $priezvisko, $pohlavie, $rok_narodenia);
            $osoby[] = $osoba;
        }
        fclose($handle);
        return $osoby;
    }
}

