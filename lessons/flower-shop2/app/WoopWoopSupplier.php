<?php
class WoopWoopSupplier implements Supplier
{
    private ProductCollection2 $products;

    public function __construct()
    {
        $this->products = new ProductCollection2;

        $this->products->add(
            new Product2(
                new Flower2('Tulips Yellow'), 10
            ),
            100
        );

        $this->products->add(
            new Product2(
                new Flower2('Tulips Red'), 10
            ),
            100
        );

        $this->products->add(
            new Product2(
                new Toy('Lācis', 30), 200
            ),
            5
        );
    }

    public function products(): ProductCollection2
    {
        return $this->products;
    }
}