<?php

include "inc/funkcie.php";


$premenna = "Hello World!";

echo "Ahoj svet! {$premenna} 65465";

// Print factorials from 0 to 10
for ($i = 0; $i <= 10; $i++) {
    $fact = factorial($i);

    echo "<p>{$i}! = {$fact}</p>";
}
