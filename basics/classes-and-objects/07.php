<?php
//The questions in this exercise all deal with a class Dog that you have to program from scratch.
//
//Create a class Dog. Dogs should have a name, and a sex.
//Make a class DogTest with a Main method in which you create the following Dogs:
//Max, male
//Rocky, male
//Sparky, male
//Buster, male
//Sam, male
//Lady, female
//Molly, female
//Coco, female
//Change the Dog class so that each dog has a mother and a father.
//Add to the main method in DogTest, so that:
//Max has Lady as mother, and Rocky as father
//Coco has Molly as mother, and Buster as father
//Rocky has Molly as mother, and Sam as father
//Buster has Lady as mother, and Sparky as father
//Change the dog class to include a method fathersName that return the name of the father.
//If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
//referenceToCoco.FathersName() returns the string "Buster"
//referenceToSparky.FathersName() returns the string "Unknown"
//Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog). The method should return true on the call
//referenceToCoco.HasSameMotherAs(referenceToRocky). Show that the new method works in the DogTest main method.

class Dog
{
    private string $name;
    private string $sex;
    private ?string $mother;
    private ?string $father;

    public function __construct(string $name, string $sex, ?string $mother = null, ?string $father = null)
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


    public function setFather(?string $fathersName): void
    {
        if ($fathersName !== null) {
            $this->father = $fathersName;
        }

    }

    public function fathersName(): string
    {
        if ($this->father === null) {
            return "Unknown";
        } else {
            return $this->father;
        }
    }

    public function setMother(?string $mothersName): void
    {
        if ($mothersName !== null) {
            $this->mother = $mothersName;
        }

    }

    public function mothersName(): string
    {
        if ($this->mother === null) {
            return "Unknown";
        } else {
            return $this->mother;
        }
    }

}

class DogTest
{
    private array $dogList = [];

    public function __construct(array $dogs)
    {
        foreach ($dogs as $dog) {
            if ($dog instanceof Dog) {
                $this->dogList[] = $dog;
            }
        }
    }

    public function getDogs(): array
    {
        return $this->dogList;
    }


    public function dogsParents(string $dogName, ?string $fathersName, ?string $mothersName): void
    {
        array_filter($this->dogList, function (Dog $dog) use ($dogName, $fathersName, $mothersName) {
            if ($dog->getName() === $dogName) {
                if ($fathersName !== null) {
                    $dog->setFather($fathersName);
                }
                if ($mothersName !== null) {
                    $dog->setMother($mothersName);
                }
            }
        });
    }


}


$allDogs = new DogTest([
    new Dog ('Max', 'male'),
    new Dog ('Rocky', 'male'),
    new Dog ('Sparky', 'male'),
    new Dog('Buster', 'male'),
    new Dog('Sam', 'male'),
    new Dog('Lady', 'female'),
    new Dog('Molly', 'female'),
    new Dog('Coco', 'female')
]);

$allDogs->dogsParents('Max', 'Rocky', 'Lady');
$allDogs->dogsParents('Coco', 'Buster', 'Molly');
$allDogs->dogsParents('Rocky', 'Sam', 'Molly');
$allDogs->dogsParents('Buster', 'Sparky', 'Lady');
$allDogs->dogsParents('Sparky', 'Max', null);
$allDogs->dogsParents('Sam', null, 'Coco');

foreach ($allDogs->getDogs() as $dog) {
    /** @var $dog Dog */
    echo $dog->getName() . ' has ' . $dog->mothersName() . ' as mother, and ' .
        $dog->fathersName() . ' as father' . PHP_EOL;
}









