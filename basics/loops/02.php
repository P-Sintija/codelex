<?php
//echo "Input number of terms: ";
//
//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

$number = readline("Enter number to multiply :");
$pow = readline("Enter power :");

//echo pow($number,$pow) . PHP_EOL;

$multiplication = 1;

while ($pow > 0) {
    $multiplication = $multiplication * $number;
    $pow--;
}

echo $multiplication;

