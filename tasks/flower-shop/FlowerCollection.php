<?php

class FlowerCollection
{
    private array $flowerList;

    public function addFlowers(Flower $flower): void
    {
        $this->flowerList[] = $flower;
    }

    public function getFlowerList(): array
    {
        return $this->flowerList;
    }
}


