<?php

class SlotMachine
{
    private int $startSum; //5eur piem 500
    private int $bet; // minimālais ar ko sāk, piem 10 centi utt
    private const step = 10;
    private const elementsInRow = 3;
    private array $elementList;
    private array $gameBoard;

    public function addElement(SlotMachineElement $element): void
    {
        $this->elementList[] = $element;
    }

    public function getElementList(): array
    {
        return $this->elementList;
    }

    public function setStartSum(int $cents): void
    {
        $this->startSum = $cents;
    }

    public function getStartSum(): int
    {
        return $this->startSum;
    }

    public function setBet(int $cents): void
    {
        $this->bet = $cents;
    }

    public function getBet(): int
    {
        return $this->bet;
    }

    public function validateBet(int $cents): bool
    {
        return $cents <= $this->startSum;
    }

    public function createGameGrid(): void
    {
        $row = array_fill(0, self::elementsInRow, "o");
        $this->gameBoard = array_fill(0, self::elementsInRow, $row);

        for ($i = 0; $i < self::elementsInRow; $i++) {
            for ($j = 0; $j < self::elementsInRow; $j++) {
                $this->gameBoard[$i][$j] = $this->elementList[rand(0, count($this->elementList) - 1)]->getElement();
            }
        }

    }


    public function displayGameBoard(): string
    {
        return $gridString = implode(PHP_EOL, array_map(function ($cell) {
                return implode(" ", $cell);
            }, $this->gameBoard)) . PHP_EOL;

    }

    public function countPoints(): int
    {
        $points = 0;
        $tested = false;
        for ($i = 0; $i < count($this->gameBoard); $i++) {
            if (($this->gameBoard[$i][0] === $this->gameBoard[$i][1] &&
                $this->gameBoard[$i][1] === $this->gameBoard[$i][2])) {
                echo "first";
                $points = $points + 1;
            }
            if ($this->gameBoard[0][$i] === $this->gameBoard[1][$i] &&
                $this->gameBoard[1][$i] === $this->gameBoard[2][$i]) {
                echo "second";
                $points = $points + 1;
            }
            if ($this->gameBoard[0][0] === $this->gameBoard[1][1] &&
                $this->gameBoard[1][1] === $this->gameBoard[2][2] && !$tested) {
                echo "third";
                $points = $points + 1;
                $tested = true;
            }
            if ($this->gameBoard[0][2] === $this->gameBoard[1][1] &&
                $this->gameBoard[1][1] === $this->gameBoard[2][0] && !$tested) {
                echo "forth";
                $points = $points + 1;
                $tested = true;
            }
        }
        return $points;
    }


}








