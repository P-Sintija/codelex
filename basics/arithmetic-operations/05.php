<?php
//Write a program that picks a random number from 1-100. Give the user a chance to guess it. If they get it right, tell them so.
// If their guess is higher than the number, say "Too high."
// If their guess is lower than the number, say "Too low." Then quit. (They don't get any more guesses for now.)
//
//I'm thinking of a number between 1-100.  Try to guess it.
//> 13
//
//Sorry, you are too low.  I was thinking of 34.
//I'm thinking of a number between 1-100.  Try to guess it.
//> 79
//
//Sorry, you are too high.  I was thinking of 51.
//I'm thinking of a number between 1-100.  Try to guess it.
//> 42
//
//You guessed it!  What are the odds?!?

$numberToGuess = rand(1, 100);

$guess = readline("Guess a number between 1-100 : ");

function validate(string $input): bool
{
    $valueInteger = (int)$input;
    $valueFloat = (float)$input;
    return is_numeric($input) && $valueInteger == $valueFloat;
}

if (!validate($guess)) {
    echo "Try again and input a integer" . PHP_EOL;
    $guess = readline("Guess a number between 1-100 : ");
}


if ($numberToGuess == $guess) {
    echo "You got it right!";
} else if ($numberToGuess < $guess) {
    echo "Sorry, you are too high. The number was $numberToGuess .";
} else {
    echo "Sorry, you are too low. The number was $numberToGuess .";
}
