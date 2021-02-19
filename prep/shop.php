<?php

class Product
{
    public string $name;
    public int $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }
}

$items = [
    new Product("apple", 10),
    new Product("banana", 20),
    new Product("orange", 30),
    new Product("berry", 40),
    new Product("allFruit", 80)
];


foreach ($items as $fruit) {
    echo $fruit->name . " = " . $fruit->cost . " EUR" . PHP_EOL;
}

$firstLine = readline(" Enter product name : ");

$request = [];
for ($i = 0; $i < count($items); $i++) {
    if ($firstLine === $items[$i]->name) {
        $secondLine = readline(" Enter amount : ");
        echo $secondLine . " " . $firstLine . "s will cost " . $secondLine * $items[$i]->cost . " EUR" . PHP_EOL;
    } else if ($firstLine !== $items[$i]->name) {
        $request[] = $items[$i];
    }
}

if (count($request) == count($items)) {
    echo $firstLine . " is not in stock.";
}













