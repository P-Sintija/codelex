<?php
//Exercise 1
echo "Exercise 1" . PHP_EOL;
//Create variable that prints out an integer 10, float 10.10, string "hello world"

$integer = 10;
$float = 10.10;
$string = "hello world";

echo $integer . PHP_EOL;
echo $float . "\n";
echo $string;


//Exercise 2
echo PHP_EOL . "Exercise 2" . PHP_EOL;
//Dump the same values that should display both data type & its value. (Note, usage of var_dump)

var_dump($integer);
var_dump($float);
var_dump($string);


//Exercise 3
echo PHP_EOL . "Exercise 3" . PHP_EOL;
//Concatenate your name, surname and integer of your age.

$myName = "Sintija";
$mySurname = "Putniņa";
$myAge = 31;

echo "My name is $myName $mySurname." . " I am $myAge years old.";