<?php

require_once 'Sells.php';


class Toy implements Sells
{
    private string $name;
    private int $size;

    public function __construct(string $name, int $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
        return 'TOY_' . $this->name() . '_' . $this->size;
    }
}