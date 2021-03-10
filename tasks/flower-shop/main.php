<?php

require_once 'Sellable/Sellable.php';
require_once 'Sellable/Flower.php';
require_once 'Sellable/Candle.php';
require_once 'Sellable/SellableCollection.php';

require_once 'Warehouse/Warehouse.php';
require_once 'Warehouse/WarehouseOne.php';
require_once 'Warehouse/WarehouseTwo.php';
require_once 'Warehouse/WarehouseThree.php';
require_once 'Warehouse/WarehouseCollection.php';

require_once 'FlowerShop.php';
require_once 'Product.php';
require_once 'ProductCollection.php';
require_once 'ShopApplication.php';
require_once 'FlowerShopCostumer.php';


$flower = 'flower';
$candle = 'candle';


$wareHouse1 = new WarehouseOne('Storage ONE');
$wareHouse1->addToStock(new Flower('tulip', 'flower'));
$wareHouse1->addToStock(new Flower('lily', 'flower'));
$wareHouse1->addToStock(new Candle('ordinary', 'candle'));

$wareHouse1->addItemsAmount(new Flower('tulip', 'flower'), 100);
$wareHouse1->addItemsAmount(new Flower('lily', 'flower'), 50);
$wareHouse1->addItemsAmount(new Candle('ordinary', 'candle'), 20);


$wareHouse2 = new WarehouseTwo('Storage TWO');
$wareHouse2->addToStock([
    [new Flower('lily', 'flower'), 10],
    [new Flower('rose', 'flower'), 40],
    [new Candle('honey', 'candle'), 10],
    [new Flower('daffodil', 'flower'), 30]
]);

$wareHouse3 = new WarehouseThree('Storage THREE');
$wareHouse3->addToStock(new Candle('aromatherapy', 'candle'), 20);
$wareHouse3->addToStock(new Flower('tulip', 'flower'), 100);
$wareHouse3->addToStock(new Flower('lily', 'flower'), 350);
$wareHouse3->addToStock(new Flower('cactus', 'flower'), 150);


$shopWarehouses = new WarehouseCollection;
$shopWarehouses->addWarehouse($wareHouse1);
$shopWarehouses->addWarehouse($wareHouse2);
$shopWarehouses->addWarehouse($wareHouse3);


$shop = new FlowerShop;
$shop->setWarehouses($shopWarehouses);
$shop->createProductList();

$shop->setProductPrice(new Product(new Flower('tulip', 'flower')), 100);
$shop->setProductPrice(new Product(new Flower('lily', 'flower')), 350);
$shop->setProductPrice(new Product(new Flower('rose', 'flower')), 200);
$shop->setProductPrice(new Product(new Flower('daffodil', 'flower')), 80);
$shop->setProductPrice(new Product(new Flower('cactus', 'flower')), 250);
$shop->setProductPrice(new Product(new Candle('ordinary', 'candle')), 150);
$shop->setProductPrice(new Product(new Candle('honey', 'candle')), 250);
$shop->setProductPrice(new Product(new Candle('aromatherapy', 'candle')), 500);

$shop->setDiscountConditions(20, 'female');


$app = new ShopApplication($shop);
$app->run();

