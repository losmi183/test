<?php

require_once "../vendor/autoload.php";

use App\Controllers\FruitsController;

if(isset($_GET['id'])) 
{
    $fruits = new FruitsController;

    $product = $fruits->show($_GET['id']);
} 
else 
{
    header("Location: index.php");
}

require_once "../views/includes/header.php";

?>

<div class="container">
    <div class="text-center">
        <div class="img-wrapper">
            <img src="img/<?php echo $product->image; ?>" alt="" class="img-fluid">
        </div>
        <div class="content">
            <h3><?php echo $product->title; ?></h3>
            <p><?php echo $product->description; ?></p>
        </div>
        <a href="index.php" class="btn btn-primary">Nazad</a>
    </div>
</div>





<?php require_once "../views/includes/footer.php"; ?>