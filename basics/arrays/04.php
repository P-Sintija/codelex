<?php
//Write a program that creates an array of ten integers. It should put ten random numbers from 1 to 100 in the array.
// It should copy all the elements of that array into another array of the same size.
//
//Then display the contents of both arrays. To get the output to look like this, you'll need a several for loops.
//


//Create an array of ten integers
$integersArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];


//Fill the array with ten random numbers (1-100)
function fillArray(array &$input): array
{
    for ($i = 0; $i < count($input); $i++) {
        $input[$i] = rand(1, 100);
    }
    return $input;
}

fillArray($integersArray);


//Copy the array into another array of the same capacity
$copyArray = array_fill(0, count($integersArray), null);
$copyArray = $integersArray;


//Change the last value in the first array to a -7
$integersArray[count($integersArray) - 1] = -7;


//Display the contents of both arrays
echo "Array 1: ";
foreach ($integersArray as $i) {
    echo $i . " ";
}

echo PHP_EOL . "Array 2: ";
foreach ($copyArray as $i) {
    echo $i . " ";
}


