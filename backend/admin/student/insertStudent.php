<?php
session_start();
require_once "../../../db.php";

if (isset($_POST['add_department'])) {
  $department = trim(htmlentities($_POST['department']));

  $error = [];
  if (empty($department)) {
    $error['departmentErr'] = '*Required';
  }
  if (empty($error)) {
    $dQuery = "INSERT into departments (department) VALUES ('$department')";
    $dResult = mysqli_query($conn, $dQuery);
    if ($dResult) {
      $_SESSION['success'] = 'Department Uploaded!';
    }
  } else {
    $_SESSION['error'] = $error;
  }
}
if (isset($_POST['submit'])) {
  $name = trim(htmlentities($_POST['name']));
  $email = trim(htmlentities($_POST['email']));
  $phone = trim(htmlentities($_POST['phone']));
  $student_id = trim(htmlentities($_POST['student_id']));
  $department = trim(htmlentities($_POST['department']));

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
  if (empty($student_id)) {
    $error['student_idErr'] = '*Required';
  }
  if (empty($department)) {
    $error['departmentErr'] = '*Required';
  }
  if (empty($error)) {
    $query = "INSERT into students (name,email,phone,student_id,department) VALUES ('$name','$email','$phone','$student_id','$department')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      $_SESSION['success'] = 'Student Data Uploaded!';
      header("location:allStudents.php");
    }
  } else {
    $_SESSION['error'] = $error;
    header("location:addStudent.php");
  }
}
