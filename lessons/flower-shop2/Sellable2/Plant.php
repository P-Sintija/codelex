<?php
class Plant implements Sells
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
        return 'PLANT_' . $this->name();
    }
}
