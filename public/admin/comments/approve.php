<?php

require_once "../../../vendor/autoload.php";

use App\Controllers\CommentsController;

if(isset($_POST)) {

    $id = $_POST['id'];
    $approved = $_POST['approved'];

    $comment = new CommentsController;

    $comment->approveComment($id, $approved);

    // $comment = new CommentsController;

    // $comment->add($product_id, $name, $email, $text);        

    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}