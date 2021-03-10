<?php

class Product2
{
    private Sellable2 $sellable;
    private int $price;


    public function __construct(Sellable2 $sellable, int $price)
    {
        $this->sellable = $sellable;
        $this->price = $price;
    }

    public function sellable(): Sellable2
    {
        return $this->sellable;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function barCode(): string
    {
        return md5($this->sellable->id());
    }

}



