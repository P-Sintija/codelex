<?php
//Write a program to produce the sum of 1, 2, 3, ..., to 100. Store 1 and 100 in variables lower bound and upper bound,
// so that we can change their values easily. Also compute and display the average.
// The output shall look like:
//The sum of 1 to 100 is 5050
//The average is 50.5

$lowerBound = readline("Enter lower bound : ");
$upperBound = readline("Enter upper bound : ");

function validate(string $input): bool
{
    $valueInteger = (int)$input;
    $valueFloat = (float)$input;

    return is_numeric($input) && $valueInteger == $valueFloat;
}


if (!validate($lowerBound) || !validate($upperBound)) {
    echo "Error!";
    exit();
}


function createArray(float $lower, float $upper): array
{
    $storage = [];
    for ($i = $lower; $i <= $upper; $i++) {
        $storage[] = $i;
    }
    return $storage;
}

$allNumbers = createArray($lowerBound, $upperBound);

echo "The sum of $lowerBound to $upperBound is " . array_sum($allNumbers) . PHP_EOL;
echo "The average is " . array_sum($allNumbers) / count($allNumbers);
