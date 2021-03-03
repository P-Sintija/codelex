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


    public function mothersName(): string
    {
        if ($this->mother === null) {
            return "Unknown";
        } else {
            return $this->mother;
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


    public function dogsParents(?string $fathersName, ?string $mothersName): void
    {
        $this->setFather($fathersName);
        $this->setMother($mothersName);
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        if ($this->mothersName() === $otherDog->mothersName()) {
            return true;
        } else {
            return false;
        }
    }

    private function setMother(?string $mothersName): void
    {
        if ($mothersName !== null) {
            $this->mother = $mothersName;
        }

    }

    private function setFather(?string $fathersName): void
    {
        if ($fathersName !== null) {
            $this->father = $fathersName;
        }

    }


}

class DogCollection
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

}


$max = new Dog ('Max', 'male');
$rocky = new Dog ('Rocky', 'male');
$sparky = new Dog ('Sparky', 'male');
$buster = new Dog('Buster', 'male');
$sam = new Dog('Sam', 'male');
$lady = new Dog('Lady', 'female');
$molly = new Dog('Molly', 'female');
$coco = new Dog('Coco', 'female');

$max->dogsParents('Rocky', 'Lady');
$coco->dogsParents('Buster', 'Molly');
$rocky->dogsParents('Sam', 'Molly');
$buster->dogsParents('Sparky', 'Lady');
$sparky->dogsParents('Max', null);
$sam->dogsParents(null, 'Coco');

var_dump($coco->hasSameMotherAs($rocky));
var_dump($buster->hasSameMotherAs($sparky));

$allDogs = [
    $max,
    $rocky,
    $sparky,
    $buster,
    $sam,
    $lady,
    $molly,
    $coco,
];

$dogList = new DogCollection($allDogs);

foreach ($dogList->getDogs() as $dog) {
    /** @var $dog Dog */
    echo $dog->getName() . ' has ' . $dog->mothersName() . ' as mother, and ' .
        $dog->fathersName() . ' as father' . PHP_EOL;
}


