<?php

class Osoba {
    private string $meno;
    private string $priezvisko;
    private string $pohlavie;
    private int $rok_narodenia;

    /**
     * Osoba constructor.
     * @param string $meno
     * @param string $priezvisko
     * @param string $pohlavie
     * @param int $rok_narodenia
     */
    public function __construct(string $meno, string $priezvisko, string $pohlavie, int $rok_narodenia) {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->pohlavie = $pohlavie;
        $this->rok_narodenia = $rok_narodenia;
    }

    public function getMeno(): string
    {
        return $this->meno;
    }

    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }

    public function setPriezvisko(string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    public function getPohlavie(): string
    {
        return $this->pohlavie;
    }

    public function setPohlavie(string $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

    public function getRokNarodenia(): int
    {
        return $this->rok_narodenia;
    }

    public function setRokNarodenia(int $rok_narodenia): void
    {
        $this->rok_narodenia = $rok_narodenia;
    }


    public function __toString(): string {
        return $this->meno . ' ' . $this->priezvisko . ' (' . $this->pohlavie . ', ' . $this->rok_narodenia . ')';
    }
}
