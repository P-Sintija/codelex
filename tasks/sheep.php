<?php

$animalsArray = [];

function findWolf(array $animals): array
{
    $herd = [];
    for ($i = 0; $i < count($animals); $i++) {
        if ($animals[$i] === "wolf") {
            $herd[] = "HERE";
            continue;
        }
        if ((isset($animals[$i - 1]) && $animals[$i - 1] === "wolf") || (isset($animals[$i + 1]) && $animals[$i + 1] === "wolf")) {
            $herd[] = "OMG";
            continue;
        }
        $herd[] = "happy";
    }
    return $herd;
}

while (true) {
    $animal = readline("Enter animal (sheep/wolf) : ");
    $animalsArray[] = $animal;
    $end = strtoupper(readline("To find wolf press N : "));
    if ($end === "N") {
        echo implode(",", findWolf($animalsArray));
        exit();
    }
}

