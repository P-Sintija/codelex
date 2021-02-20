<?php
//echo "Input the 1st number: ";
//
//echo "Input the 2nd number: ";
//
//echo "Input the 3rd number: ";
//
//todo print the largest number

$firstNumber = readline("Input the 1st number: ");
$secondNumber = readline("Input the 2st number: ");
$thirdNumber = readline("Input the 3st number: ");

$numberArray = [];
$numberArray[] = $firstNumber;
$numberArray[] = $secondNumber;
$numberArray[] = $thirdNumber;

echo max($numberArray);