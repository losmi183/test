<?php

session_start();
// First check if not logged in
if(! $_SESSION["logged"])  { header('Location: /'); }

require_once "../../../vendor/autoload.php";

use App\Controllers\FruitsController;

$products = new FruitsController;

require_once "../includes/header.php";

require_once "../includes/navbar.php";

?>


<div class="container mt-5">
    
    <h1>Create Products</h1>

    <form action="store.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description"  class="form-control" cols="30" rows="4"></textarea>
        </div>
        <input type="file" name="image"> <hr>
        <button class="btn btn-primary btn-lg">Save</button>
    </form>
    
</div>


<?php require_once "../includes/footer.php"; ?>
