<?php
//A soft drink company recently surveyed 12,467 of its customers and found that
//approximately 14 percent of those surveyed purchase one or more energy drinks per week.
//Of those customers who purchase energy drinks, approximately 64 percent of them prefer citrus flavored energy drinks.
//
//Write a program that displays the following:
//
//The approximate number of customers in the survey who purchased one or more energy drinks per week
//The approximate number of customers in the survey who prefer citrus flavored energy drinks

//$surveyed = 12467;
//$purchasedEnergyDrinks = 0.14;
//$preferCitrusDrinks = 0.64;
//function calculateEnergyDrinkers(int $numberSurveyed)
//{
//    throw new LogicException(";(");
//}
//function calculatePreferCitrus(int $numberSurveyed)
//{
//    throw new LogicException(";(");
//}

/*
fixme
echo "Total number of people surveyed " . $surveyed;
echo "Approximately " . ? . " bought at least one energy drink";
echo ? . " of those " . "prefer citrus flavored energy drinks.";
*/

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
        if ($this->getTotalSurveyed() <= 0 || $this->getPurchasedEnergyDrinks() < 0) {
            throw new LogicException(";(");
        }
        $this->surveyedEnergyDrinkers = $this->getTotalSurveyed() * $this->getPurchasedEnergyDrinks();
    }


    public function calculatePreferCitrus(): void
    {
        if ($this->getTotalSurveyed() <= 0 || $this->getPreferCitrusDrinks() < 0) {
            throw new LogicException(";(");
        }
        $this->surveyedPreferCitrus = $this->getTotalSurveyed() * $this->getPreferCitrusDrinks();
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


    private function getPurchasedEnergyDrinks(): float
    {
        return $this->purchasedEnergyDrinks;
    }

    private function getPreferCitrusDrinks(): float
    {
        return $this->preferCitrusDrinks;
    }

}

$surveyed = 12467;
$purchasedEnergyDrinks = 0.14;
$preferCitrusDrinks = 0.64;

$survey = new EnergyDrinkSurvey();
$survey->setTotalSurveyed($surveyed);
$survey->setPurchasedEnergyDrinks($purchasedEnergyDrinks);
$survey->setPreferCitrusDrinks($preferCitrusDrinks);

try {
    $survey->calculateEnergyDrinkers();
    $survey->calculatePreferCitrus();
} catch (LogicException $exception) {
    var_dump($exception->getMessage());
}


echo "Total number of people surveyed " . $survey->getTotalSurveyed() . PHP_EOL;
echo "Approximately " . $survey->getEnergyDrinkers() . " bought at least one energy drink" . PHP_EOL;
echo $survey->getPreferCitrus() . " of those " . "prefer citrus flavored energy drinks." . PHP_EOL;




