<?php

session_start();
// First check if not logged in
if(! $_SESSION["logged"])  { header('Location: /'); }

use App\Controllers\FruitsController;

if(isset($_GET['id']))
{
    require_once "../../../vendor/autoload.php";

    $products = new FruitsController;

    // Find selected product by id
    $product = $products->show($_GET['id']);

    require_once "../includes/header.php";

    require_once "../includes/navbar.php";
}
else 
{
    // Back to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>

<div class="container mt-5">
    
    <h1>Edit Products</h1>

    <form action="update.php" method="POST" enctype="multipart/form-data">
    
        <input type="hidden" name="id" value="<?php echo $product->id; ?>">

        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $product->title; ?>">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description"  class="form-control" cols="30" rows="4"> <?php echo $product->description; ?> </textarea>
        </div>

        <label for="">Image</label><br>
        <input type="hidden" name="old_image" value="<?php echo $product->image; ?>">
        <img height="100px" src="/img/<?php echo $product->image; ?>" alt=""> <br><br>

        <label for="">Select New Image</label>
        <input class="form-control" type="file" name="image"> <hr>

        <button class="btn btn-primary btn-lg">Save</button>
    </form>
    
</div>


<?php require_once "../includes/footer.php"; ?>
