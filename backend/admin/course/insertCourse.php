<?php
session_start();
require_once "../../../db.php";


if (isset($_POST['submit'])) {
  $semester = trim(htmlentities($_POST['semester']));
  $subject1 = trim(htmlentities($_POST['subject1']));
  $subject2 = trim(htmlentities($_POST['subject2']));
  $subject3 = trim(htmlentities($_POST['subject3']));
  $subject4 = trim(htmlentities($_POST['subject4']));
  $subject5 = trim(htmlentities($_POST['subject5']));
  $subject6 = trim(htmlentities($_POST['subject6']));
  $department = trim(htmlentities($_POST['department']));

  $error = [];
  if (empty($semester)) {
    $error['semesterErr'] = '*Required';
  }
  if (empty($subject1)) {
    $error['subject1Err'] = '*Required';
  }
  if (empty($subject2)) {
    $error['subject2Err'] = '*Required';
  }
  if (empty($subject3)) {
    $error['subject3Err'] = '*Required';
  }
  if (empty($error)) {
    $query = "INSERT into courses (semester,subject1,subject2,subject3,subject4,subject5,subject6,department) VALUES ('$semester','$subject1','$subject2','$subject3','$subject4','$subject5','$subject6','$department')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      $_SESSION['success'] = 'Course Data Uploaded!';
      header("location:allCourses.php");
    }
  } else {
    $_SESSION['error'] = $error;
    header("location:addCourse.php");
  }
}
