<?php

//Izveidot kazino spēli - "Slot machine"
//- Iespēja programmatūras sākumā ievadīt summu, ar cik spēlēs
//- Iespēja izvēlēties likmes summu. Likmes summas solis ir 10.
//- Iespējams spēlēt spēli ar vismaz 5 dažādiem elementiem
// (ērta iespēja pievienot jaunus elementus - t.i pievienot kodā/masīvā)
//- Spēlēšana - Uz ekrāna parādās pirmā līnija (3 elementi),
// pēc sekundes 2 līnija (3 elementi),
// pēc sekundes 3 līnija (3 elementi)
//- Savienošana - Savienošana notiek 5 līnijās (1, 2, 3 līnija kā līnija + 2 diognāles)
//- Uzvarētā summa ir atkarīga no elementa x ievadītās likmes lieluma koeficents (ja summa ir 10 - x1, 20 - x2, 30 - x3 utt.)
//- Pievienotām loģiskām validācijām, kā piemēram, beigusies nauda, vai nepietiek likmes naudas summa.
//
//PAPILDPUNKTI
//Lai iegūtu papildpunktus (50), izveidot opciju, kas savācot 3 noteiktus, spec. elementus, izveido 5 spēļu autospēlēšanu

require_once 'SlotMachineElement.php';
require_once 'SlotMachine.php';


$slotMachine = new SlotMachine();
$a = new SlotMachineElement('A', 1, false);
$b = new SlotMachineElement('B', 2, false);
$f = new SlotMachineElement('*', 3, true);
$c = new SlotMachineElement('C', 4, false);
$d = new SlotMachineElement('D', 5, false);

$slotMachine->addElement($a);
$slotMachine->addElement($b);
$slotMachine->addElement($f);
/////////////////////////$slotMachine->addElement($c);
/////////////////////////$slotMachine->addElement($d);


$userInput = readline("Insert money : ");
$slotMachine->setStartSum($userInput);


while (true) {

    echo 'Your start sum is ' . $slotMachine->getStartSum() . ' cents' . PHP_EOL;

    if($slotMachine->getStartSum() === 0) {
        echo 'You dont have any money left!' . PHP_EOL;
        exit;
    }

    $validation = false;
    while ($validation === false) {
        $userBet = readline("Enter your BET or any key to Exit : ");
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

}


















