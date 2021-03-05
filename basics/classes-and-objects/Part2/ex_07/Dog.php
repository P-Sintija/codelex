<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $mother;
    private ?Dog $father;

    public function __construct(string $name, string $sex, ?Dog $mother = null, ?Dog $father = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function mothersName(): string
    {
        if ($this->mother === null) {
            return "Unknown";
        }
        return $this->mother->getName();
    }


    public function fathersName(): string
    {
        if ($this->father === null) {
            return "Unknown";
        }
        return $this->father->getName();
    }


    public function dogsParents(?Dog $father, ?Dog $mother): void
    {
        $this->setFather($father);
        $this->setMother($mother);
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if ($this->mother === $otherDog->mother) {
            return true;
        }
        return false;
    }


    private function setMother(?Dog $mother): void
    {
        if ($mother !== null) {
            $this->mother = $mother;
            if ($mother->sex === '♂') {
                throw new LogicException('A ♂ dog can`t be a mother!');
            }
        }

    }

    private function setFather(?Dog $father): void
    {
        if ($father !== null) {
            $this->father = $father;
            if ($father->sex === '♀') {
                throw new LogicException('A ♀ dog can`t be a father!');
            }
        }

    }


}


