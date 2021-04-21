<?php

require_once "../../../vendor/autoload.php";

use App\Controllers\FruitsController;

if(isset($_POST)) {

    $id = $_POST['id'];

    $fruit = new FruitsController;

    $fruit->destroy($id);
    

    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}