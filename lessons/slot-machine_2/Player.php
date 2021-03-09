<?php

class Player
{
    private int $money = 0;
    private int $bet = 0;



    public function setMoney(int $amount): void
    {
        if ($amount < 0) return;
        $this->money = $amount;
    }

    public function setBet(int $bet): void
    {
        if ($bet % 10 !== 0 || $bet > $this->money || $bet < 0) return;
        $this->bet = $bet;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    public function getBet(): int
    {
        return $this->bet;
    }

    public function bet(int $amount): void
    {
        $this->money = $this->money - $amount;
    }

    public function getWin(int $amount): void
    {
        $this->money = $this->money + $amount;
    }


}


