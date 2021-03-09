<?php

class WarehouseTwo implements Warehouse
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

    public function addToStock(array $flowers): void
    {
        foreach ($flowers as $flower) {
            if (is_string($flower[0]) && is_integer($flower[1]) && count($flower) === 2) {
                $this->flowersInStock[$flower[0]] = $flower[1];
            }
        }
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


