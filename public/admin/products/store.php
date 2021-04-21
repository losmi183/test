<?php

session_start();
// First check if not logged in
if(! $_SESSION["logged"])  { header('Location: /'); }

require_once "../../../vendor/autoload.php";

require_once "../../vars.php";

use App\Controllers\FruitsController;
use App\Services\Files;
use App\Services\Notification;

if(isset($_POST)) {

    $name = $_POST['name'];
    $description = $_POST['description'];


    // Validation
    if ($name == '') {
        Notification::error('Name field can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (strlen($name) > 20) {
        Notification::error('Name field can not be longer then 20 chars');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Validation
    if ($description == '') {
        Notification::error('Description field can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


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