<?php
declare(strict_types=1);

function faktorial(int $n): int
{
    if ($n < 2) {
        return 1;
    }
    return $n * faktorial($n - 1);
}
echo "Ahoj svet!";

echo "<br>";

for ($i = 1; $i <= 10; $i++) {
    echo "$i<br>\n";
}

for ($i = 1; $i <= 10; $i++) {
    echo "$i! = " . faktorial($i) . "<br>";
}


echo faktorial(3.14);