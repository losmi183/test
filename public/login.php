<?php
// Start the session
session_start();

require_once "../vendor/autoload.php";

use App\Models\User;
use App\Services\Notification;
use App\Controllers\FruitsController;
use App\Controllers\CommentsController;

if(isset($_POST))
{
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic Input validation
    if ($email == '') {
        Notification::error('Email can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    if ($password == '') {
        Notification::error('Password can not be empty');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    // Create new user for interaction with User model
    $user = new User;

    if ($userdata = $user->login($email, $password) )
    {
        $_SESSION["email"] = $userdata->email;
        $_SESSION["username"] = $userdata->username;
        $_SESSION["role"] = $userdata->role;
        $_SESSION["logged"] = $userdata->logged;

        // Success notification
        Notification::success('Login success, welcome');

        // Redirect to admin index
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



