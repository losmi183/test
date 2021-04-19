<?php

namespace App\Models;

class Citrus {

    public $image;
    public $title;
    public $description;

    public function __construct()
    {
        $this->image = 'slika';
        $this->title = 'naslov';
        $this->description = 'opis';
    }



} 