<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: " . PHP_EOL;
foreach ($numbers as $item) {
    echo $item . PHP_EOL;
}

//todo
echo PHP_EOL . "Sorted numeric array: " . PHP_EOL;
$sortedNumbers = $numbers;
asort($sortedNumbers, SORT_NUMERIC);
foreach ($sortedNumbers as $item) {
    echo $item . PHP_EOL;
}


$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];

//todo
echo PHP_EOL . "Original string array: " . PHP_EOL;
foreach ($words as $word) {
    echo $word . PHP_EOL;
}

//todo
echo PHP_EOL . "Sorted string array: " . PHP_EOL;
$sortedWords = $words;
asort($sortedWords);
foreach ($sortedWords as $word) {
    echo $word . PHP_EOL;
}
