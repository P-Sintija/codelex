<?php
///mantot var tikai public un protected ('mīksto private')

//parent:: metode - izsauc metodi no parent class atsevišķi

//public abstract function() -> abstrakta funkcija var būt TIKAI abstraktai klasei, visām apakšklasēm jāimplementē šī funkcija,
//visos objektos OGLIGĀTI JĀBŪT ŠAI FUNKCIJAI, bet saturs var būt savādāks;
// funkc jābūt - abstract public function jump ():void; bez satura





abstract class Food
{
public bool $isTasty = true;

 abstract public function size (): string;
}

class Burger extends Ingredient
{
    public  function size (): string{
        return 'b';
    }
}

class Sushi extends Ingredient
{
    public  function size (): string{
        return 's';
    }
}

class Brocoli extends Ingredient
{
    public bool $isTasty = false;

    public  function size (): string{
        return 'br';
    }
}

$foods = [new Burger(), new Sushi(), new Brocoli()];

foreach ($foods as $food) {
    echo $food->size() .PHP_EOL;
}



