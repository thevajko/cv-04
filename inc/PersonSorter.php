<?php

class PersonSorter
{
     public static function sort($array, $param, $asc = 0 ){
         usort($array, function (Person $a, Person $b) use ($asc, $param) {

             $or = $asc == 0 ? -1 : 1;

            switch ($param) {
                case 'name' :
                    return  strcmp($a->getName(), $b->getName())*$asc;
                case 'year' :
                    return  strcmp($a->getYear(), $b->getYear())*$asc;
                case 'sex' :
                    return  strcmp($a->getSex(), $b->getSex())*$asc;
                default:
                case 'surname' :
                    return  strcmp($a->getSurname(), $b->getSurname())*$asc;
            }
         });
         return $array;
     }
}