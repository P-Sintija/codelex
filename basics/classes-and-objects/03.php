<?php
//For this exercise, you will design a set of classes that work together to simulate a car's fuel gauge and odometer.
//The classes you will design are the following:
//
//The FuelGauge Class: This class will simulate a fuel gauge. Its responsibilities are as follows:
//
//To know the car’s current amount of fuel, in liters.
//To report the car’s current amount of fuel, in liters.
//To be able to increment the amount of fuel by 1 liter. This simulates putting fuel in the car. ( The car can hold a maximum of 70 liters.)
//To be able to decrement the amount of fuel by 1 liter, if the amount of fuel is greater than 0 liters.
// This simulates burning fuel as the car runs.


//The Odometer Class: This class will simulate the car’s odometer. Its responsibilities are as follows:
//
//To know the car’s current mileage.
//To report the car’s current mileage.
//To be able to increment the current mileage by 1 kilometer. The maximum mileage the odometer can store is 999,999 kilometer.
//When this amount is exceeded, the odometer resets the current mileage to 0.


//To be able to work with a FuelGauge object. It should decrease the FuelGauge object’s current amount of fuel by 1 liter
//for every 10 kilometers traveled. (The car’s fuel economy is 10 kilometers per liter.)

//Demonstrate the classes by creating instances of each. Simulate filling the car up with fuel,
//and then run a loop that increments the odometer until the car runs out of fuel.

//During each loop iteration, print the car’s current mileage and amount of fuel.

class FuelGauge
{
    public int $fuel;
    const maximum = 70;

    public function __construct()
    {
        $this->fuel = 0;
    }

    function litersLeft(): string
    {
        return $this->fuel . " liters left " . PHP_EOL;
    }

    function incrementLiters(int $fuel): int
    {
        if ($this->fuel < self::maximum) {
            $this->fuel = $this->fuel + $fuel;
        }
        return $this->fuel;
    }

    function decrementLiters(): int
    {
        //if the amount of fuel is greater than 0 liters
        return $this->fuel--;
    }

}

class Odometer
{
    public int $mileage;
    const maximumMileage = 999.999;

    public function __construct()
    {
        $this->mileage = 0;
    }

    function reportMileage(): string
    {
        return "Current mileage " . $this->mileage . PHP_EOL;
    }

    function increaseMileage(): int
    {
        return $this->mileage++;
    }

    function resetMileage(): int
    {
        if ($this->mileage > self::maximumMileage) {
            $this->mileage = 0;
        }
        return $this->mileage;
    }

}


$carFuel = new FuelGauge();
$carOdometer = new Odometer();
$carFuel->incrementLiters(5);
echo $carFuel->litersLeft();

$kilometersTraveled = 0;

while ($carFuel->fuel > 0) {

    $carOdometer->increaseMileage();
    $carOdometer->resetMileage();
    $kilometersTraveled = $kilometersTraveled + 1;

    while ($kilometersTraveled >= 10) {
        $carFuel->decrementLiters();
        $kilometersTraveled = 0;
    }

    echo $carOdometer->reportMileage();
    echo $carFuel->litersLeft();

}


