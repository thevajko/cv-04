<?php

require_once "func.php";

for ($i = 1; $i < 11; $i++) {
    echo "!".$i."=".faktorial($i)."<br>\n";
}

$fh = fopen('data/osoby.csv','r');
while ($line = fgets($fh)) {
    $r = explode(";", $line);

}
fclose($fh);