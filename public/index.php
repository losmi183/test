<?php

require_once "../vendor/autoload.php";

use App\Controllers\FruitsController;

require_once "../views/includes/header.php";

$fruits = new FruitsController;


?>

<section id="products">
    <div class="container">
        <div class="row">

            <?php foreach($fruits->index() as $fruit): ?>
                <div class="col-md-4">
                    <div class="box">
                        <div class="img-wrapper">
                            <img class="img-fluid" src="img/<?php echo $fruit->image; ?>" alt="">
                        </div>
                        <div class="content">
                            <h4><?php echo $fruit->title; ?></h4>
                            <p><?php echo short($fruit->description, 150); ?></p>
                        </div>
                    </div>
                </div>                
            <?php endforeach; ?>

        </div>

    </div>
</section>


<?php require_once "../views/includes/footer.php"; ?>