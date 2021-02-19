<?php
//See calculate-area.php
//
//Design a Geometry class with the following methods:
//
//A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//Area = π * r * 2
//Use Math.PI for π and r for the radius of the circle
//A static method that accepts the length and width of a rectangle and returns the area of the rectangle.
//Use the following formula: Area = Length x Width
//A static method that accepts the length of a triangle’s base and the triangle’s height.
//The method should return the area of the triangle. Use the following formula: Area = Base x Height x 0.5
//The methods should display an error message if negative values are used for the circle’s radius,
//the rectangle’s length or width, or the triangle’s base or height.
//
//Next write a program to test the class, which displays the following menu and responds to the user’s selection:
//
//Geometry calculator:
//
//Calculate the Area of a Circle
//Calculate the Area of a Rectangle
//Calculate the Area of a Triangle
//Quit
//Enter your choice (1-4):
//Display an error message if the user enters a number outside the range of 1 through 4 when selecting an item from the menu.

class Geometry
{

    function validate(string $input): bool
    {
        return is_numeric($input);
    }


   static function circleArea(float $radius): float
    {
        return pi() * pow($radius, 2);
    }


    static function rectangleArea(float $length, float $width): float
    {
        return $length * $width;
    }


    static function triangleArea(float $base, float $height): float
    {
        return $base * $height * 0.5;
    }
}

$areaCalculator = new Geometry();

echo "Geometry Calculator" . PHP_EOL;
echo "1. Calculate the Area of a Circle" . PHP_EOL;
echo "2. Calculate the Area of a Rectangle" . PHP_EOL;
echo "3. Calculate the Area of a Triangle" . PHP_EOL;
echo "4. Quit" . PHP_EOL;
echo PHP_EOL;


$choice = readline("Enter your choice (1-4) : ");


if ($choice == 1) {
    $radius = readline("Enter radius (cm) : ");
    if ($areaCalculator->validate($radius)) {
        echo "Circle Area is " . number_format($areaCalculator->circleArea($radius), 2) . " cm2";
    } else {
        echo "Please enter a numeric value";
    }
} else if ($choice == 2) {
    $length = readline("Enter length (cm) : ");
    $width = readline("Enter width (cm) : ");
    if ($areaCalculator->validate($length) && $areaCalculator->validate($width)) {
        echo "Rectangle Area is " . number_format($areaCalculator->rectangleArea($length, $width), 2) . " cm2";
    } else {
        echo "Please enter a numeric value";
    }
} else if ($choice == 3) {
    $base = readline("Enter base (cm) : ");
    $height = readline("Enter height (cm) :");
    if ($areaCalculator->validate($base) && $areaCalculator->validate($height)) {
        echo "Triangle Area is " . number_format($areaCalculator->triangleArea($base, $height), 2) . " cm2";
    } else {
        echo "Please enter a numeric value";
    }
} else if ($choice == 4) {
    exit();
} else {
    echo "Error!";
}


