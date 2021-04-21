<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Lemon App</title>
</head>
<body>
    
<section id="login">
    <div class="container">
        <form action="login.php" method="POST">
            
            <label for="">Email</label>
            <input type="text" name="email">

            <label for="">Password</label>
            <input type="password" name="password">

            <button class="btn btn-primary">Sign in</button>

        </form>
    </div>
</section>


<section id="notify">
  <div class="container">

    <!-- Error Message  -->
    <?php if(isset($_SESSION['error'])) : ?>

      <div class="alert alert-<?php echo $_SESSION["color"] ?>"><?php echo $_SESSION["error"] ?></div>
      <?php unset($_SESSION['error']); ?>
    
    <?php endif; ?>

    <!-- Success Message  -->
    <?php if(isset($_SESSION['success'])) : ?>

      <div class="alert alert-<?php echo $_SESSION["color"] ?>"><?php echo $_SESSION["success"] ?></div>
      <?php unset($_SESSION['success']); ?>
    
    <?php endif; ?>


  </div>
</section>