<?php

class FlowerShop
{
    private WarehouseCollection $warehouseList;
    private FlowerCollection $flowersInWarehouses;
    private array $goods = [];
    private int $discount = 0;
    private ?string $discountRecipient;

    public function setWarehouses(WarehouseCollection $warehouses): void
    {
        $this->warehouseList = $warehouses;
    }

    public function setFlowerList(): void
    {
        $this->flowersInWarehouses = new FlowerCollection();
        foreach ($this->warehouseList->getWarehouseList() as $warehouse) {
            foreach ($warehouse->getStockProducts()->getFlowerList() as $flower) {
                if ($warehouse->getProductAmount($flower) > 0) {
                    $this->flowersInWarehouses->addFlowers($flower);
                }
            }
        }
        $this->createGoodsList();
    }


    public function setGoodsPrice(Flower $flower, int $price): void
    {
        if ($price > 0 && array_key_exists($flower->getFlowersName(), $this->goods)) {
            $this->goods[$flower->getFlowersName()]['price'] = $price;
        }
    }

    public function pricedGoods(): array
    {
        $pricedGoods = [];
        foreach ($this->goods as $flower => $values) {
            if ($values['price'] > 0) {
                $pricedGoods[$flower] = $values;
            }
        }
        return $pricedGoods;
    }


    public function setDiscountConditions(int $discount, ?string $gender = null): void
    {
        $this->setDiscount($discount);
        $this->setDiscountRecipient($gender);
    }

    public function getDiscountRecipient(): ?string
    {
        return $this->discountRecipient;
    }

    public function getDiscount(): int
    {
        return $this->discount;
    }


    public function determineFee(string $flower,int $amount,int $discount): int
    {
        if ($amount < 0) {
            $amount = 0;
        }
        return $this->goods[$flower]['price'] * $amount * (100 - $discount) / 100;;
    }


    public function correspondingWarehouses(Flower $flower): WarehouseCollection
    {
        $warehouses = new WarehouseCollection;
        foreach ($this->warehouseList->getWarehouseList() as $warehouse) {
            if (in_array($flower, $warehouse->getStockProducts()->getFlowerList())) {
                $warehouses->addWarehouse($warehouse);
            }
        }
        return $warehouses;
    }


    private function createGoodsList(): void
    {
        foreach ($this->flowersInWarehouses->getFlowerList() as $flower) {
            if (!array_key_exists($flower->getFlowersName(), $this->goods)) {
                $this->goods[$flower->getFlowersName()] = [
                    'price' => 0,
                    'total' => $this->setGoodsAmount($flower)];
            }
        }
    }

    private function setGoodsAmount(Flower $flower): int
    {
        $amount = [];
        foreach ($this->warehouseList->getWarehouseList() as $warehouse) {
            if (in_array($flower, $warehouse->getStockProducts()->getFlowerList())) {
                $amount[] = $warehouse->getProductAmount($flower);
            }
        }
        return array_sum($amount);
    }


    private function setDiscount(int $discount): void
    {
        if ($discount > 0) {
            $this->discount = $discount;
        }
    }

    private function setDiscountRecipient(?string $gender = null): void
    {
        $this->discountRecipient = $gender;
    }

}


