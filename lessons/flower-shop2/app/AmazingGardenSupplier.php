<?php
class AmazingGardenSupplier implements Supplier
{
    private ProductCollection2 $products;

    public function __construct()
    {
        $this->products = new ProductCollection2;

        $this->products->add(
            new Product2(
                new Flower2('Tulips Yellow'), 14
            ),
            300
        );

        $this->products->add(
            new Product2(
                new Flower2('Tulips Red'), 12
            ),
            600
        );
    }

    public function products(): ProductCollection2
    {
        return $this->products;
    }
}

