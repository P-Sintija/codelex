<?php

class SavingsAccount
{
    private int $annualInterestRate = 0;
    private int $balance;
    private array $withdrawn = [];
    private array $deposits = [];
    private array $interestEarned = [];
    private int $period = 1;

    public function __construct(int $startingBalance)
    {
        if ($startingBalance <= 0) {
            $this->balance = 0;
        } else {
            $this->balance = $startingBalance * 100;
        }
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setAnnualInterestRate(int $interest): void
    {
        if ($interest < 0) return;
        $this->annualInterestRate = $interest;
    }

    public function subtractingWithdraw(int $withdraw): void
    {
        $withdraw = $withdraw * 100;
        if ($withdraw > $this->balance || $withdraw < 0) return;
        $this->balance = $this->balance - $withdraw;
        $this->setAllWithdraw($withdraw);

    }


    public function addDeposit(int $deposit): void
    {
        $deposit = $deposit * 100;
        if ($deposit < 0) return;
        $this->balance = $this->balance + $deposit;
        $this->setAllDeposits($deposit);
    }

    public function addMonthlyInterest(): void
    {
        $monthlyInterestRate = $this->annualInterestRate * 0.01 / 12;
        $this->setAllMonthlyInterestRates($monthlyInterestRate);
        $this->balance = $monthlyInterestRate * $this->balance + $this->balance;
    }


    public function getTotalDeposit(): int
    {
        return array_sum($this->deposits);
    }

    public function getTotalWithdraw(): int
    {
        return array_sum($this->withdrawn);
    }

    public function getInterestEarned(): float
    {
        return array_sum($this->interestEarned);
    }


    public function setPeriod(int $time): void
    {
        if ($time <= 0) return;
        $this->period = $time;
    }

    public function getPeriod(): int
    {
        return $this->period;
    }


    private function setAllDeposits(int $deposit): void
    {
        $this->deposits[] = $deposit;
    }

    private function setAllWithdraw(int $withdraw): void
    {
        $this->withdrawn [] = $withdraw;
    }

    private function setAllMonthlyInterestRates(float $monthlyInterestRate): void
    {
        $this->interestEarned [] = $monthlyInterestRate * $this->balance;
    }

}
