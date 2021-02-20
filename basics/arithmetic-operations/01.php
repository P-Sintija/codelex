<?php
//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.


$firstInteger = readline(" Enter first integer : ");
$secondInteger = readline(" Enter second integer : ");

function validate(string $input): bool
{
    $valueInteger = (int)$input;
    $valueFloat = (float)$input;
    return is_numeric($input) && $valueInteger == $valueFloat;
}

if (!validate($firstInteger) || !validate($secondInteger)) {
    echo "Not an integer";
    exit();
}


function determineValue(int $inputOne, int $inputTwo): bool
{
    return $inputOne === 15 || $inputTwo === 15;
}

function sumOfValues(int $inputOne, int $inputTwo): bool
{
    return $inputOne + $inputTwo === 15;
}

function differenceOfValues(int $inputOne, int $inputTwo): bool
{
    return $inputOne - $inputTwo === 15;
}

if (determineValue($firstInteger, $secondInteger) ||
    sumOfValues($firstInteger, $secondInteger) ||
    differenceOfValues($firstInteger, $secondInteger)) {
    echo "true";
} else {
    echo "false";
}

