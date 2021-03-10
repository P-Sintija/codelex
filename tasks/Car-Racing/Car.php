<?php

class Car implements Movable
{
    private string $name;
    private string $symbol;
    private int $speedMin;
    private int $speedMax;

    public function __construct(string $name, string $symbol, int $speedMin, int $speedMax)
    {
    $this->name = $name;
    $this->symbol = $symbol; // jānodrošinās max garums 1;
    $this->speedMin = $speedMin; // jānodrošinās, lai nevar ielikt neg sk
    $this->speedMax = $speedMax; // jānodrošinās, lai nevar ielikt neg sk
    }
}



