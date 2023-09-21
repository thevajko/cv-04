<?php

class PersonTable
{
    public static function renderTable($persons, $sorted = false){

        $picker = function (Person $person, $i) {
            switch ($i) {
                case 0:
                    return $person->getSurname();
                case 1:
                    return $person->getName();
                case 2:
                    return $person->getYear();
                default:
                case 3:
                    return $person->getSex();
            }
        };

        $sizes = [];
        for ($i=0; $i < 4;$i++){
            $sizes[$i] = PersonTable::getBiggestStringLength($persons, $picker, $i);
        }

        if ($sorted) {

            usort($persons, function (Person $a, Person $b) {
                $c = new Collator('sk');
               return $c->compare($a->getSurname(), $b->getSurname());
            });

        }

        $innerLines =[];
        foreach ($persons as $person) {
            $innerLines[] = PersonTable::getLine($person, $sizes, $picker);
        }

        echo str_pad("", strlen($innerLines[0]), "-")."\n";
        echo implode( "\n",$innerLines);
        echo "\n".str_pad("", strlen($innerLines[0]), "-")."\n";
    }

    private static function getBiggestStringLength($persons, Closure $valuePicker, $i){

        $maxValue = 0;
        foreach ($persons as $person) {
            $val = mb_strlen($valuePicker($person, $i));
            if ($maxValue < $val) {
                $maxValue = $val;
            }
        }
        return $maxValue;
    }

    private static function getLine(Person $person, $sizes, $picker){

        $values = [];
        for ($i=0; $i < count($sizes); $i++) {
            $values[$i] = $picker($person, $i);
            while (mb_strlen($values[$i]) < $sizes[$i])  {
                $values[$i] .= " ";
            };
        }
        return "|".implode("|", $values)."|";
    }
}