<?php

class PersonTable
{
    /**
     * Renders sorted text table
     * @param $persons
     * @param $sorted
     * @return void
     */
    public static function renderTable($persons, $sorted = false){

        // Setup of closure that unite access to selected getters using index
        // used on multiple places
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

        // now we can get max values for columns sizes
        $sizes = [];
        for ($i=0; $i < 4;$i++){
            $sizes[$i] = PersonTable::getBiggestStringLength($persons, $picker, $i);
        }

        // do sorting if is selected
        if ($sorted) {

            usort($persons, function (Person $a, Person $b) {
                // Use of collator because in data there are 4 byte characters
                // str_cmp is ASCI only
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

    /**
     * Gets largest value on selected attribute on person in list
     * @param $persons
     * @param Closure $valuePicker
     * @param $i int Index for closure
     * @return false|int
     */
    private static function getBiggestStringLength($persons, Closure $pickerClosure, $i){

        // just max search algorithm
        $maxValue = 0;
        foreach ($persons as $person) {
            // must use of MB, because in data there are 4 byte characters
            // strlen is ASCII only
            $val = mb_strlen($pickerClosure($person, $i));
            if ($maxValue < $val) {
                $maxValue = $val;
            }
        }
        return $maxValue;
    }

    /**
     * Build whole string of ona row
     * @param Person $person Person that will be converted to one table row
     * @param $sizes int[] array of columns max length
     * @param $pickerClosure Closure
     * @return string
     */
    private static function getLine(Person $person, $sizes, $pickerClosure){

        $values = []; // collector array for cells values
        for ($i=0; $i < count($sizes); $i++) {
            $values[$i] = $pickerClosure($person, $i); // uses picker closure for getting right value from person object
            while (mb_strlen($values[$i]) < $sizes[$i])  { // add spaces, so string match needed length
                $values[$i] .= " ";
            };
        }
        return "|".implode("|", $values)."|"; // put all together
    }
}