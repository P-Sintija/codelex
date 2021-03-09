<?php

class WarehouseThree implements Warehouse
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

    public function addToStock(Flower $flower, int $amount): void
    {
        $this->flowersInStock[] = [$flower, $amount];;
    }

    public function getStockProducts(): FlowerCollection
    {
        $collection = new FlowerCollection();
        foreach ($this->flowersInStock as $flower) {
            $collection->addFlowers($flower[0]);
        }
        return $collection;
    }

    public function getProductAmount(Flower $flower): int
    {
        $amount = 0;
        foreach ($this->flowersInStock as $product) {
            if ($product[0]->getFlowersName() === $flower->getFlowersName()) {
                $amount = $product[1];
            }
        }
        return $amount;
    }


}



