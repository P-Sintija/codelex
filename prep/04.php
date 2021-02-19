<?php
//Exercise 1
echo "Exercise 1" . PHP_EOL;
//Create an array with integers (up to 10) and print them out using foreach loop.

$listOne = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($listOne as $item) {
    echo $item . PHP_EOL;
}


//Exercise 2
echo PHP_EOL . "Exercise 2" . PHP_EOL;
//Create an array with integers (up to 10) and print them out using for loop.

for ($item = 1; $item <= count($listOne); $item++) {
    echo $item . PHP_EOL;
}


//Exercise 3
echo PHP_EOL . "Exercise 3" . PHP_EOL;
//Given variable $x = 1 while $x is lower than 10, print out text "codelex".
// (Note: To avoid infinite looping, after each print increase the variable $x by 1)
$x = 1;
while ($x < 10) {
    echo "codelex" . PHP_EOL;
    $x += 1;
}


//Exercise 4
echo PHP_EOL . "Exercise 4" . PHP_EOL;
//Create a non associative array with integers and print out only integers that divides by 3 without any left.
for ($i = 0; $i < count($listOne); $i++) {
    if ($listOne[$i] % 3 == 0) {
        echo $listOne[$i] . PHP_EOL;
    }
}


//Exercise 5
echo PHP_EOL . "Exercise 5" . PHP_EOL;
//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every persons personal data.
class Persons
{
    public string $name;
    public string $surname;
    public int $age;
    public string $birthday;

    public function __construct(string $name, string $surname, int $age, string $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->birthday = $birthday;
    }
}

$listTwo = [
    "Ann" => new Persons("Ann", "Doe", 16, "03.May.1990"),
    "Jon" => new Persons("Joe", "Doe", 40, "03.May.1960"),
    "Jane" => new Persons("Jane", "Doe", 40, "30.Jun.1960"),
];

foreach ($listTwo as $person) {
    echo $person->name . " " . $person->surname . " " . $person->age . " " . $person->birthday . PHP_EOL;
}