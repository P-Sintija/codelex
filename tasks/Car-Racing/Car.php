<?php

class Car implements Movable
{
    private string $symbol = '';
    private int $speedMin = 0;
    private int $speedMax = 0;
    private int $mileage = 0;
    private int $crushAbility = 0;
    private bool $crushed = false;
    private bool $finished = false;

    public function __construct(int $speedMin, int $speedMax, int $crushAbility)
    {
        $this->setMinSpeed($speedMin);
        $this->setMaxSpeed($speedMax);
        $this->setCrushAbility($crushAbility);
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }

    public function setCrushAbility(int $crushAbility): void
    {
        if ($crushAbility < 0) return;
        $this->crushAbility = $crushAbility;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function move(): void
    {
        if (!$this->finished) {
            $this->mileage = $this->mileage + rand($this->speedMin, $this->speedMax);
        }
    }

    public function setMileage(int $position): void
    {
        $this->mileage = $position;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }


    public function crush(): void
    {
        if (!$this->finished) {
            $randomNumber = rand(0, 100);
            if ($randomNumber <= $this->crushAbility) {
                $this->crushed = true;
                $this->stop();
            }
        }
    }

    public function stop(): void
    {
        $this->setMinSpeed(0);
        $this->setMaxSpeed(0);
        $this->setRaceFinished();

    }


    public function setRaceFinished(): void
    {
        $this->finished = true;
    }

    public function hasCrushed(): bool
    {
        return $this->crushed;
    }

    public function raceFinished(): bool
    {
        return $this->finished;
    }


    private function setMinSpeed(int $speed): void
    {
        if ($speed < 0) return;
        $this->speedMin = $speed;
    }

    private function setMaxSpeed(int $speed): void
    {
        if ($speed < 0) return;
        $this->speedMax = $speed;
    }

}



