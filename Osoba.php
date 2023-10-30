<?php

class Osoba
{
    public function __construct(
        private string $meno,
        private string $priezvisko,
        private int $rokNarodenia,
        private string $pohlavie)
    {
    }

    /**
     * @return string
     */
    public function getMeno(): string
    {
        return $this->meno;
    }

    /**
     * @return string
     */
    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }

    /**
     * @return int
     */
    public function getRokNarodenia(): int
    {
        return $this->rokNarodenia;
    }

    /**
     * @return string
     */
    public function getPohlavie(): string
    {
        return $this->pohlavie;
    }

    public static function loadFromCSV(string $file) {
        //$osoby = [];

        if (($open = fopen($file, "r")) !== false) {
            while ((list($meno, $priezvisko, $pohlavie, $rokNarodenia) = fgetcsv($open, 1000, ";")) !== false) {
                yield new Osoba($meno, $priezvisko, intval($rokNarodenia), $pohlavie);
            }
            fclose($open);
        }

        //return $osoby;
    }
}