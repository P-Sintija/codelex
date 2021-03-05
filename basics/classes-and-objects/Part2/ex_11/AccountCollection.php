<?php

class AccountCollection
{
    private array $accounts = [];

    public function addAccount(Account $account): void
    {
        $this->accounts[] = $account;
    }

    public function transfer(Account $from, Account $to, float $howMuch): void
    {
        if ($from->getAccountsBalance() < $howMuch * 100) {
            throw new InvalidArgumentException ('Not enough money in ' . $from->getAccountsName() . ' account');
        }

        $from->withdrawFromAccount($howMuch);
        $to->depositToAccount($howMuch);
    }

    public function getAllAccounts(): array
    {
        return $this->accounts;
    }

}

