<?php

session_start();

require_once "../vendor/autoload.php";

use App\Services\Notification;
use App\Controllers\CommentsController;

if(isset($_POST)) {

    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    // Input basic validation
    if ($name == '') {
        Notification::error('Comment Name can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo 'DDDD';
        exit;
    }
    if ($email == '') {
        Notification::error('Comment Email can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    if ($text == '') {
        Notification::error('Comment Text can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
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