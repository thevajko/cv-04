<?php

echo "Ahoj svet!";

for ($i = 1; $i <= 10; $i++) {
    echo "\nCislo: " . $i . "</br>";
}

echo "<hr>";
$n = 104;
echo "Faktorial cisla $n je: " . faktorial($n);

function faktorial(int $n)
{
    if ($n <= 1) {
        return 1;
    } else {
        return $n * faktorial($n - 1);
    }
}