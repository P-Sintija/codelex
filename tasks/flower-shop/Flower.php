<?php

class Flower
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getFlowersName(): string
    {
        return $this->name;
    }
}


