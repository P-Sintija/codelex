<?php //declare(strict_types=1); ????
//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.


$firstInteger = readline(" Enter first integer : ");
$secondInteger = readline(" Enter second integer : ");

function validate(string $input): bool
{
    return is_numeric($input);
}

if (!validate($firstInteger) || !validate($secondInteger)) {
    echo "Not a integer";
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

