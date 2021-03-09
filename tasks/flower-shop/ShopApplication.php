<?php

class ShopApplication
{
    private FlowerShop $shop;

    public function __construct(FlowerShop $shop)
    {
        $this->shop = $shop;
    }

    function run()
    {
        $gender = readline('Enter your gender male/female :');
        $costumer = new FlowerShopCostumer;
        $costumer->setGender($gender);

        $this->showPricedGoods();

        $command = (int)readline('Pick a flower: ');
        if (!isset(array_keys($this->shop->pricedGoods())[$command - 1])) {
            echo "Sorry, I don't understand you..";
            exit;
        }

        $amount = (int)readline('Enter amount: ');
        $flower = array_keys($this->shop->pricedGoods())[$command - 1];
        if ($amount > $this->shop->pricedGoods()[$flower]['total']) {
            echo 'Sorry we do not have so many ' . $flower . '!';
            exit;
        }

        $price = $this->calculateFee($flower, $amount, $costumer);
        echo PHP_EOL . $amount . ' ' . $flower . ' will cost you $' . number_format($price / 100, 2) . PHP_EOL;
        echo PHP_EOL;

        $this->showCorrespondingWarehouses(new Flower($flower));

    }

    private function showPricedGoods(): void
    {
        echo PHP_EOL;
        $counter = 1;
        foreach ($this->shop->pricedGoods() as $flower => $values) {
            echo '[' . $counter++ . '] ' . $flower . ': $' .
                number_format($values['price'] / 100, 2) .
                '; In stock: ' . $values['total'] . PHP_EOL;
        }
        echo PHP_EOL;
    }

    private function calculateFee(string $flower, int $amount, FlowerShopCostumer $costumer): int
    {
        $discount = 0;
        if ($costumer->getGender() === $this->shop->getDiscountRecipient()) {
            $discount = $this->shop->getDiscount();
        }
        return $this->shop->determineFee($flower, $amount, $discount);
    }

    private function showCorrespondingWarehouses(Flower $flower): void
    {
        $warehouses = $this->shop->correspondingWarehouses($flower)->getWarehouseList();
        foreach ($warehouses as $warehouse) {
            echo $warehouse->getWarehouseName() . ': ' . $warehouse->getProductAmount($flower) . ' in stock' . PHP_EOL;
        }
    }

}

