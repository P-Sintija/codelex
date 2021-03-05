<?php

class Account
{
    private string $accountsName;
    private int $balance = 0;

    public function __construct(string $accountsName, float $balance)
    {
        $this->accountsName = $accountsName;
        $this->setBalance($balance);
    }


    public function getAccountsName(): string
    {
        return $this->accountsName;
    }


    public function getAccountsBalance(): float
    {
        return $this->balance;
    }


    public function withdrawFromAccount(float $amount): void
    {
        $amount = $amount * 100;
        if ($amount > $this->balance) return;
        $this->balance = $this->balance - $amount;
    }

    public function depositToAccount(float $amount): void
    {
        $amount = $amount * 100;
        $this->balance = $this->balance + $amount;
    }

    public function printAccount(): string
    {
        return $this->accountsName . ', $' . number_format($this->balance / 100, 2) . PHP_EOL;
    }

    private function setBalance(float $amount): void
    {
        if ($amount < 0) return;
        $this->balance = $amount * 100;
    }
}

