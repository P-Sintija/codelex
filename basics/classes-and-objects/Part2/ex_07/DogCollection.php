<?php

class DogCollection
{
    private array $dogList = [];

    public function __construct(array $dogs)
    {
        foreach ($dogs as $dog) {
            if ($dog instanceof Dog) {
                $this->dogList[] = $dog;
            }
        }
    }

    public function getDogs(): array
    {
        return $this->dogList;
    }

}

