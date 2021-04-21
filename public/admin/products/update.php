<?php

require_once "../../../vendor/autoload.php";

require_once "../../vars.php";

use App\Controllers\FruitsController;
use App\Services\Files;

if(isset($_POST)) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $old_image = $_POST['old_image'];


    // First check if image changed
    if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) 
    {
        // No new image
        $fruit = new FruitsController;
        $fruit->saveEdit($id, $name, $description, $old_image);
    }
    else
    {
        // New image added
        $image = Files::upload();
        // SAve in db
        $fruit = new FruitsController;
        $fruit->saveEdit($id, $name, $description, $image);

        // Delete old image
        Files::delete($old_image);   
    }


    // // First upload file with service class FileUpload. Static method return basename for image in DB
    // $image = Files::upload();    

    // // Create new FruitsController for interaction with Fruit model
    // $fruit = new FruitsController;

    // $fruit->store($name, $description, $image);

    header('Location: ' . ADMIN . '/products/index.php');
} 
else {
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}