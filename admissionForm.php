<?php
session_start();
require_once "db.php";
if (isset($_POST['submit'])) {
  $name = trim(htmlentities($_POST['name']));
  $email = trim(htmlentities($_POST['email']));
  $phone = trim(htmlentities($_POST['phone']));
  $message = trim(htmlentities($_POST['message']));

  $error = [];
  if (empty($name)) {
    $error['nameErr'] = '*Required';
  }
  if (empty($error)) {
    $query = "INSERT into admissions (name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      $_SESSION['success'] = 'Apply Success!';
      header("location: index.php");
    }
  } else {
    $_SESSION['error'] = $error;
    header("location: index.php");
  }
}
