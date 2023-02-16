<?php
session_start();
if (!isset($_SESSION['login-user'])) {
  header("location: ../auth/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Home</title>
  <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
</head>

<body>
  <!-- header area start -->
  <header class="header">
    <a href="#">Admin Dashboard</a>
    <div class="logout">
      <a class="btn btn-danger" href="../auth/logout.php">Logout</a>
    </div>
  </header>
  <!-- header area end -->
  <!-- aside area start -->
  <aside>
    <ul>
      <li>
        <a href="">Admission</a>
      </li>
      <li>
        <a href="">Add Teacher</a>
      </li>
      <li>
        <a href="">View Teacher</a>
      </li>
      <li>
        <a href="">Add Student</a>
      </li>
      <li>
        <a href="">View Student</a>
      </li>
      <li>
        <a href="">Add Courses</a>
      </li>
      <li>
        <a href="">View Courses</a>
      </li>
    </ul>
  </aside>
  <!-- aside area end -->
  <div class="content">
    <?php
    if (isset($_SESSION['success'])) {
      printf('<div class="alert alert-success"> %s </div>', $_SESSION['success']);
    }
    ?>
    <h1>Sidebar Accordion</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa qui atque voluptas voluptatum odio maxime ducimus a quaerat, dolore est repudiandae tempora. Ullam voluptatum ad non provident numquam officia temporibus ducimus corrupti, culpa excepturi aspernatur rem vero fugiat perferendis voluptates quia beatae deserunt possimus eos soluta odio, labore iusto magnam?</p>
    
  </div>







  <script src="../admin/assets/js/jquery-3.6.3.min.js"></script>
  <script src="../admin/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../admin/assets/js/scripts.js"></script>
</body>

</html>
<?php
unset($_SESSION['success']);
?>