<?php

namespace App\Service;

use App\Models\Collections\ToyCollections;
use App\Models\Toy;

class ToyGenerator
{

    public function makeToys(): ToyCollections
    {
        $CSVFile = "app/Storage/toys.csv";
        if (($file = fopen($CSVFile, "r")) !== FALSE) {
            while (($data = fgetcsv($file, 20, ",")) !== FALSE) {
                $itemsCSV[] = $data;
            }
            fclose($file);
        }

        $toys = new ToyCollections();
        foreach ($itemsCSV as $toy) {
            $toys->addToys(new Toy($toy[0], $toy[1]));

        }
        return $toys;
    }

}


