<?php

session_start();
// First check if not logged in
if(! $_SESSION["logged"])  { header('Location: /'); }

require_once "../../../vendor/autoload.php";

require_once "../../vars.php";

use App\Services\Files;
use App\Services\Redirect;
use App\Services\Notification;
use App\Controllers\FruitsController;

if(isset($_POST)) {

    $name = $_POST['name'];
    $description = $_POST['description'];


    // Validation
    if ($name == '') {
        Redirect::backWithError('Name field can not be empty');
    }

    if (strlen($name) > 20) {
        Redirect::backWithError('Name field can not be longer then 20 chars');
    }

    // Validation
    if ($description == '') {
        Redirect::backWithError('Description field can not be empty');
    }


    // First upload file with service class FileUpload. Static method return basename for image in DB
    $image = Files::upload();    

    // Create new FruitsController for interaction with Fruit model
    $fruit = new FruitsController;

    $fruit->store($name, $description, $image);

    Notification::success('Product Added');

    header('Location: ' . ADMIN . '/products/index.php');
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}