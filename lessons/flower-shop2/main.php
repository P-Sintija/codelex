<?php

require_once 'Sellable2/Sells.php';
require_once 'Sellable2/Flower2.php';
require_once 'Sellable2/Toy.php';
require_once 'Sellable2/Tank.php';
require_once 'Sellable2/Plant.php';
require_once 'Product2.php';
require_once 'ProductCollection2.php';
require_once 'Shop2.php';
require_once 'Supplier.php';
require_once 'AmazingGardenSupplier.php';
require_once 'CoolGardenSupplier.php';
require_once 'WoopWoopSupplier.php';
require_once 'NBSSupplier.php';

$shop = new Shop2();
$shop->addSupplier(new AmazingGardenSupplier);
$shop->addSupplier(new CoolGardenSupplier);
$shop->addSupplier(new WoopWoopSupplier);

$age = 21;

if ($age >= 18)
{
    $shop->addSupplier(new NBSSupplier);
}

foreach ($shop->products()->all() as ['product' => $product, 'amount' => $amount])
{
    echo $product->sellable()->name() . ' ' . $product->price() . ' ( ' . $amount . ' )' . PHP_EOL;
}




