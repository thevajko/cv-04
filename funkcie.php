<?php

function faktorial(int $n): int
{
    if ($n < 2) {
        return 1;
    }
    return $n * faktorial($n - 1);
}

