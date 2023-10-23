<?php

class Osoba
{
    private string $meno;
    private string $priezvisko;
    private bool $pohlavie;
    private int $rok;

    /**
     * @return string
     */
    public function getMeno(): string
    {
        return $this->meno;
    }

    /**
     * @param string $meno
     */
    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return string
     */
    public function getPriezvisko(): string
    {
        return $this->priezvisko;
    }

    /**
     * @param string $priezvisko
     */
    public function setPriezvisko(string $priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return bool
     */
    public function isPohlavie(): bool
    {
        return $this->pohlavie;
    }

    /**
     * @param bool $pohlavie
     */
    public function setPohlavie(bool $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

    /**
     * @return int
     */
    public function getRok(): int
    {
        return $this->rok;
    }

    /**
     * @param int $rok
     */
    public function setRok(int $rok): void
    {
        $this->rok = $rok;
    }


}