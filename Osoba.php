<?php

class Osoba
{
    public function __construct(public string $meno, public string $priezvisko, public string $pohlavie, public int $datum)
    {

    }
}