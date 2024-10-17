<?php

class OsobaManager {


    /**
     * @return Osoba[]
     */
    public static function getOsoby() : array
    {
        $result = [];
        $f = fopen("data/osoby.csv", "r");
        while(!feof($f)) {
            $riadok = fgets($f);
            $data = explode(";", $riadok);
            $result[] = new Osoba($data[0],$data[1], $data[2], $data[3]);
        }
        fclose($f);
        return $result;
    }
}
