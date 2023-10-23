<?php
function faktorial($cislo) {
    if ($cislo < 1) {
        return 1;
    } else {
        return $cislo * faktorial($cislo -1);
    }
}