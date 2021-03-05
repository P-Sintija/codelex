<?php

class EnergyDrinkSurvey
{
    private int $totalSurveyed = 0;
    private float $purchasedEnergyDrinks = 0.0;
    private float $preferCitrusDrinks = 0.0;
    private int $surveyedEnergyDrinkers = 0;
    private int $surveyedPreferCitrus = 0;


    public function setTotalSurveyed(int $amount): void
    {
        if ($amount < 0) return;
        $this->totalSurveyed = $amount;
    }

    public function setPurchasedEnergyDrinks(float $amount): void
    {
        if ($amount < 0) return;
        $this->purchasedEnergyDrinks = $amount;
    }

    public function setPreferCitrusDrinks(float $amount): void
    {
        if ($amount < 0) return;
        $this->preferCitrusDrinks = $amount;
    }

    public function calculateEnergyDrinkers(): void
    {
        if ($this->totalSurveyed === 0) {
            throw new LogicException(";(");
        }
        $this->surveyedEnergyDrinkers = $this->totalSurveyed * $this->purchasedEnergyDrinks;
    }


    public function calculatePreferCitrus(): void
    {
        if ($this->totalSurveyed === 0) {
            throw new LogicException(";(");
        }
        $this->surveyedPreferCitrus = $this->totalSurveyed * $this->preferCitrusDrinks;
    }


    public function getTotalSurveyed(): int
    {
        return $this->totalSurveyed;
    }

    public function getPreferCitrus(): float
    {
        return $this->surveyedPreferCitrus;
    }

    public function getEnergyDrinkers(): float
    {
        return $this->surveyedEnergyDrinkers;
    }

}
