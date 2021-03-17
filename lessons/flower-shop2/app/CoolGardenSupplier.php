<?php
class CoolGardenSupplier implements Supplier
{
    private ProductCollection2 $products;

    public function __construct()
    {
        $this->products = new ProductCollection2;

        $this->products->add(
            new Product2(
                new Flower2('Tulips Yellow'), 10
            ),
            200
        );

        $this->products->add(
            new Product2(
                new Flower2('Tulips Red'), 12
            ),
            300
        );
    }

    public function products(): ProductCollection2
    {
        return $this->products;
    }
}

