<?php

class SlotMachine
{
    private int $startSum;
    private int $bet;
    private int $moneyWon = 0;
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
        return $gridString = implode(PHP_EOL, array_map(function ($cell): string {
                return implode(" ", $cell);
            }, $this->gameBoard)) . PHP_EOL;
    }

    private function elementValue(string $name): int
    {
        $points = 0;
        for ($i = 0; $i < count($this->elementList); $i++) {
            if ($name === $this->elementList[$i]->getElement()) {
                $points = $this->elementList[$i]->getRate();
            }
        }
        return $points;
    }


    public function countPoints(): int
    {
        $points = 0;
        $tested = false;
        for ($i = 0; $i < count($this->gameBoard); $i++) {
            if (($this->gameBoard[$i][0] === $this->gameBoard[$i][1] &&
                $this->gameBoard[$i][1] === $this->gameBoard[$i][2])) {
                $points = $points + $this->elementValue($this->gameBoard[$i][0]);
            }
            if ($this->gameBoard[0][$i] === $this->gameBoard[1][$i] &&
                $this->gameBoard[1][$i] === $this->gameBoard[2][$i]) {
                $points = $points + $this->elementValue($this->gameBoard[0][$i]);
            }
            if ($this->gameBoard[0][0] === $this->gameBoard[1][1] &&
                $this->gameBoard[1][1] === $this->gameBoard[2][2] && !$tested) {
                $points = $points + $this->elementValue($this->gameBoard[0][0]);
                $tested = true;
            }
            if ($this->gameBoard[0][2] === $this->gameBoard[1][1] &&
                $this->gameBoard[1][1] === $this->gameBoard[2][0] && !$tested) {
                $points = $points + $this->elementValue($this->gameBoard[0][2]);
                $tested = true;
            }
        }
        return $points;
    }

    public function setMoneyWon(int $points): void
    {
        $this->moneyWon = $this->moneyWon + $this->bet * $points;
    }

    public function getMoneyWon(): int
    {
        return $this->moneyWon;
    }

}








