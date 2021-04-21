<?php

session_start();

require_once "../vendor/autoload.php";

use App\Services\Redirect;
use App\Services\Notification;
use App\Controllers\CommentsController;

if(isset($_POST)) {

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    // Input basic validation
    if ($name == '') {
        Redirect::backWithError('Comment Name can not be empty');
    }
    if ($email == '') {
        Redirect::backWithError('Comment Email can not be empty');
    }
    if ($text == '') {
        Redirect::backWithError('Comment Text can not be empty');
    }

    $comment = new CommentsController;

    $comment->add($product_id, $name, $email, $text);        

    Notification::success('Your comment is waiting for Admin approve');

    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}