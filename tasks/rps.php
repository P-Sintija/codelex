<?php
$options = [
    "Rock" => "R",
    "Paper" => "P",
    "Scissors" => "S"
];
$keys = array_keys($options);

$userChoice = strtoupper(readline("Enter your option (R,P or S) : "));
$user = "";

for ($i = 0; $i < count($keys); ++$i) {
    if ($options[$keys[$i]] === $userChoice) {
        $user = $keys[$i];
        echo "User : " . $user . PHP_EOL;
    }
    if (!in_array($userChoice, $options)) {
        echo "choose something else ";
        exit();
    }
}

$pcChoice = $keys[rand(0, 2)];
echo "PC : " . $pcChoice . PHP_EOL;


if ($user === $pcChoice) {
    echo "It`s a tie!!";
}

$winningCombinations = [["Rock", "Scissors"], ["Paper", "Rock"], ["Scissors", "Paper"]];

for ($i = 0; $i < count($winningCombinations); $i++) {
    if ($user === $winningCombinations[$i][0] && $pcChoice === $winningCombinations[$i][1]) {
        echo "User won!!" . PHP_EOL;
    } else if ($user === $winningCombinations[$i][1] && $pcChoice === $winningCombinations[$i][0]) {
        echo "PC won!!" . PHP_EOL;
    }
}

