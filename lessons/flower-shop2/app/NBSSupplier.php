<?php
class NBSSupplier implements Supplier
{
    private ProductCollection2 $products;

    public function __construct()
    {
        $this->products = new ProductCollection2;

        $this->products->add(
            new Product2(
                new Tank('Panzer', true), 100000
            ),
            3
        );

        $this->products->add(
            new Product2(
                new Plant('Tulips Yellow', true), 12
            ),
            250
        );
    }

    public function products(): ProductCollection2
    {
        return $this->products;
    }
}