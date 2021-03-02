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


class Account
{
    public string $accountsName;
    public float $balance;

    public function __construct(string $accountsName, float $balance)
    {
        $this->accountsName = $accountsName;
        $this->balance = $balance;
    }

    public function __toString(): string
    {
        return $this->accountsName . ' ' . $this->balance . PHP_EOL;
    }

    public function balance(): float
    {
        return $this->balance;
    }


    public function withdrawal(float $amount): void
    {
        $this->balance = $this->balance - $amount;
    }

    public function deposit(float $amount): void
    {
        $this->balance = $this->balance + $amount;
    }

}


class Bank
{
    private array $accounts = [];

    public function addAccount(Account $account): void
    {
        $this->accounts[] = $account;
    }

    public function depositMoney(string $name, float $deposit): void
    {
        array_filter($this->accounts, function (Account $account) use ($name, $deposit): void {
            if ($account->accountsName === $name) {
                $account->deposit($deposit);
            }
        });
    }

    public function withdrawalMoney(string $name, float $withdrawal): void
    {
        array_filter($this->accounts, function (Account $account) use ($name, $withdrawal): void {
            if ($account->accountsName === $name) {
                $account->withdrawal($withdrawal);
            }
        });
    }


    public function printAccount(string $name): string
    {
        for ($i = 0; $i < count($this->accounts); $i++) {
            if ($this->accounts[$i]->accountsName === $name) {
                return $this->accounts[$i]->accountsName . ' ' . $this->accounts[$i]->balance . PHP_EOL;
            }
        }
        return 'No such account!';
    }

    public function transfer(Account $from, Account $to, float $howMuch): void
    {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }


}

$bartosAccount = new Account("Barto's account", 100.00);
$bartosSwissAccount = new Account("Barto's account in Switzerland", 1000000.00);

//echo "Initial state";
//echo $bartosAccount;
//echo $bartosSwissAccount;

$bartosAccount->withdrawal(20);
//echo "Barto's account balance is now: " . $bartosAccount->balance();
//echo PHP_EOL;
$bartosSwissAccount->deposit(200);
//echo "Barto's Swiss account balance is now: ".$bartosSwissAccount->balance();
//echo PHP_EOL;

//echo "Final state";
//echo $bartosAccount;
//echo $bartosSwissAccount;


$bank = new Bank;
$firstAccount = new Account('First account', 100.0);
$bank->addAccount($firstAccount);
$bank->depositMoney('First account', 20.0);
//echo $bank->printAccount('First account');


$mattsAccount = new Account('Matt`s account', 1000);
$myAccount = new Account('My account', 0);
$bank->addAccount($mattsAccount);
$bank->addAccount($myAccount);
$bank->withdrawalMoney('Matt`s account', 100.0);
$bank->depositMoney('My account', 100.0);
//echo $bank->printAccount('Matt`s account');
//echo $bank->printAccount('My account');


$a = new Account('A', 100.0);
$b = new Account('B', 0.0);
$c = new Account('C', 0.0);

$bank->addAccount($a);
$bank->addAccount($b);
$bank->addAccount($c);

$bank->transfer($a, $b, 50.0);
$bank->transfer($b, $c, 25.0);

echo $bank->printAccount('A');
echo $bank->printAccount('B');
echo $bank->printAccount('C');


