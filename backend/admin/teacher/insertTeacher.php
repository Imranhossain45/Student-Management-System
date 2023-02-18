<?php
session_start();
require_once "../../../db.php";
if (isset($_POST['submit'])) {
  $name = trim(htmlentities($_POST['name']));
  $email = trim(htmlentities($_POST['email']));
  $phone = trim(htmlentities($_POST['phone']));
  $photo = $_FILES['photo'];
  $teacher_id = trim(htmlentities($_POST['teacher_id']));

  $photoType=['jpeg','jpg','png'];
  $photoEX=explode('.',$photo['name']);
  $photoTypeCheck=in_array(strtolower(end($photoEX)),$photoType);

  $error = [];
  if (empty($name)) {
    $error['nameErr'] = '*Required';
  }
  if (empty($email)) {
    $error['emailErr'] = '*Required';
  }
  if (empty($phone)) {
    $error['phoneErr'] = '*Required';
  }
  if (empty($name)) {
    $error['nameErr'] = '*Required';
  }
  if (empty($photo['name'])) {
    $error['photoErr'] = 'Select Your Photo';
  }elseif($photoType===false){
    $error['photoTypeErr']='Select Valid Photo(jpeg,jpg,png)';
  }elseif($photo['size']>2000000){
    $error['photoSizeErr']='Max Photo Size 2MB';
  }
  
  if(empty($error)){
    $photoName=$name.'-'.uniqid(). '.'. end($photoEX);
    $uploadPhoto=move_uploaded_file($photo['tmp_name'],"../../uploads/teacher/". $photoName);

    if($uploadPhoto){
      $query="INSERT into teachers (name,email,phone,photo,teacher_id) VALUES ('$name','$email','$phone','$photoName','$teacher_id')";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']='Teachers info added Successfull!';
        header("location: allTeachers.php");
      }
    }
  }else{
    $_SESSION['error']=$error;
    header("location: addTeacher.php");
  }
}
