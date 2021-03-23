<?php

namespace App\Controllers;

use App\Models\Collections\ToyCollections;
use App\Models\Toy;
use App\Service\ToyGenerator;

class ToyController
{
    public function getAllToys(): void
    {

       $generator = new ToyGenerator();
       $toys = $generator->makeToys();

        require_once 'app/Views/view.php';
    }




}

