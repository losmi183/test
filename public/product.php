<?php

require_once "../vendor/autoload.php";

use App\Controllers\CommentsController;
use App\Controllers\FruitsController;
use App\Models\Comment;

if(isset($_GET['id'])) 
{
    $fruits = new FruitsController;

    $comments = new CommentsController;

    $product = $fruits->show($_GET['id']);
} 
else 
{
    header("Location: index.php");
}

require_once "includes/header.php";

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
        <a href="index.php" class="btn-lg btn btn-primary mb-5">Home</a>
    </div>
</div>


<section id="comments-list">
    <div class="container">
            
            <?php foreach($comments->display($product->id) as $comment): ?>
                <div class="row comment border my-3">
                    <div class="col-sm-4 col-md-3 col-xl-2 bg-secondary text-white p-2">
                        <h6 class="name"><?php echo $comment->name; ?>XX</h6>
                        <p class="email"><?php echo $comment->email; ?></p>
                        <p class="date"><?php echo formatDate($comment->date); ?></p>
                    </div>
                    <div class="col-sm-8 col-md-6 col-xl-10 p-2">
                        <p><?php echo $comment->text; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

    </div>
</section>

<section id="comment-create" class="my-5">
    <div class="container">
        <h3 class="mb-4">Leave your comment about company</h3>

        <form action="commentCreate.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product->id ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Text</label>
                <textarea class="form-control" name="text" cols="30" rows="4"></textarea>
            </div>
            <button class="btn btn-success">Send CC</button>
        </form>
    </div>
</section>


<?php require_once "includes/footer.php"; ?>