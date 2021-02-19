<?php
//Write a program to play a word-guessing game like Hangman.
//
//It must randomly choose a word from a list of words.
//It must stop when all the letters are guessed.
//It must give them limited tries and stop after they run out.
//It must display letters they have already guessed (either only the incorrect guesses or all guesses).
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ _ _ _ _ _ _ _ _
//
//Misses:
//
//Guess:	e
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ _ _ _ _ _ _
//
//Misses:
//
//Guess:	i
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i _ _ _ _ _
//
//Misses:
//
//Guess:	a
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:
//
//Guess:	r
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:	r
//
//Guess:	s
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a _ _ a _
//
//Misses:	rs
//
//Guess:	t
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a _
//
//Misses:	rs
//
//Guess:	n
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a n
//
//Misses:	rs
//
//Guess:	o
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	_ e _ i a t _ a n
//
//Misses:	rso
//
//Guess:	l
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e _ i a t _ a n
//
//Misses:	rso
//
//Guess:	v
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e v i a t _ a n
//
//Misses:	rso
//
//Guess:	h
//
//-=-=-=-=-=-=-=-=-=-=-=-=-=-
//
//Word:	l e v i a t h a n
//
//Misses:	rso
//
//YOU GOT IT!
//
//Play "again" or "quit"? quit

$gameWords = [
    "difference",
    "awesome",
    "something",
    "game"
];

$word = $gameWords[rand(0, count($gameWords) - 1)];

$guessedLetters = array_fill(0, strlen($word), "_");
$misses = [];

$limitedTries = strlen($word) + 5;


while ($limitedTries > 0) {
    $limitedTries = $limitedTries - 1;
    $guess = readline("Enter your guess : ");
    for ($i = 0; $i < strlen($word); $i++) {
        if ($guess === $word[$i]) {
            $guessedLetters[$i] = $guess;
        }
    }

    if ($word[0] !== $guess && !strpos($word, $guess)) {
        $misses[] = $guess;
    }

    echo "Guesses left : " . $limitedTries . PHP_EOL;
    echo "Word : " . implode(" ", $guessedLetters) . PHP_EOL;
    echo "Misses : " . implode(" ", $misses) . PHP_EOL;
    echo "Guess : " . $guess . PHP_EOL;

    if (!in_array("_", $guessedLetters)) {
        echo "YOU GOT IT!!!";
        $limitedTries = 0;
    }

    if ($limitedTries === 0) {
        exit();
    }


}
