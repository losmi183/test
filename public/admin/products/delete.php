<?php

require_once "../../../vendor/autoload.php";

require_once "../../vars.php";

use App\Controllers\FruitsController;
use App\Services\Files;

if(isset($_POST)) {

    // Id for delete row in DB. $image for delete file on img folder
    $id = $_POST['id'];
    $image = $_POST['image'];

    // new FruitsController for interaction with Fruit model
    $fruit = new FruitsController;
    // Delete in DB
    $fruit->destroy($id);


    // Static Files class delete file 
    Files::delete($image);
    

    header('Location: ' . $_SERVER['HTTP_REFERER']);
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}