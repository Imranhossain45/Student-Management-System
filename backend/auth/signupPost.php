<?php 
session_start();
require_once "../../db.php";

$error=[];

if(isset($_POST['submit'])){
  $fname=trim(htmlentities($_POST['fname']));
  $lname=trim(htmlentities($_POST['lname']));
  $email=trim(htmlentities($_POST['email']));
  $password=trim(htmlentities($_POST['password']));
  $md5=md5($password);

  if(empty($fname)){
    $error['fnameErr']='*Required';
  }
  if(empty($lname)){
    $error['lnameErr']='*Required';
  }
  if(empty($email)){
    $error['emailErr']='*Required';
  }
  if(empty($password)){
    $error['passwordErr']='*Required';
  }

  $selectQuery="SELECT email FROM users WHERE email='$email'";
  $selectResult=mysqli_query($conn,$selectQuery);
  if(mysqli_num_rows($selectResult)>0){
    $error['emailErr']='Email Already Exist! Enter another email';
    $_SESSION['error']=$error;
    header("location:signup.php");
    exit();
  }elseif(empty($error)){
    $query="INSERT into users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$md5')";
    $result=mysqli_query($conn,$query);
    if($result){
      $_SESSION['success']='Sign Up successfull!';
      header("location:login.php");
    }
  } else {
    $_SESSION['error'] = $error;
    header("location: signup.php");
  }
}
?>