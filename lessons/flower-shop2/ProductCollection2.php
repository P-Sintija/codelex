<?php

class ProductCollection2
{
    private array $products;

    public function __construct(array $products)
    {

    }

    public function add (Product2 $product): void
    {
        $barCode = $product->barCode();
        if(isset($this->products[$barCode])){
            $this->products[$barCode]['amount']++;
            return;
        }
        $this->products[$barCode] = [
            'product' => $product,
            'amount' => $amout
        ];
     }

}

