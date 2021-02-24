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

function choseCoffee(array $allCoffee): array
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


function validateMoney(array $coins): string
{
    while (true) {
        $userInput = readline("Insert coin: ");
        $valueInteger = (int)$userInput;
        $valueFloat = (float)$userInput;
        if (is_numeric($userInput) && $valueInteger == $valueFloat &&
            array_key_exists($userInput, $coins) && $coins[$userInput] > 0) {
            return $userInput;
        } else {
            echo "Not valid!" . PHP_EOL;
        }
    }

}

function takeCoins(array &$coins, string $userInput): array
{
    $coins[$userInput] = $coins[$userInput] - 1;
    return $coins;
}


function insertedMoney(int &$payment, string $userInput): int
{
    $payment = $payment + (int)$userInput;
    return $payment;
}

function calculateBalance(int $total, int $payment): int
{
    return $total - $payment;
}

function getBalance(int $moneyLeft, int $balance): int
{
    return $moneyLeft + $balance;
}

function putMoneyInWallet(array &$coins, int $money): array
{
    for ($i = count($coins) - 1; $i >= 0; $i--) {
        while ($money > array_keys($coins)[$i] || $money === array_keys($coins)[$i]) {
            $money = $money - array_keys($coins)[$i];
            $coins[array_keys($coins)[$i]] = $coins[array_keys($coins)[$i]] + 1;

        }
    }
    return $coins;
}

function showWallet(array $wallet): string
{
    return implode(PHP_EOL, array_map(function ($coins, $index) {
        return "$coins x $index coin/-s";
    }, $wallet, array_keys($wallet)));

}


echo showWallet($wallet);
echo PHP_EOL;

$coffee = choseCoffee($coffeeMachine);

while (true) {

    $input = validateMoney($wallet);
    takeCoins($wallet, $input);
    $moneyLeft = walletSum($userMoney, $input);
    echo "You have $moneyLeft cents left!" . PHP_EOL;
    $payment = insertedMoney($payed, $input);
    echo "Total: $payment cents" . PHP_EOL;

    if ($coffee[1] <= $payment) {
        $payed = 0;
        $balance = calculateBalance($payment, $coffee[1]);
        $userMoney = getBalance($moneyLeft, $balance);

        echo PHP_EOL;
        echo "Here is your $coffee[0] !!!!" . PHP_EOL;
        echo "Your balance is $balance cents" . PHP_EOL;
        echo "You have $userMoney coins left!" . PHP_EOL;
        echo PHP_EOL;

        $buyAnother = strtoupper(readline("To buy another coffee press Y : "));

        if ($buyAnother === "Y") {
            $coffee = choseCoffee($coffeeMachine);
        } else {
            echo "You have $userMoney cents left!" . PHP_EOL;
            $walletAtEnd = putMoneyInWallet($wallet, $balance);
            echo showWallet($walletAtEnd);
            exit;
        }

    }

    if ($moneyLeft < $coffee[1]) {
        echo "You don`t have enough money left" . PHP_EOL;
        exit;
    }

}


