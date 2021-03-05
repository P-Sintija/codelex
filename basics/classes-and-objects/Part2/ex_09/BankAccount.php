<?php

class BankAccount
{
    private string $accountsName;
    private int $balance;

    public function __construct(string $accountsName, float $balance)
    {
        $this->accountsName = $accountsName;
        $this->balance = $balance * 100;
    }

    public function showUserNameAndBalance(): string
    {
        if ($this->balance < 0) {
            return $this->accountsName . ', - $' . substr(number_format($this->balance / 100, 2), 1);
        } else {
            return $this->accountsName . ', $' . number_format($this->balance / 100, 2);
        }

    }

}



