<?php
//On your phone keypad, the alphabets are mapped to digits as follows:
// ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).

//Write a program called PhoneKeyPad, which prompts user for a String (case insensitive), and converts to a sequence of keypad digits.

//Use:

//a "nested-if" statement
//a "switch-case-default" statement
//Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,

$inputString = strtoupper(readline("Enter string : "));

$digits = 0;
$digitArray = [];
for ($i = 0; $i < strlen($inputString); $i++) {
    if ($inputString[$i] === "A" || $inputString[$i] === "B" || $inputString[$i] === "C") {
        $digits = 2;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "D" || $inputString[$i] === "E" || $inputString[$i] === "F") {
        $digits = 3;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "G" || $inputString[$i] === "H" || $inputString[$i] === "I") {
        $digits = 4;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "J" || $inputString[$i] === "K" || $inputString[$i] === "L") {
        $digits = 5;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "M" || $inputString[$i] === "N" || $inputString[$i] === "O") {
        $digits = 6;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "P" || $inputString[$i] === "Q" || $inputString[$i] === "R" || $inputString[$i] === "S") {
        $digits = 7;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "T" || $inputString[$i] === "U" || $inputString[$i] === "V") {
        $digits = 8;
        $digitArray[] = $digits;
    } else if ($inputString[$i] === "W" || $inputString[$i] === "X" || $inputString[$i] === "Y" || $inputString[$i] === "Z") {
        $digits = 9;
        $digitArray[] = $digits;
    }
}

foreach ($digitArray as $digit) {
    echo $digit . " ";
}

echo PHP_EOL;
$letter = "";
$digitArray = [];
for ($i = 0; $i < strlen($inputString); $i++) {
    switch ($inputString[$i]) {
        case $inputString[$i] === "A" || $inputString[$i] === "B" || $inputString[$i] === "C":
            $digits = 2;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "D" || $inputString[$i] === "E" || $inputString[$i] === "F":
            $digits = 3;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "G" || $inputString[$i] === "H" || $inputString[$i] === "I":
            $digits = 4;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "J" || $inputString[$i] === "K" || $inputString[$i] === "L":
            $digits = 5;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "M" || $inputString[$i] === "N" || $inputString[$i] === "O":
            $digits = 6;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "P" || $inputString[$i] === "Q" || $inputString[$i] === "R" || $inputString[$i] === "S":
            $digits = 7;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "T" || $inputString[$i] === "U" || $inputString[$i] === "V":
            $digits = 8;
            $digitArray[] = $digits;
            break;
        case $inputString[$i] === "W" || $inputString[$i] === "X" || $inputString[$i] === "Y" || $inputString[$i] === "Z":
            $digits = 9;
            $digitArray[] = $digits;
    }
}

foreach ($digitArray as $digit) {
    echo $digit . " ";
}

