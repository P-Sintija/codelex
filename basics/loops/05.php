<?php
//Write a console program in a class named Piglet that implements a simple 1-player dice game called "Piglet"
//(based on the game "Pig"). The player's goal is to accumulate as many points as possible without rolling a 1.
//Each turn, the player rolls the die; if they roll a 1, the game ends and they get a score of 0.
//Otherwise, they add this number to their running total score.
//The player then chooses whether to roll again, or end the game with their current point total.
//Here is an example dialogue where the user plays until rolling a 1, which ends the game with 0 points:
//
//Welcome to Piglet!
//You rolled a 5!
//Roll again? yes
//You rolled a 4!
//Roll again? yes
//You rolled a 1!
//You got 0 points.
//Here is another example dialogue where the user stops early and gets to end the game with 10 points:
//
//Welcome to Piglet!
//You rolled a 6!
//Roll again? y
//You rolled a 2!
//Roll again? y
//You rolled a 2!
//Roll again? n
//You got 10 points.

class Piglet
{
    public array $dice;
    public int $points;

    public function __construct()
    {
        $this->dice = [1, 2, 3, 4, 5, 6];
        $this->points = 0;
    }

    function rollDice(): int
    {
        return $this->dice[rand(0, count($this->dice) - 1)];
    }

    function sumPoints(int $points): int
    {
        return $this->points = $this->points + $points;
    }

}

$piglet = new Piglet();

while (true) {

    $rolledPoints = $piglet->rollDice();
    echo "You rolled a $rolledPoints!" . PHP_EOL;
    $piglet->sumPoints($rolledPoints);

    if ($rolledPoints === 1) {
        $piglet->points = 0;
        echo "You got $piglet->points points.";
        exit();
    }

    $status = strtoupper(readline("Roll again? : "));
    if ($status === "N") {
        echo "You got $piglet->points points.";
        exit();
    }
}


