<?php

class Student
{
    private string $name;
    private string $surname;
    private int $age;
    private int $grade = 0;

    public function __construct(string $name, string $surname, int $age)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }


    public function setGrade(): void
    {
        if ($this->age === 7 || $this->age === 8) {
            $this->grade = 1;
        } else if ($this->age === 9 || $this->age === 10) {
            $this->grade = 2;
        } else if ($this->age === 11 || $this->age === 12) {
            $this->grade = 3;
        } else if ($this->age === 13 || $this->age === 14) {
            $this->grade = 4;
        } else if ($this->age === 15 || $this->age === 16) {
            $this->grade = 5;
        } else if ($this->age === 17 || $this->age === 18) {
            $this->grade = 6;
        } else if ($this->age === 19 || $this->age === 20) {
            $this->grade = 7;
        }
    }


    public function getStudentGrade(): int
    {
        return $this->grade;
    }

    public function getStudentInfo(): string
    {
        return "$this->name $this->surname (age $this->age) is studying in $this->grade. grade." . PHP_EOL;
    }


}

$john = new Student("John", "Brown", 8);
$ann = new Student("Ann", "Willow", 6);
$bob = new Student("Bob", "Bobobo", 9);
$elvis = new Student("Elvis", "Elvilili", 10);


class School
{
    private array $students = [];

    public function addToSchool(Student $student): void
    {
        $this->students[] = $student;
    }

    public function showStudentsInGrade(int $grade): array
    {
        $classRoom = [];
        for ($i = 0; $i < count($this->students); $i++) {
            $this->students[$i]->setGrade();
            if ($this->students[$i]->getStudentGrade() === $grade) {
                $classRoom[] = $this->students[$i];
            }
        }
        return $classRoom;
    }


}

$school = new School();
$school->addToSchool($john);
$school->addToSchool($ann);
$school->addToSchool($bob);
$school->addToSchool($elvis);

$oneClass = $school->showStudentsInGrade(2);

foreach ($oneClass as $student) {
    echo $student->getStudentInfo();
}



