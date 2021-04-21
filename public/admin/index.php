<?php

session_start();

if(! var_dump($_SESSION["userdata"]) )
{
    header("Location: /index.php");
}

require_once "../../vendor/autoload.php";

use App\Controllers\CommentsController;

require_once "includes/header.php";

require_once "includes/navbar.php";

?>

<div class="container mt-5">
    <h1>Welcome to the Citrus Admin Area</h1>
    <p>Full administration of Products and Comments approve</p>
</div>




<?php require_once "includes/footer.php"; ?>