<?php
//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd, or “Even Number” otherwise.
// The program shall always print “bye!” before exiting.


function CheckOddEven(int $input): bool
{
    return $input % 2 === 0;
}

while (true) {

    $number = readline(" Enter number : ");

    if (!is_numeric($number)) {
        echo "Not a number";
        $number = readline(" Enter number : ");
    }

    if (CheckOddEven($number)) {
        echo "Even Number" . PHP_EOL;
    } else {
        echo "Odd Number" . PHP_EOL;
    }

    $exit = strtoupper(readline("Do you want to exit? press y : "));
    if ($exit === "Y") {
        echo PHP_EOL . "Bye";
        exit();
    }

}




