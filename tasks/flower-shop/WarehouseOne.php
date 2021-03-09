<?php

class WarehouseOne implements Warehouse
{
    private string $name;
    private array $flowersInStock;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getWarehouseName(): string
    {
        return $this->name;
    }

    public function addToStock(string $flower, int $amount): void
    {
        $this->flowersInStock[$flower] = $amount;
    }

    public function getStockProducts(): FlowerCollection
    {
        $collection = new FlowerCollection();
        foreach (array_keys($this->flowersInStock) as $flowerName) {
            $collection->addFlowers(new Flower($flowerName));
        }
        return $collection;
    }

    public function getProductAmount(Flower $flower): int
    {
        return $this->flowersInStock[$flower->getFlowersName()];
    }

}

