<?php

require_once "../vendor/autoload.php";

use App\Controllers\CommentsController;
use App\Controllers\FruitsController;

if(isset($_POST))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User;
    $user->login
}
else
{
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}



require_once "includes/header.php";

$fruits = new FruitsController;

$comments = new CommentsController;

?>



<?php require_once "includes/footer.php"; ?>