<?php

require_once 'Flower.php';
require_once 'FlowerCollection.php';
require_once  'Warehouse.php';
require_once  'WarehouseOne.php';
require_once  'WarehouseTwo.php';
require_once  'WarehouseThree.php';
require_once  'WarehouseCollection.php';
require_once 'FlowerShop.php';
require_once 'ShopApplication.php';
require_once 'FlowerShopCostumer.php';


$wareHouse1 = new WarehouseOne('Storage ONE');
$wareHouse1->addToStock('tulip', 20);
$wareHouse1->addToStock('daffodil', 30);
$wareHouse1->addToStock('lily', 10);
$wareHouse1->addToStock('cactus', 3);

$wareHouse2 = new WarehouseTwo('Storage TWO');
$wareHouse2->addToStock([
    ['lily', 10],
    ['cactus', 150],
    ['rose', 40]
]);

$wareHouse3 = new WarehouseThree('Storage THREE');
$wareHouse3->addToStock(new Flower('tulip'), 100);
$wareHouse3->addToStock(new Flower('daffodil'), 90);
$wareHouse3->addToStock(new Flower('lily'), 350);
$wareHouse3->addToStock(new Flower('cactus'), 150);


$shop = new FlowerShop();
$shopWarehouses = new WarehouseCollection;
$shopWarehouses->addWarehouse($wareHouse1);
$shopWarehouses->addWarehouse($wareHouse2);
$shopWarehouses->addWarehouse($wareHouse3);

$shop->setWarehouses($shopWarehouses);
$shop->setFlowerList();

$shop->setGoodsPrice(new Flower('tulip'), 100);
$shop->setGoodsPrice(new Flower('daffodil'), 80);
$shop->setGoodsPrice(new Flower('lily'), 350);
$shop->setGoodsPrice(new Flower('cactus'), 250);
$shop->setGoodsPrice(new Flower('rose'), 200);

$shop->setDiscountConditions(20, 'female');

$app = new ShopApplication($shop);
$app->run();







