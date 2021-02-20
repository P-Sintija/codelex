<?php
//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
// Take note that it is the same as factorial of N.

$number = readline("Enter number ");

function validate(string $input): bool
{
    $valueInteger = (int)$input;
    $valueFloat = (float)$input;
    return is_numeric($input) && $valueInteger == $valueFloat;
}

if (!validate($number)) {
    echo "Not an integer!";
    exit();
}

$storage = [];

for ($i = 1; $i <= $number; $i++) {
    $storage[] = $i;
}

function getFactorial($a, $c)
{
    return $a * $c;
}

echo array_reduce($storage, "getFactorial", 1);

