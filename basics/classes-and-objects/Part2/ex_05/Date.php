<?php

class Date
{
    private int $month = 0;
    private int $day = 0;
    private int $year = 0;

    public function __construct(int $month, int $day, int $year)
    {
        $this->setMonth($month);
        $this->setDay($day);
        $this->setYear($year);
    }

    public function checkIfDateExists(): void
    {
        if (!checkdate($this->month, $this->day, $this->year)) {
            throw new InvalidArgumentException('Date does not exist');
        }
    }

    public function displayDate(): string
    {
        $month = $this->month;
        $day = $this->day;
        $year = $this->year;

        if (strlen($this->month) === 1) {
            $month = '0' . $this->month;
        }
        if (strlen($this->day) === 1) {
            $day = '0' . $this->day;
        }
        if (strlen($this->year) < 4) {
            $year = str_repeat('0', 4 - strlen($this->year)) . $this->year;
        }

        return $month . '/' . $day . '/' . $year . PHP_EOL;
    }

    private function setDay(int $input): void
    {
        if ($input < 0) return;
        $this->day = $input;
    }

    private function setMonth(int $input): void
    {
        if ($input < 0) return;
        $this->month = $input;
    }

    private function setYear(int $input): void
    {
        if ($input < 0) return;
        $this->year = $input;
    }

}

