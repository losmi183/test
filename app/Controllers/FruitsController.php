<?php

namespace App\Controllers;

use App\Models\Fruit;

class FruitsController extends Fruit {

    public function index()
    {
        $fruits = $this->all();

        return $fruits;
    }

    public function show($id)
    {
        $fruit = $this->find($id);

        return $fruit;
    }

    public function add()
    {
        
    }

    public function store($title, $description, $image)
    {
        $result = $this->create($title, $description, $image);

        return $result;
    }

}