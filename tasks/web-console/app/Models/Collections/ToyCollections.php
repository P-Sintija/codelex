<?php

namespace App\Models\Collections;

use App\Models\Toy;

class ToyCollections{

    private array $allToys;


    public function addToys(Toy $toy): void
    {
        $this->allToys[] = $toy;
    }

    public function getAllToys(): array
    {
        return $this->allToys;
    }

}

