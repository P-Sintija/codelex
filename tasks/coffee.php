<?php


$wallet = [
    1 => 0,
    2 => 2,
    5 => 0,
    10 => 1,
    20 => 0,
    50 => 3,
    100 => 3,
    200 => 0
];

$coinSum = [];
$payed = 0;

$coffeeMachine = [
    "latte" => 1.80,
    "black" => 1.30,
    "white" => 1.50
];

function walletStartSum(array $coins, array $sum): array
{
    foreach ($coins as $key => $value) {
        if ($value !== 0) {
            $value = $value * (int)$key;
            $sum[] = $value;
            continue;
        }
        $sum[] = $value;
    }
    return $sum;
}

$userMoney = array_sum(walletStartSum($wallet, $coinSum));

echo "You have $userMoney cents." . PHP_EOL;

function walletSum(int &$coins, string $userInput): int
{
    $coins = $coins - $userInput;
    return $coins;
}

function choseCoffee($allCoffee): array
{
    while (true) {
        $userChoice = readline("Coffee ? ");
        $selectedCoffee = [];
        if (array_key_exists($userChoice, $allCoffee)) {
            $selectedCoffee[] = $userChoice;
            $selectedCoffee[] = $allCoffee[$userChoice] * 100;
            return $selectedCoffee;
        }
    }

}


function validateMoney(): string
{
    while (true) {
        $userInput = readline("Insert coins: ");
        $valueInteger = (int)$userInput;
        $valueFloat = (float)$userInput;
        if (is_numeric($userInput) && $valueInteger == $valueFloat) {
            return $userInput;
        } else {
            echo "Not valid!";
        }
    }

}


function insertedMoney(int &$payment, string $userInput): int
{
    $payment = $payment + (int)$userInput;
    return $payment;
}

function returnBalance(int $total, int $payment): int
{
    return $total - $payment;
}

function putMoneyInWallet(int $moneyLeft, int $balance): int
{
    return $moneyLeft + $balance;
}


$coffee = choseCoffee($coffeeMachine);

while (true) {

    $input = validateMoney();
    $moneyLeft = walletSum($userMoney, $input);
    echo "You have $moneyLeft cents left!" . PHP_EOL;
    $payment = insertedMoney($payed, $input);
    echo "Total: $payment cents" . PHP_EOL;

    if ($coffee[1] <= $payment) {
        $payed = 0;
        $balance = returnBalance($payment, $coffee[1]);
        $userMoney = putMoneyInWallet($moneyLeft, $balance);

        echo PHP_EOL;
        echo "Here is your $coffee[0]" . PHP_EOL;
        echo "Your balance is $balance cents" . PHP_EOL;
        echo "You have $userMoney coins left!" . PHP_EOL;
        echo PHP_EOL;

        $buyAnother = strtoupper(readline("To buy another coffee press Y : "));

        if ($buyAnother === "Y") {
            $coffee = choseCoffee($coffeeMachine);
        } else {
            echo "You have $userMoney cents left!" . PHP_EOL;
            exit;
        }

    }

    if ($moneyLeft < $coffee[1]) {
        echo "You don`t have enough money left" . PHP_EOL;
        exit;
    }

}


