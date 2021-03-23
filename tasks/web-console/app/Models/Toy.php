<?php

namespace App\Models;

class Toy
{
    private string $name;
    private string $amount;

    public function __construct(string $name, int $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount():int
    {
        return $this->amount;
    }
}

