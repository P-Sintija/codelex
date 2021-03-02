<?php

class Student
{
    private string $name;
    private int $age;
    private int $grade = 1;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;

        $this->setGrade($this->calculateGrade());
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getGrade(): int
    {
        return $this->grade;
    }


    //public function setGrade(?int $grade): void // ? iespējams padot ar parametru vai bez parametra (vai cipars VAI null)
    // public function setGrade(?int $grade = null): void   // pielieku noklusējuma vērtību - var nepadot NEKO
    public function setGrade(int $grade = 1): void
    {
        $this->grade = $grade;
    }

    private function calculateGrade(): int
    {
        if ($this->age === 7 || $this->age === 8) {
            return 1;
        } else if ($this->age === 9 || $this->age === 10) {
            return 2;
        } else if ($this->age === 11 || $this->age === 12) {
            return 3;
        } else if ($this->age === 13 || $this->age === 14) {
            return 4;
        } else if ($this->age === 15 || $this->age === 16) {
            return 5;
        } else if ($this->age === 17 || $this->age === 18) {
            return 6;
        } else if ($this->age === 19 || $this->age === 20) {
            return 7;
        }
        return 0;
    }


}


class School
{
    private array $students = [];

    public function addStudent(Student $student): void
    {
        $this->students[] = $student;
    }

    public function addManyStudents(array $students): void
    {
        foreach ($students as $student) {
            $this->addStudent($student);
        }
    }

    public function getAllStudents(): array
    {
        return $this->students;
    }


    public function getStudentsInGrade(int $grade): array
    {
        return array_filter($this->students, function (Student $student) use ($grade) {
            return $student->getGrade() === $grade;
        });
    }

    public function removeStudent(string $name): void
    {
        foreach ($this->students as $index => $student) {
            if ($name === $student->getName()) {
                unset($this->students[$index]);
            }
        }
    }

}

$school = new School();
$school->addStudent(new Student('Oscar', 10));
$school->addStudent(new Student('Liene', 8));
$school->addStudent(new Student('Zane', 11));
$school->addStudent(new Student('Ivar', 11));
/*
$school->addManyStudents([
    new Student('Oscar', 10),
    new Student('Liene', 8),
    new Student('Zane', 11),
    new Student('Ivar', 11)
]);
*/

$school->removeStudent('Ivar');

foreach ($school->getAllStudents() as $student) {
    echo $student->getName() . ' ' . $student->getGrade() . PHP_EOL;
}

foreach ($school->getStudentsInGrade(3) as $student) {

    /** @var Student $student */
    echo $student->getName() . ' ' . $student->getGrade() . PHP_EOL;
}



