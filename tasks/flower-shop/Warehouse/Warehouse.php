<?php

interface Warehouse
{
    public function getWarehouseName(): string;

    public function getStockProducts(): SellableCollection;

    public function getProductAmount(Sellable $item): int;
}

