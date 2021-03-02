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
    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function setFather (string $fathersName):void
    {
        $this->father = $fathersName;
    }

    public function fathersName (): string
    {
        if ($this->father === null) {
            return "Unknown";
        } else {
            return $this->father;
        }
    }

}

class DogTest
{
    private array $dogList = [];

    public function addDog (Dog $dog) :void
    {
        $this->dogList[] = $dog;
    }



}

/*
$max = new Dog ('Max', 'male');
$rocky = new Dog ('Rocky', 'male');
$sparky = new Dog ('Sparky','male');
$buster = new Dog('Buster','male');
$sam = new Dog('Sam','male');
$lady = new Dog('Lady','female');
$molly = new Dog('Molly','female');
$coco = new Dog('Coco','female');

$max->setFather('MMMM');
echo $max->fathersName();
echo $sparky->fathersName();
*/

$allDogs = new DogTest();
$allDogs->addDog($max = new Dog ('Max', 'male'));
$allDogs->addDog($rocky = new Dog ('Rocky', 'male'));
$allDogs->addDog($sparky = new Dog ('Sparky','male'));
$allDogs->addDog($buster = new Dog('Buster','male'));
$allDogs->addDog($sam = new Dog('Sam','male'));
$allDogs->addDog($lady = new Dog('Lady','female'));
$allDogs->addDog($molly = new Dog('Molly','female'));
$allDogs->addDog($coco = new Dog('Coco','female'));
/**/
//var_dump($allDogs->dogList);







