<?php

require_once "../../../vendor/autoload.php";

require_once "../../vars.php";

use App\Controllers\FruitsController;
use App\Services\Files;

if(isset($_POST)) {

    $name = $_POST['name'];
    $description = $_POST['description'];

    // First upload file with service class FileUpload. Static method return basename for image in DB
    $image = Files::upload();    

    // Create new FruitsController for interaction with Fruit model
    $fruit = new FruitsController;

    $fruit->store($name, $description, $image);

    header('Location: ' . ADMIN . '/products/index.php');
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}