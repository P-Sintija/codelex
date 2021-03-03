<?php

require_once 'Player.php';
require_once 'Element.php';
require_once 'SlotMachine_2.php';
require_once  'Line.php';


$player = new Player;

$player->setMoney(100);
$player->setBet(10);

//$element1 = new Element('*', 5);
//var_dump($element1); // ja šeit ieliek(string), tad __toString() atsauks tikai stringu

$machine = new SlotMachine_2([
    new Element('A', 5),
    new Element('B', 10),
    new Element('C', 15),
    new Element('D', 20),
    new Element('E', 25)
],5); // pielāgota 3x 3,4,5 loģikai;

$machine->roll();

foreach ($machine->slots() as $slots) {
    foreach ($slots as $element) {
        echo (string)$element . ' ';
    }
    echo PHP_EOL;
   // sleep(1);
}

echo $machine->getRewards();

