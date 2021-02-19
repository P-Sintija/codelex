<?php
// Exercise 1
echo "Exercise 1" . PHP_EOL;
//Given variables (int) 10, string "10" determine if they both are the same.

$firstVariable = 10;
$secondVariable = "10";
if ($firstVariable === $secondVariable) {
    echo "true";
} else {
    echo "false";
}


//Exercise 2
echo PHP_EOL . "Exercise 2" . PHP_EOL;
//Given variable (int) 50, determine if its in the range of 1 and 100.

$thirdVariable = 50;
if ($thirdVariable >= 1 && $thirdVariable <= 100) {
    echo "true";
}


//Exercise 3
echo PHP_EOL . "Exercise 3" . PHP_EOL;
//Given variables (string) "hello" create a condition that if the given value is "hello" then output "world"

$fourthVariable = "hello";
if ($fourthVariable === "hello") {
    echo "world";
}


//Exercise 4
echo PHP_EOL . "Exercise 4" . PHP_EOL;
//By your choice, create condition with 3 checks.
//For example, if value is greater than X, less than Y and is an even number.
$fifthVariable = 31;
$x = 10;
$y = 50;
if ($fifthVariable > $x && $fifthVariable < $y && $fifthVariable % 2 === 0) {
    echo "true";
} else {
    echo "false";
}


//Exercise 5
echo PHP_EOL . "Exercise 5" . PHP_EOL;
//Given variable (int) 50 create a condition that prints out "correct" if the variable is inside the range.
//Range should be stored within the 2 separated variables $y and $z.
$sixthVariable = 50;
$y = 30;
$z = 100;
if ($sixthVariable >= $y && $sixthVariable <= $z) {
    echo "correct";
}


//Exercise 6
echo PHP_EOL . "Exercise 6" . PHP_EOL;
//Create a variable $plateNumber that stores your car plate number.
//Create a switch statement that prints out that its your car in case of your number.
$plateNumber = "LV-0001";
switch ($plateNumber) {
    case $plateNumber:
        echo "its your car";
        break;
}


//Exercise 7
echo PHP_EOL . "Exercise 7" . PHP_EOL;
//Create a variable $number with integer by your choice.
//Create a switch statement that prints out text "low" if the value is under 50,
// "medium" if the case is higher than 50 but lower than 100,
// "high" if the value is >100.
$number = 190;
switch ($number) {
    case $number < 50:
        echo "low";
        break;
    case $number > 50 && $number < 100:
        echo "medium";
        break;
    case $number > 100:
        echo "high";
        break;
    default:
        echo "Do no input 50 or 100";
}