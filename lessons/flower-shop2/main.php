<?php

require_once 'Sellable2/Flower2.php';
require_once 'Sellable2/Toy.php';
require_once 'Sellable2/Sells.php';
require_once 'Product2.php';
require_once 'ProductCollection2.php';

$products = new ProductCollection2;
$products->add(new Product2(new Flower2('Tulip'),10),200);
$products->add(new Product2(new Toy('Teddy', 3),10),200);

var_dump($products);
//$flower = new Flower2('Tulip');





