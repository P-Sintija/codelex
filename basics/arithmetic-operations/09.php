<?php
//Write a program that calculates and displays a person's body mass index (BMI).
//A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
//Where weight is measured in pounds and height is measured in inches.
//Display a message indicating whether the person has optimal weight, is underweight, or is overweight.
//A sedentary person's weight is considered optimal if his or her BMI is between 18.5 and 25.
//If the BMI is less than 18.5, the person is considered underweight.
//If the BMI value is greater than 25, the person is considered overweight.
//
//Your program must accept metric units.

$personsWeight = readline("Enter weight(kg) : ");
$personsHeight = readline("Enter height(m) : ");

if (!is_numeric($personsWeight) || !is_numeric($personsWeight)) {
    echo "Wrong input, please enter numbers";
    exit();
}

$BMIMetric = $personsWeight / pow($personsHeight, 2);

echo "BMI is = " . number_format($BMIMetric, 3,) . PHP_EOL;

if ($BMIMetric >= 18.5 && $BMIMetric <= 25) {
    echo "Weight is optimal.";
    exit();
} else if ($BMIMetric < 18.5) {
    echo "underweight";
    exit();
} else {
    echo "overweight";
    exit();
}

