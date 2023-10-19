<?php

class Osoba
{

    private string $meno;
    private string $priezvisko;
    private string $pohlavie;
    private string $datum;

    public function __construct(string $meno, string $priezvisko, string $pohlavie, string $datum)
    {
        $this->meno = $meno;
        $this->priezvisko = $priezvisko;
        $this->pohlavie = $pohlavie;
        $this->datum = $datum;
    }

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
     * @return string
     */
    public function getPohlavie(): string
    {
        return $this->pohlavie;
    }

    /**
     * @param string $pohlavie
     */
    public function setPohlavie(string $pohlavie): void
    {
        $this->pohlavie = $pohlavie;
    }

    /**
     * @return string
     */
    public function getDatum(): string
    {
        return $this->datum;
    }

    /**
     * @param string $datum
     */
    public function setDatum(string $datum): void
    {
        $this->datum = $datum;
    }

}