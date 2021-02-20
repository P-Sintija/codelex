<?php
//echo "The first 10 natural numbers are:";

//todo write a program that displays first 10 natural numbers

$numbers = [];
$counter = 1;
while (count($numbers) < 10) {
    $numbers[] = $counter++;
}

foreach ($numbers as $digit) {
    echo $digit . " ";
}