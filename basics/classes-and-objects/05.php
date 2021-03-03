<?php
//Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.
//
//Your class should have a constructor that initializes the three instance variables and assumes that the values provided are correct.
//Provide a set and a get for each instance variable.
//
//Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.
//
//Write a test application named DateTest that demonstrates class Date capabilities.


class Date
{
    private int $month;
    private int $day;
    private int $year;

    public function __construct(int $month, int $day, int $year)
    {
        $this->setMonth($month);
        $this->setDay($day);
        $this->setYear($year);
    }

    public function setDay(int $input): void
    {
        $this->day = $input;
    }

    public function setMonth(int $input): void
    {
        $this->month = $input;
    }

    public function setYear(int $input): void
    {
        $this->year = $input;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function displayDate(): string
    {
        $month = $this->getMonth();
        $day = $this->getDay();
        if (strlen($this->month) === 1) {
            $month = '0' . $this->month;
        }
        if (strlen($this->day) === 1) {
            $day = '0' . $this->day;
        }
        return $month . '/' . $day . '/' . $this->getYear() . PHP_EOL;
    }

}

$date = new Date (01, 01, 2001);
echo $date->displayDate();
$date->setMonth(11);
$date->setDay(18);
$date->setYear(1918);
echo $date->displayDate();


