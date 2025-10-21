<?php
require_once __DIR__ . '/Osoba.php';

class OsobaStats {
    /**
     * Nájde najmladšiu osobu v poli Osoba[].
     * @param Osoba[] $osoby
     * @return Osoba|null
     */
    public static function findNajmladsia(array $osoby): ?Osoba {
        if (empty($osoby)) return null;
        $najmladsia = $osoby[0];
        foreach ($osoby as $osoba) {
            if ($osoba->getRokNarodenia() > $najmladsia->getRokNarodenia()) {
                $najmladsia = $osoba;
            }
        }
        return $najmladsia;
    }

    /**
     * Nájde najstaršiu osobu v poli Osoba[].
     * @param Osoba[] $osoby
     * @return Osoba|null
     */
    public static function findNajstarsia(array $osoby): ?Osoba {
        if (empty($osoby)) return null;
        $najstarsia = $osoby[0];
        foreach ($osoby as $osoba) {
            if ($osoba->getRokNarodenia() < $najstarsia->getRokNarodenia()) {
                $najstarsia = $osoba;
            }
        }
        return $najstarsia;
    }
}

