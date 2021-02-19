<?php
//Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
//The program shall print "Coza" in place of the numbers which are multiples of 3,
//"Loza" for multiples of 5, "Woza" for multiples of 7,
//"CozaLoza" for multiples of 3 and 5, and so on. The output shall look like:
//
//1 2 Coza 4 Loza Coza Woza 8 Coza Loza 11
//Coza 13 Woza CozaLoza 16 17 Coza 19 Loza CozaWoza 22
//23 Coza Loza 26 Coza Woza 29 CozaLoza 31 32 Coza


echo "coza-loza-woza" . PHP_EOL;

$numbersPerLine = 11;

$numberOfLines = readline("Enter number of lines : ");

function validate(string $input): bool
{
    $valueInteger = (int)$input;
    $valueFloat = (float)$input;
    return is_numeric($input) && $valueInteger == $valueFloat;
}

if (!validate($numberOfLines)) {
    echo "Numbers of lines must be an integer" . PHP_EOL;
    exit();
}


function getAllIntegers(int $numbersPerLine, int $input): array
{
    $storage = [];
    for ($i = 1; $i <= $input * $numbersPerLine; $i++) {
        $storage[] = $i;
    }
    return $storage;
}

$line = getAllIntegers($numbersPerLine, $numberOfLines);

function makeArray(array $input,int $numbersPerLine, int $numberOfLines): array
{
    $storage = [];
    for ($i = 0; $i < $numberOfLines; $i++) {
        $storage[$i] = array_slice($input, ($i * $numbersPerLine), $numbersPerLine);
    };
    return $storage;
}

$arrayOfIntegers = makeArray($line, $numbersPerLine, $numberOfLines);


function renameIntegers(array $list): array
{
    for ($i = 0; $i < count($list); $i++) {
        for ($j = 0; $j < count($list[0]); $j++) {
            if ($list[$i][$j] % 3 === 0 && $list[$i][$j] % 5 === 0 && $list[$i][$j] % 7 === 0) {
                $list[$i][$j] = "CozaLozaWoza";
            } else if ($list[$i][$j] % 3 === 0 && $list[$i][$j] % 5 === 0) {
                $list[$i][$j] = "CozaLoza";
            } else if ($list[$i][$j] % 5 === 0 && $list[$i][$j] % 7 === 0) {
                $list[$i][$j] = "LozaWoza";
            } else if ($list[$i][$j] % 3 === 0 && $list[$i][$j] % 7 === 0) {
                $list[$i][$j] = "CozaWoza";
            } else if ($list[$i][$j] % 3 === 0) {
                $list[$i][$j] = "Coza";
            } else if ($list[$i][$j] % 5 === 0) {
                $list[$i][$j] = "Loza";
            } else if ($list[$i][$j] % 7 === 0) {
                $list[$i][$j] = "Woza";
            }
        }
    }
    return $list;
}

$changedArray = renameIntegers($arrayOfIntegers);

foreach ($changedArray as $item) {
    echo implode(" ", $item) . PHP_EOL;
}