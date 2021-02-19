<?php
//Exercise 1
echo "Exercise 1" . PHP_EOL;
//Create a non-associative array with 3 integer values and display the total sum of them.

$listOne = [1, 2, 3];
function sumAll($a, $c)
{
    return $a + $c;
}

echo array_reduce($listOne, "sumAll", 0);


//Exercise 2
echo PHP_EOL . "Exercise 2" . PHP_EOL;
//Given array
//Using dump method, dump out all 3 values.

$person = [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50
];

var_dump($person);
var_dump($person["name"]);
var_dump($person["surname"]);
var_dump($person["age"]);


//Exercise 3
echo PHP_EOL . "Exercise 3" . PHP_EOL;
//Given object
//Using dump method, dump out all 3 values.

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

var_dump($person);
var_dump($person->name);
var_dump($person->surname);
var_dump($person->age);


//Exercise 4
echo PHP_EOL . "Exercise 4" . PHP_EOL;
//Given array
//Program should display concatenated value of - Jane Doe 41
$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

echo $items[0][1]["name"] . " " . $items[0][1]["surname"] . " " . $items[0][1]["age"];


//Exercise 5
echo PHP_EOL . "Exercise 5" . PHP_EOL;
//Given array
//Program should display concatenated value of - John & Jane Doe`s

echo $items[0][0]["name"] . " & " . $items[0][1]["name"] . " " . $items[0][0]["surname"] . "`s";
