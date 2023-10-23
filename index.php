<?php

function faktorial($cislo) {
    if ($cislo < 1) {
        return 1;
    } else {
        return $cislo * faktorial($cislo -1);
    }
}

for ($i = 1; $i < 11; $i++) {
    echo "!".$i."=".faktorial($i)."<br>\n";
}


echo "Ahoj svet!5654654";