<?php
// Start the session
session_start();

require_once "../vendor/autoload.php";

use App\Models\User;
use App\Controllers\FruitsController;
use App\Controllers\CommentsController;

if(isset($_POST))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];


    $user = new User;

    if ($userdata = $user->login($email, $password) )
    {
        $_SESSION["userdata"] = $userdata;

        // print_r($_SESSION["userdata"]);

        header('Location: /admin/index.php');
    }
    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
else
{
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>



