<?php
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

echo "Enter the value to search for: ";

//todo check if an array contains a value user entered

$userValue = readline("");

function checkValue(string $input): bool
{
    global $numbers;
    $identical = false;
    for ($i = 0; $i < count($numbers); $i++) {
        if ($numbers[$i] == $input) {
            $identical = true;
        }
    }
    return $identical;
}

if (checkValue($userValue)) {
    echo "Array contains user value";
} else {
    echo "Array does not contain user value";
}
