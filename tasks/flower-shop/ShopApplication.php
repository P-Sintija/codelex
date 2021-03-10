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

        $productList = $this->shop->onlyPricedProducts();
        $command = (int)readline('Pick a product: ');
        if ($command > count($productList) || $command <= 0) {
            echo "Sorry, I don't understand you..";
            exit;
        }

        $item = $productList[$command - 1];

        $amount = (int)readline('Enter amount: ');
        if ($amount > $item->getAmount()) {
            echo 'Sorry we do not have so many ' . $item->getProduct()->getItemsName() . '!';
            exit;
        }

        $price = $this->calculateFee($item, $amount, $costumer);
        echo PHP_EOL . $amount . ' ' . $item->getProduct()->getItemsName() . ' will cost you $' .
            number_format($price / 100, 2) . PHP_EOL;
        echo PHP_EOL;

        $this->showCorrespondingWarehouses(new Product($item->getProduct()));
    }

    private function showPricedGoods(): void
    {
        echo PHP_EOL;
        $counter = 1;

        foreach ($this->shop->onlyPricedProducts() as $products) {
            echo '[' . $counter++ . '] ' .
                $products->getProduct()->getItemsType() . ' ' .
                $products->getProduct()->getItemsName() . ': $' .
                number_format($products->getPrice() / 100, 2) . '; In stock: ' .
                $products->getAmount() .
                PHP_EOL;
        }

    }


    private function calculateFee(Product $item, int $amount, FlowerShopCostumer $costumer): int
    {
        $discount = 0;
        if ($costumer->getGender() === $this->shop->getDiscountRecipient()) {
            $discount = $this->shop->getDiscount();
        }
        return $this->shop->determineFee($item, $amount, $discount);
    }


    private function showCorrespondingWarehouses(Product $item): void
    {
        $warehouses = $this->shop->correspondingWarehouses($item)->getWarehouseList();

        foreach ($warehouses as $warehouse) {
            echo $warehouse->getWarehouseName() . ': ' . $warehouse->getProductAmount($item->getProduct()) . ' in stock' . PHP_EOL;
        }
    }

}

