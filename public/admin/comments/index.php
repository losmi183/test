<?php

require_once "../../../vendor/autoload.php";

use App\Controllers\CommentsController;

$comments = new CommentsController;

require_once "../includes/header.php";

require_once "../includes/navbar.php";

?>


<div class="container mt-5">
    <h1>Comments</h1>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Belong to product</th>
            <th>Name</th>
            <th>Email</th>
            <th>Text</th>
            <th>Approved</th>
        </tr>
        <?php foreach($comments->index() as $comment): ?>

            <tr>
                <td><?php echo $comment->id; ?></td>
                <td><?php echo $comment->product_id; ?></td>
                <td><?php echo $comment->name; ?></td>
                <td><?php echo $comment->email; ?></td>
                <td><?php echo $comment->text; ?></td>
                <td>
                    <form action="approve.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $comment->id; ?>">
                        <select name="approved" onchange="this.form.submit()">
                            <option <?php echo $comment->approved == 1 ? 'selected' : ''; ?> value="1">Approved</option>
                            <option <?php echo $comment->approved == 0 ? 'selected' : ''; ?> value="0">Not Approved</option>
                        </select>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

    

</div>


<?php require_once "../includes/footer.php"; ?>
