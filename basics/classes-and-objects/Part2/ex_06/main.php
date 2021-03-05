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

require_once 'EnergyDrinkSurvey.php';


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

