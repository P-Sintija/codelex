<?php
//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise.
// The program shall always print “bye!” before exiting.

$number = readline(" Enter number : ");

if (!is_numeric($number)) {
    echo "Not a number";
    exit();
}

function CheckOddEven(int $input): bool
{
    return $input % 2 === 0;
}

if (CheckOddEven($number)) {
    echo "Even Number";
} else {
    echo "Odd Number";
}

echo PHP_EOL . "Bye";