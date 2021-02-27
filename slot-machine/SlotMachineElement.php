<?php

class SlotMachineElement
{
    private string $name;
    private int $rate;
    private bool $freeGames;

    public function __construct(string $element, int $rate, bool $freeGames)
    {
        $this->name = $element;
        $this->rate = $rate;
    }

    public function getElement(): string
    {
        return $this->name;
    }

    public function getRate(): int
    {
        return $this->rate;
    }

    public function getFreeGames(): bool
    {
        return $this->freeGames;
    }

}


