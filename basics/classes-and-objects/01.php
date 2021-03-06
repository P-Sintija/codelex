<?php
//Create a class Product that represents a product sold in a shop. A product has a price, amount and name.
//
//The class should have:
//
//A constructor Product(string name, double price_at_start, int amount_at_start)
//A function print_product() that prints a product in the following form:
//Banana, price 1.1, amount 13
//Test your code by creating a class with main method and add three products there:
//
//"Logitech mouse", 70.00 EUR, 14 units
//"iPhone 5s", 999.99 EUR, 3 units
//"Epson EB-U05", 440.46 EUR, 1 units
//Print out information about them.
//
//Add new behaviour to the Product class:
//
//possibility to change quantity
//possibility to change price
//Reflect your changes in a working application.

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $priceAtStart, int $amountAtStart)
    {
        $this->name = $name;
        $this->price = $priceAtStart;
        $this->amount = $amountAtStart;
    }

    public function printProduct(): string
    {
        return $this->name . ", " . $this->price . " EUR, " . $this->amount . " units";
    }

    public function changeQuantity(int $amount): void
    {
        $this->amount = $this->amount + $amount;
    }

    public function changePrice(float $price): void
    {
        $this->price = $this->price + $price;
    }

}

class ProductList
{
    private array $products;


    public function printAllProducts(): string
    {
        return implode(PHP_EOL, array_map(function (Product $product): string {
            return $product->printProduct();
        }, $this->products));
    }

    public function addNewProduct(Product $input): void
    {
        $this->products[] = $input;
    }

}


$logitech = new Product("Logitech mouse", 70.00, 14);
$iphone = new Product("iPhone 5s", 999.99, 3);
$epson = new Product("Epson EB-U05", 440.46, 1);

$list = new ProductList();

$list->addNewProduct($logitech);
$list->addNewProduct($iphone);
$list->addNewProduct($epson);

echo $list->printAllProducts();

$logitech->changePrice(-23.85);
$iphone->changeQuantity(2);

echo PHP_EOL . $list->printAllProducts();



