<?php


require_once 'vendor/autoload.php';

use App\Service\ToyGenerator;


$generator = new ToyGenerator();
$toys = $generator->makeToys();

foreach ($toys->getAllToys() as $toy) {
    echo $toy->getName() . ' ' . $toy->getAmount() . PHP_EOL;
}


