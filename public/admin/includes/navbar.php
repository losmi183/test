<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo ADMIN; ?>">Citrus Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="<?php echo ADMIN . '/products/index.php'; ?>">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo ADMIN . '/comments/index.php'; ?>">Comments</a></li>
          </ul>
          <ul class="navbar-nav mr-left">
            <li class="nav-item"><a class="nav-link" href="<?php echo ADMIN . '/logout.php'; ?>">Logout</a></li>
          </ul>
      
        </div>
    </div>
</nav>

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