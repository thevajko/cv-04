<?php

class Osoba
{
    private string $meno;
    private string $priezvisko;
    private bool $pohlavie;
    private int $rok;

    /**
     * @param string $meno
     * @param string $priezvisko
     * @param bool $pohlavie
     * @param int $rok
     */
    public function __construct(string $meno, string $priezvisko, bool $pohlavie, int $rok)
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->pohlavie = $pohlavie;
        $this->rok = $rok;
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

    public function isPohlavie(): bool
    {
        return $this->pohlavie;
    }

    public function setPohlavie(bool $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

    public function getRok(): int
    {
        return $this->rok;
    }

    public function setRok(int $rok): void
    {
        $this->rok = $rok;
    }


}