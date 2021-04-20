<?php

require_once "../vendor/autoload.php";

use App\Controllers\FruitsController;
use App\Models\Comment;

require_once "../views/includes/header.php";

$fruits = new FruitsController;

$comments = new Comment;

?>

<section id="products" class="my-5">
    <div class="container">
        <div class="row">

            <?php foreach($fruits->take() as $fruit): ?>
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-wrapper">
                            <a href="product.php?id=<?php echo $fruit->id; ?>">
                                <img class="img-fluid" src="img/<?php echo $fruit->image; ?>" alt="">
                            </a>
                        </div>
                        <div class="content">
                            <h4><a href="product.php?id=<?php echo $fruit->id; ?>"><?php echo $fruit->title; ?></a></h4>
                            <p><?php echo short($fruit->description, 150); ?></p>
                        </div>
                    </div>
                </div>                
            <?php endforeach; ?>

        </div>

    </div>
</section>

<section id="comments-list">
    <div class="container">
            
            <?php foreach($comments->findByProduct(0) as $comment): ?>
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

        <form action="">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Text</label>
                <textarea class="form-control" name="text" cols="30" rows="4"></textarea>
            </div>
            <button class="btn btn-success">Send</button>
        </form>
    </div>
</section>


<?php require_once "../views/includes/footer.php"; ?>