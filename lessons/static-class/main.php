<?php
// klase nevar būt static, tik funkcijas vai propertijs
// piekļūst ne caur instanci new ..(), bet ::
// statiskais propertijs ir tikai VIENS
// var tikt no jebkurienes klāt un izmainīt vērtību ;(
// statiskās funkcijas noder formatēšanai



class Enum
{
    public static  int $number = 10;
}

var_dump(Enum::$number);
Enum::$number++;
var_dump(Enum::$number);


$enum = new Enum;
var_dump($enum::$number);

$enum2 = new Enum;
var_dump($enum2::$number);


