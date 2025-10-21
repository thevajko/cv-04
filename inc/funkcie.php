<?php

/**
 * Compute factorial of a non-negative integer.
 * Returns integer result, or null for invalid input (negative or non-integer).
 *
 * @param int $n
 * @return int|null
 */
function factorial(int $n) : int {

    // disallow negative values
    if ($n < 0) {
        return 0;
    }

    $n = (int)$n;
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}
