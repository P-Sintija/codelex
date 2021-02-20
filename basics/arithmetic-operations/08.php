<?php
//Foo Corporation needs a program to calculate how much to pay their hourly employees.
//The US Department of Labor requires that employees get paid time and a half for any hours over 40
// that they work in a single week. For example, if an employee works 45 hours,
// they get 5 hours of overtime, at 1.5 times their base pay.
// The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
// Foo Corp requires that an employee not work more than 60 hours in a week.
//Summary
//An employee gets paid (hours worked) × (base pay), for each hour up to 40 hours.
//For every hour over 40, they get overtime = (base pay) × 1.5.
//The base pay must not be less than the minimum wage ($8.00 an hour). If it is, print an error.
//If the number of hours is greater than 60, print an error message.
//Write a method that takes the base pay and hours worked as parameters, and prints the total pay or an error.
// Write a main method that calls this method for each of these employees:

//Employee	Base Pay	Hours Worked
//Employee 1	$7.50	35
//Employee 2	$8.20	47
//Employee 3	$10.00	73

class Employee
{
    public float $basePay;
    public int $hoursWorked;
    const  minimumWage = 8;
    const maximumWorkingHours = 60;
    const maximumNormalHours = 40;
    const overtimePayment = 1.5;

    public function __construct($basePay, $hoursWorked)
    {
        $this->basePay = $basePay;
        $this->hoursWorked = $hoursWorked;
    }

    function minimumWage(): bool
    {
        return $this->basePay < self::minimumWage;
    }

    function maxOvertime(): bool
    {
        return $this->hoursWorked > self::maximumWorkingHours;
    }

    function totalPayment(): float
    {
        $payment = 0;
        if ($this->hoursWorked <= self::maximumNormalHours) {
            $payment = $this->basePay * $this->hoursWorked;
        } else if ($this->hoursWorked > self::maximumNormalHours) {
            $payment = $this->basePay * self::maximumNormalHours + $this->overtimePayment($this->hoursWorked - self::maximumNormalHours);
        }
        return $payment;
    }

    function overtimePayment(int $input): float
    {
        return $input * $this->basePay * self::overtimePayment;
    }

}


$employees = [
    new Employee(7.50, 35),
    new Employee(8.20, 47),
    new Employee(10.00, 73),
];

foreach ($employees as $employee) {
    if ($employee->minimumWage() || $employee->maxOvertime()) {
        echo "error" . PHP_EOL;
    } else {
        echo number_format($employee->totalPayment(), 2) . PHP_EOL;
    }
}

