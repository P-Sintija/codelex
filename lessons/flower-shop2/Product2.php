<?php

class Product2
{
    private Sells $sellable;
    private int $price;


    public function __construct(Sells $sellable, int $price)
    {
        $this->sellable = $sellable;
        $this->price = $price;
    }

    public function sellable(): Sells
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
      //  return $this->sellable->id();
    }

}



