<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentsController extends Comment {

    public function index()
    {
        $result = $this->all();

        return $result;
    }

    public function display($product_id)
    {
        $result = $this->findByProduct($product_id);

        return $result;
    }

    public function add($product_id, $name, $email, $text)
    {
        // Validation
        $result = $this->create($product_id, $name, $email, $text);

        return $result;        
    }

    public function approveComment($id, $approved)
    {
        $result = $this->approve($id, $approved);

        return $result;        
    }

}