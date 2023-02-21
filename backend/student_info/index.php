<?php
require_once "inc/header.php";
?>

    <?php
    if (isset($_SESSION['success'])) {
      printf('<div class="alert alert-success"> %s </div>', $_SESSION['success']);

      unset($_SESSION['success']);
    }
    ?>
  

  <?php
  require_once "inc/footer.php";
  ?>