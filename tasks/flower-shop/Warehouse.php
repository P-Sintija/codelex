<?php

interface Warehouse
{
    public function getWarehouseName(): string;

    public function getStockProducts(): FlowerCollection;

    public function getProductAmount(Flower $flower): int;
}

