<?php

//Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.
//
//Your class should have a constructor that initializes the three instance variables and assumes that the values provided are correct.
//Provide a set and a get for each instance variable.
//
//Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.
//
//Write a test application named DateTest that demonstrates class Date capabilities.

require_once 'Date.php';

$day = readline('Enter day : ');
$month = readline('Enter month : ');
$year = readline('Enter year : ');

$date = new Date ($month, $day, $year);

try {
    $date->checkIfDateExists();
} catch (InvalidArgumentException $exception) {
    var_dump($exception->getMessage());
}

echo $date->displayDate();




