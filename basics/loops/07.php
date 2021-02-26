<?php
//Write a console program in a class named RollTwoDice that prompts the user for a desired sum,
// then repeatedly rolls two six-sided dice (using a Random object to generate random numbers from 1-6)
// until the sum of the two dice values is the desired sum. Here is the expected dialogue with the user:
//
//Desired sum: 9
//4 and 3 = 7
//3 and 5 = 8
//5 and 6 = 11
//5 and 6 = 11
//1 and 5 = 6
//6 and 3 = 9

class RollTwoDice
{
    private array $dice = [1, 2, 3, 4, 5, 6];
    private string $desiredSum;


    public function setDesiredSum(): void
    {
        $this->desiredSum = readline("Enter your desired sum from 2 to 12: ");
    }

    public function getDesiredSum(): string
    {
        return $this->desiredSum;
    }

    public function rollDice(): int
    {
        return $this->dice[rand(0, count($this->dice) - 1)];
    }

    public function checkIfWon(string $one, string $two): bool
    {
        return $this->desiredSum == (int)$one + (int)$two;
    }

}

$game = new RollTwoDice();
$game->setDesiredSum();

echo PHP_EOL . 'Desired sum: ' . $game->getDesiredSum() . PHP_EOL;

while (true) {

    $firstRoll = $game->rollDice();
    $secondRoll = $game->rollDice();
    $sum = $firstRoll + $secondRoll;
    echo "$firstRoll and $secondRoll = $sum" . PHP_EOL;

    if ($game->checkIfWon($firstRoll, $secondRoll)) {
        exit();
    }
}


