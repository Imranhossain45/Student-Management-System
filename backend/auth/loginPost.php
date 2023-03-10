<?php 
session_start();
require_once "../../db.php";

$error=[];
if(isset($_POST['submit'])){
  $email=trim(htmlentities($_POST['email']));
  $password=trim(htmlentities($_POST['password']));
  $type= trim(htmlentities($_POST['user_type']));
  $md5=md5($password);

  if(empty($email)){
    $error['emailErr']='*Required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }
  if(empty($password)){
    $error['passwordErr']='*Required';
  }

  $query="SELECT fname,lname,email,password,user_type FROM users WHERE email='$email' AND password='$md5'";
  $result=mysqli_query($conn,$query);
  $data=mysqli_fetch_array($result);
  if(mysqli_num_rows($result)>0){
    
    if($data['user_type'] == 'student'){
      
      $user = mysqli_fetch_all($result);
      unset($user['password']);
      $_SESSION['login-user'] = $user;
      $_SESSION['user_type'] = $data['user_type'];
      $_SESSION['user-name']= $data['fname'];
      header("location: ../student_info/index.php");
    }elseif($data['user_type'] == 'admin'){
      header("location: ../admin/index.php");
      $user = mysqli_fetch_all($result);
      unset($user['password']);
      $_SESSION['login-user'] = $user;
      $_SESSION['user_type'] = $data['user_type'];
    }
     
    
    $_SESSION['success'] = 'Login Successfull!';
  }else{
    $_SESSION['error'] = $error;
    header("location: login.php");
  }
}
