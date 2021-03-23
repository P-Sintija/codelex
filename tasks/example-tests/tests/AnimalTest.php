<?php

namespace Tests;

use App\Animal;
use PHPUnit\Framework\TestCase;

class AnimalTest extends TestCase
{

    public function testName(): void
    {
        $animal = new Animal('sheep', 20);
        $this->assertEquals('sheep', $animal->name());

    }


    public function testAge(): void
    {
        $animal = new Animal('sheep', 20);
        $this->assertEquals(20, $animal->age());
    }
}



