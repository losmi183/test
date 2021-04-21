<?php

namespace App\Controllers;

use App\Models\Fruit;

class FruitsController extends Fruit {

    public function index()
    {
        $fruits = $this->all();

        return $fruits;
    }

    public function take($number=9)
    {
        // Number of fruits to fetch
        $number = 9;

        $fruits = $this->limit($number);

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

    public function saveEdit($id, $title, $description, $image)
    {
        $result = $this->update($id, $title, $description, $image);

        return $result;
    }

    public function destroy($id)
    {
        $result = $this->delete($id);

        return $result;
    }

}