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
    private int $fuel = 0;
    const maximum = 70;


    public function litersLeft(): int
    {
        return $this->fuel;
    }

    public function incrementLiters(int $fuel): void
    {
        if ($this->fuel + $fuel >= self::maximum) {
            $this->fuel = self::maximum;
        } else {
            $this->fuel = $this->fuel + $fuel;
        }
    }

    public function decrementLiters(): void
    {
        if ($this->fuel <= 0) return;
        $this->fuel--;
    }

}


class Odometer
{
    private int $mileage = 0;
    private const maximumMileage = 999999;


    public function reportMileage(): int
    {
        return $this->mileage;
    }

    public function increaseMileage(): void
    {
        $this->mileage++;
    }

    public function resetMileage(): void
    {
        if ($this->mileage > self::maximumMileage) {
            $this->mileage = 0;
        }
    }

    public function getMaximumMileage(): int
    {
        return self::maximumMileage;
    }

}


$carFuel = new FuelGauge();
$carOdometer = new Odometer();

$carFuel->incrementLiters(56);

$kilometersTraveled = 0;


while (true) {

    print("\033[2J\033[;H");
    echo 'You have ' . $carFuel->litersLeft() . ' liters left' . PHP_EOL;
    echo 'Current mileage is ' . str_repeat(0, strlen((string)$carOdometer->getMaximumMileage())
            - strlen((string)$carOdometer->reportMileage()))
        . $carOdometer->reportMileage() . PHP_EOL;

    $refuel = strtoupper(readline("Do you wan to fill up ? (yes: press y): "));
    if ($refuel === "Y") {
        $fuel = readline("Enter amount of fuel: ");
        $carFuel->incrementLiters($fuel);

        while ($carFuel->litersLeft() > 0) {
            $carOdometer->increaseMileage();
            $carOdometer->resetMileage();
            $kilometersTraveled = $kilometersTraveled + 1;

            while ($kilometersTraveled >= 10) {
                $carFuel->decrementLiters();
                $kilometersTraveled = 0;
            }
        }

    } else {
        if ($carFuel->litersLeft() > 0) {
            echo 'You have ' . $carFuel->litersLeft() . ' liters left' . PHP_EOL;
            exit;
        } else {
            echo('You are out of fuel!');
            exit;
        }

    }

}


