<?php
//Write a program that reads an positive integer and count the number of digits the number has.

$positiveInteger = readline("Enter positive integer : ");
if ($positiveInteger <= 0) {
    echo "Error";
    exit();
} else {
    echo strlen("$positiveInteger");
}