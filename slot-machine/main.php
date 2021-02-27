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
$a = new SlotMachineElement('A');
$b = new SlotMachineElement('B');
$c = new SlotMachineElement('C');
$d = new SlotMachineElement('D');
$e = new SlotMachineElement('E');

$slotMachine->addElement($a);
$slotMachine->addElement($b);
$slotMachine->addElement($c);
/////////////////////$slotMachine->addElement($d);
/////////////////////////////$slotMachine->addElement($e);

/*
$userInput = readline("Insert money : ");
$slotMachine->setStartSum($userInput);
echo 'Your start sum is ' . $slotMachine->getStartSum() . PHP_EOL;

$validation = false;
while ($validation === false) {
    $userBet = readline("Your bet : ");
    if ($slotMachine->validateBet($userBet)) {
        $slotMachine->setBet($userBet);
        echo 'Your bet is ' . $slotMachine->getBet() . PHP_EOL;
        $validation = true;
    } else {
        echo 'You dont have enough money!' . PHP_EOL;
    }
}
*/

$slotMachine->createGameGrid();
echo $slotMachine->displayGameBoard();
echo $slotMachine->countPoints();
















