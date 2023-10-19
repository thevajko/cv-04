<?php
function faktorial(int $f) : int
{
   $fkt = 1;
   for ($i=1; $i <= $f; $i++) {
       $fkt *= $i;
   }
   return $fkt;
}

for ($i = 1; $i < 11; $i++) {
    echo "$i ! = " . faktorial($i) . "<br>";
}
?>
