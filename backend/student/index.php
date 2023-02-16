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
  <title>Student Home</title>
  <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../admin/assets/css/style.css">
</head>

<body>
  <!-- header area start -->
  <header class="header">
    <a href="#">Student Dashboard</a>
    <div class="logout">
      <a class="btn btn-danger" href="../auth/logout.php">Logout</a>
    </div>
  </header>
  <!-- header area end -->
  <!-- aside area start -->
  <aside>
    <ul>
      <li>
        <a href="">My Courses</a>
      </li>
      <li>
        <a href="">My Result</a>
      </li>
    </ul>
  </aside>
  <!-- aside area end -->
  







  <script src="../admin/assets/js/jquery-3.6.3.min.js"></script>
  <script src="../admin/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../admin/assets/js/scripts.js"></script>
</body>

</html>
<?php
unset($_SESSION['success']);
?>