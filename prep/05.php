<?php declare(strict_types=1);

//Exercise 1
echo "Exercise 1" . PHP_EOL;
//Create a function that accepts any string and returns the same value with added "codelex" by the end of it. Print this value out.

function addString(string $input): string
{
    return $input . "codelex";
}

echo addString("hello");


//Exercise 2
echo PHP_EOL . "Exercise 2" . PHP_EOL;
//Create a function that accepts 2 integer arguments. First argument is a base value and the second one is a value its been multiplied by.
// For example, given argument 10 and 5 prints out 50

function multiplied(int $firstArgument, int $multiplier): int
{
    return $firstArgument * $multiplier;
}

echo multiplied(5, 4);


//Exercise 3
echo PHP_EOL . "Exercise 3" . PHP_EOL;
//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.

class Person
{
    public string $name;
    public string $surname;
    public int $age;

    public function __construct(string $name, string $surname, int $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }
}

$elvis = new Person("Elvis", "Presley", 86);

function determineAge(Person $input): bool
{
    return $input->age >= 18;
}

echo determineAge($elvis);


//Exercise 4
echo PHP_EOL . "Exercise 4" . PHP_EOL;
//Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.

$allStars = [
    $elvis,
    new Person("Michael", "Jackson", 63),
    new Person ("Lil", "Bill", 16)
];

for ($i = 0; $i < count($allStars); $i++) {
    if (determineAge($allStars[$i])) {
        echo $allStars[$i]->name . " " . $allStars[$i]->surname . " has reached age of 18" . PHP_EOL;
    } else {
        echo $allStars[$i]->name . " " . $allStars[$i]->surname . " has NOT reached age of 18" . PHP_EOL;
    }
}


//Exercise 5
echo PHP_EOL . "Exercise 5" . PHP_EOL;
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg.
//Create a secondary array with shipping costs per weight. Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
//Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    [
        "fruit" => "apple",
        "weight" => 5,
    ],
    [
        "fruit" => "banana",
        "weight" => 12,
    ],
    [
        "fruit" => "orange",
        "weight" => 10,
    ]
];

function determineWeight(int $weight): bool
{
    if ($weight > 10) {
        return true;
    }
    return false;
}

$costs = [
    "> 10 kg" => 2,
    "otherwise" => 1
];

foreach ($fruits as $fruit) {
    if (determineWeight($fruit["weight"])) {
        echo $fruit["weight"] . 'kg of ' . $fruit["fruit"] . " will cost " . $costs["> 10 kg"] . " EUR" . PHP_EOL;
    } else {
        echo $fruit["weight"] . "kg of " . $fruit["fruit"] . " will cost " . $costs["otherwise"] . " EUR" . PHP_EOL;
    }
}


//Exercise 6
echo PHP_EOL . "Exercise 6" . PHP_EOL;
//Create an non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
//Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
//Create a function that doubles the integer number.
//Within the loop using php in-built function print out the double of the number value (using your custom function).

$input = [1, 2, 3, 1.1, "hello"];

function doubleValue($value)
{
    if (is_int($value)) {
        return $value * 2;
    }
}

for ($i = 0; $i < count($input); $i++) {
    echo doubleValue($input[$i]);
}


//Exercise 7**
echo PHP_EOL . "Exercise 7**" . PHP_EOL;
//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash.
// Guns are objects stored within an array. Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

class Customer
{
    public string $name;
    public array $license;
    public int $cash;

    public function __construct($name, $license, $cash)
    {
        $this->name = $name;
        $this->license = $license;
        $this->cash = $cash;
    }
}

class Gun
{
    public string $name;
    public string $licenseLetters;
    public int $price;

    public function __construct($name, $license, $price)
    {
        $this->name = $name;
        $this->licenseLetters = $license;
        $this->price = $price;
    }
}

$gunsInStore = [
    new Gun ("A", "aaa", 120),
    new Gun ("B", "bbb", 150),
    new Gun ("C", "ccc", 200),
    new Gun ("D", "ddd", 90),
];

$man = new Customer("Jon", ["aaa", "bbb", "ccc"], 150);

$gunsAbelToBuy = array_filter($gunsInStore, function ($gun) use ($man) {
    return array_filter($man->license, function ($license) use ($gun) {
            return $license === $gun->licenseLetters;
        }) && $man->cash >= $gun->price;

});


function determineAbility(array $guns): bool
{
    return count($guns) >= 1;
}

if (determineAbility($gunsAbelToBuy)) {
    echo "Abel to buy";
} else {
    echo "Unable to buy";
}


