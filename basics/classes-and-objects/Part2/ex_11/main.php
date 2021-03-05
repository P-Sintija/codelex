<?php
//The object of the class Account represents a bank account that has a balance (meaning some amount of money).
//The accounts are used as follows:
//
//$bartos_account = new Account("Barto's account", 100.00);
//$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);
//
//echo "Initial state";
//echo $bartos_account;
//echo $bartos_swiss_account;
//
//$bartos_account->withdrawal(20);
//echo "Barto's account balance is now: " . $bartos_account->balance();
//$bartos_swiss_account->deposit(200);
//echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->balance();
//
//echo "Final state";
//echo $bartos_account;
//echo $bartos_swiss_account;

//Your first account
//Create a program that creates an account with the balance of 100.0, deposits 20.0 and prints the account.
//
//Note! do all the steps described in the exercise exactly in the described order!
//
//Your first money transfer
//Create a program that:
//
//Creates an account named "Matt's account" with the balance of 1000
//Creates an account named "My account" with the balance of 0
//Withdraws 100.0 from Matt's account
//Deposits 100.0 to My account
//Prints both accounts
//Money transfers
//In the above program, you made a money transfer from one person to another. Let us next create a method that does the same!
//
//Create the method:
//
//function transfer(Account $from, Account $to, int $howMuch) { }
//The method transfers money from one account to another. You do not need to check that the from account has enough balance.
//
//After completing the above, make sure that your main method does the following:
//
//Creates an account "A" with the balance of 100.0
//Creates an account "B" with the balance of 0.0
//Creates an account "C" with the balance of 0.0
//Transfers 50.0 from account A to account B
//Transfers 25.0 from account B to account C


require_once 'Account.php';
require_once 'AccountCollection.php';


// 1.uzdevums
$firstAccount = new Account('First account', 100.0);
$firstAccount->depositToAccount(20);
echo $firstAccount->printAccount() . PHP_EOL;


// 2.uzdevums
$mattsAccount = new Account('Matt`s account', 1000);
$myAccount = new Account('My account', 0);

$mattsAccount->withdrawFromAccount(100.0);
$myAccount->depositToAccount(100.0);

echo $mattsAccount->printAccount();
echo $myAccount->printAccount() . PHP_EOL;


// 3.uzdevums
$a = new Account('A', 100.0);
$b = new Account('B', 0.0);
$c = new Account('C', 0.0);

$bank = new AccountCollection;
$bank->addAccount($a);
$bank->addAccount($b);
$bank->addAccount($c);

try {
    $bank->transfer($a, $b, 50.0);
    $bank->transfer($b, $c, 25.0);
} catch (InvalidArgumentException $exception) {
    var_dump($exception->getMessage());
}

function printAllAccountInfo(AccountCollection $bank): void
{
    foreach ($bank->getAllAccounts() as $account) {
        echo $account->printAccount();
    }
}

printAllAccountInfo($bank);


