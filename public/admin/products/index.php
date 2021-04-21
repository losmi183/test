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
    <h1>Products</h1>
    <a href="create.php" class="btn btn-primary">Add new</a>

    
    <table class="table">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th></th>
        </tr>
        <?php foreach($products->index() as $product): ?>

            <tr>
                <td><?php echo $product->id; ?></td>
                <td><img height="80px" src="/img/<?php echo $product->image; ?>" alt=""> </td>
                <td><?php echo $product->title; ?></td>
                <td><?php echo $product->description; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $product->id; ?>" class="btn btn-success">Edit</a>

                    <form action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                        <input type="hidden" name="image" value="<?php echo $product->image; ?>">
                        <button onclick="return confirm('Are you sure you want to delete product?')" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    
</div>


<?php require_once "../includes/footer.php"; ?>
