<?php

class SlotMachineElement
{
    private string $name;
    private int $rate;

    public function __construct(string $element, int $rate)
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


}


