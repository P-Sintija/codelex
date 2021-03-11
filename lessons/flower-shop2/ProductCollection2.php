<?php

class ProductCollection2
{
    private array $products = [];

    public function add(Product2 $product, int $amount = 1)
    {
        $barCode = $product->barCode();

        if (isset($this->products[$barCode]))
        {
            $this->products[$barCode]['amount'] += $amount;
            return;
        }

        $this->products[$barCode] = [
            'product' => $product,
            'amount' => $amount
        ];
    }

    public function all(): array
    {
        return $this->products;
    }


}

