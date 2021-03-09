<?php

require_once 'Player.php';
require_once 'Element.php';
require_once 'SlotMachine2.php';
require_once 'Line.php';


//$element1 = new Element('*', 5);
//var_dump($element1); // ja šeit ieliek(string), tad __toString() atsauks tikai stringu

$machine = new SlotMachine2([
    new Element('A', 1),
    new Element('B', 2),
    new Element('C', 3),
    new Element('D', 4),
    new Element('E', 5)
], 5); // pielāgota 3x 3,4,5 loģikai;




function drawSlotMachine(SlotMachine2 $machine): void
{
    foreach ($machine->slots() as $slots) {
        foreach ($slots as $element) {
            echo (string)$element . ' ';
        }
        echo PHP_EOL;
         sleep(1);
    }
}

function checkTotalMoney(int $amount): bool
{
    if ($amount === 0) {
        return false;
    }
    return true;
}


$player = new Player;
$userStartMoney = (int)readline('Insert money : ');
$player->setMoney($userStartMoney);

while (true) {

    print("\033[2J\033[;H");
    echo 'Balance: ' . number_format($player->getMoney() / 100, 2) . ' EUR' . PHP_EOL;
    $bet = (int)readline('Your bet: ');
    $player->setBet($bet);
    echo 'Bet: ' . number_format($player->getBet() / 100, 2) . ' EUR' . PHP_EOL;
    $machine->roll();
    drawSlotMachine($machine);
    $won = $machine->getRewards($player);
    echo 'Won: ' . number_format($won / 100, 2) . ' EUR' . PHP_EOL;
    $player->bet($bet);
    $player->getWin($won);


    if (!checkTotalMoney($player->getMoney())) {
        echo 'You dont have any money left!' . PHP_EOL;
        exit;
    }

    echo 'Balance now : ' . number_format($player->getMoney() / 100, 2) . ' EUR' . PHP_EOL;

    $continue = readline('Bet again (y) ? ');

    if($continue !== 'y') {
        echo 'Please take your ' . number_format($player->getMoney() / 100, 2) . ' EUR' . PHP_EOL;;
        exit;
    }

}




