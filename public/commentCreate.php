<?php

require_once "../vendor/autoload.php";

use App\Controllers\CommentsController;

if(isset($_POST)) {

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    // var_dump($_POST);

    $comment = new CommentsController;

    $comment->add($product_id, $name, $email, $text);        

    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}