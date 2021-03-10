<?php
class Flower2 implements Sellable2
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function id(): string
    {
      //  return
    }

}

