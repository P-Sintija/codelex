<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController
{
    public function index()
    {
        //metode, ja -GET
        //echo 'HomeController::index';

        // $number = 10;
        $product = new Product('KILL ME');
        require_once 'app/Views/HomeView.php';
    }

    public function store()
    {
        //metode, ja  -POST

    }

}

