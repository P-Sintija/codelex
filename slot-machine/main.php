<?php

require_once 'SlotMachineElement.php';
require_once 'SlotMachine.php';


$slotMachine = new SlotMachine();
$a = new SlotMachineElement('A', 1);
$b = new SlotMachineElement('B', 2);
$f = new SlotMachineElement('*', 10);
$d = new SlotMachineElement('D', 4);
$e = new SlotMachineElement('E', 5);

$slotMachine->addElement($a);
$slotMachine->addElement($b);
$slotMachine->addElement($f);
$slotMachine->addElement($d);
$slotMachine->addElement($e);


$userInput = readline("Insert money : ");
$slotMachine->setStartSum($userInput);


while (true) {

    echo 'Your sum is ' . $slotMachine->getStartSum() . ' cents' . PHP_EOL;

    if ($slotMachine->getStartSum() === 0) {
        echo 'You dont have any money left!' . PHP_EOL;
        exit;
    }


    $validation = false;
    while ($validation === false) {
        $userBet = readline("Enter your BET or press any key to Exit : ");
        if (is_numeric($userBet)) {

            if ($slotMachine->validateBet($userBet)) {
                $slotMachine->decreaseStartSum($userBet);
                $slotMachine->setBet($userBet);
                print("\033[2J\033[;H");
                echo 'Your BET is ' . $slotMachine->getBet() . PHP_EOL;
                $validation = true;
            } else {
                echo 'You dont have enough money!' . PHP_EOL;
            }

        } else {
            echo 'Please take your ' . $slotMachine->getStartSum() . ' cents!!';
            exit;
        }
    }

    $slotMachine->createGameGrid();
    $grid = explode(PHP_EOL, $slotMachine->displayGameBoard());
    for ($i = 0; $i < count($grid); $i++) {
        echo $grid[$i] . PHP_EOL;
        sleep(1);
    }

    $slotMachine->setMoneyWon($slotMachine->countPoints());
    echo 'Won ' . $slotMachine->getMoneyWon() . ' cents!' . PHP_EOL;
    $slotMachine->setStartSum($slotMachine->getMoneyWon());


    $slotMachine->setFreeGame();
    if ($slotMachine->getFreeGames()) {
        $counter = 0;

        print("\033[2J\033[;H");

        while ($counter < 5) {

            echo 'Your sum is ' . $slotMachine->getStartSum() . ' cents' . PHP_EOL;
            $slotMachine->createGameGrid();
            $grid = explode(PHP_EOL, $slotMachine->displayGameBoard());
            for ($i = 0; $i < count($grid); $i++) {
                echo $grid[$i] . PHP_EOL;
                sleep(1);
            }

            $slotMachine->setMoneyWon($slotMachine->countPoints());
            echo 'Won ' . $slotMachine->getMoneyWon() . ' cents!' . PHP_EOL;
            $slotMachine->setStartSum($slotMachine->getMoneyWon());

            $counter++;
        }

    }

}




