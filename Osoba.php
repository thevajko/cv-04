<?php

class Osoba
{
    private string $meno;
    private string $priezvisko;
    private string $pohlavie;
    private int $rokNarodenia;

    function __construct(string $meno, string $priezvisko, string $pohlavie, int $rokNarodenia)
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->pohlavie = $pohlavie;
        $this->rokNarodenia = $rokNarodenia;
    }

    public function getMeno(): string
    {
        return $this->meno;
    }
    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }
    public function getPohlavie(): string
    {
        return $this->pohlavie;
    }
    public function getRokNarodenia(): int
    {
        return $this->rokNarodenia;
    }

    /**
     * @param string $csvSubor
     * @return Osoba[]|int
     */
    public static function nacitajOsoby(string $csvSubor): array
    {
        $osoby = [];
        if (($handle = fopen($csvSubor, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $osoba = new Osoba($data[0], $data[1], $data[2], (int)$data[3]);
                $osoby[] = $osoba;
            }
            fclose($handle);
        }
        return $osoby;
    }
}