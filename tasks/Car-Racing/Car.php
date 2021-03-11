<?php

class Car implements Movable
{
    private string $symbol;
    private int $speedMin = 0;
    private int $speedMax = 0;
    private int $position = 0;
    private bool $finished = false;
    private int $result = 0;

    public function __construct(string $symbol, int $speedMin, int $speedMax)
    {
        $this->setSymbol($symbol);
        $this->setMinSpeed($speedMin);
        $this->setMaxSpeed($speedMax);
    }


    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setAtFinish(int $position): void
    {
        $this->position = $position;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setMinSpeed(int $speed): void
    {
        if ($speed < 0) return;
        $this->speedMin = $speed;
    }

    public function setMaxSpeed(int $speed): void
    {
        if ($speed < 0) return;
        $this->speedMax = $speed;
    }

    public function move(): void
    {
        if (!$this->finished) {
            $this->position = $this->position + rand($this->speedMin, $this->speedMax);
        }
    }

    public function setResult(int $time): void
    {
        if (!$this->finished) {
            $this->result = $time;
        }
    }

    public function getResult(): int
    {
        return $this->result;
    }

    public function setStatus(bool $finished): void
    {
        $this->finished = $finished;
    }

    public function getStatus(): bool
    {
        return $this->finished;
    }

    private function setSymbol(string $symbol): void
    {
        if (strlen($symbol) > 1) {
            $this->symbol = $symbol[0];
        } else if (strlen($symbol) === 0) {
            $this->symbol = '?';
        } else {
            $this->symbol = $symbol;
        }
    }


}



