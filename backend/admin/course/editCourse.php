<?php
session_start();
require_once "../../../db.php";
$id = $_GET['id'];
if ((int)$id && !empty($id)) {
  $query = "SELECT * FROM courses WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $course = mysqli_fetch_assoc($result);
  }
}
$error = [];
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
    $updateQuery = "UPDATE courses SET semester='$semester',subject1='$subject1',subject2='$subject2',subject3='$subject3',subject4='$subject4',subject5='$subject5',subject6='$subject6',department='$department' WHERE id =$id";
    $updateResult = mysqli_query($conn, $updateQuery);
    if ($updateResult) {
      $_SESSION['success'] = 'Course Data Updated!';
      header("location:allCourses.php");
    }
  } else {
    $_SESSION['error'] = $error;
  }
}
require_once "../inc/header.php";
?>
<div class="content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card-header text-center">

          <h1>Update Course Info</h1>
        </div>
        <div class="card">
          <div class="card-body">
            <form action="" method="POST">
              <div class=" form-group">
                <b>Semester:</b>
                <input type="text" name="semester" class=" form-control" value="<?= $course['semester'] ?>">
                <?php
                if (isset($error['semesterErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['semesterErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Subject1:</b>
                <input type="text" name="subject1" class=" form-control mt-2" value="<?= $course['subject1'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Subject2:</b>
                <input type="text" name="subject2" class=" form-control mt-2" value="<?= $course['subject2'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Subjec3:</b>
                <input type="text" name="subject3" class=" form-control mt-2" value="<?= $course['subject3'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Subjec4:</b>
                <input type="text" name="subject4" class=" form-control mt-2" value="<?= $course['subject4'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Subject5:</b>
                <input type="text" name="subject5" class=" form-control mt-2" value="<?= $course['subject5'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Subjec6:</b>
                <input type="text" name="subject6" class=" form-control mt-2" value="<?= $course['subject6'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>

              <div class=" form-group">
                <b>Department:</b>
                <input type="text" name="department" class="form-control mt-2" placeholder="Enter Department Id" value="<?= $course['department'] ?>">
                <?php
                if (isset($error['departmentErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['departmentErr']);
                }
                ?>
              </div>
              <button type=" submit" name="submit" class="btn btn-primary mt-3" style="margin-left: 220px;">Update Course</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<?php
require_once "../inc/footer.php";
unset($_SESSION['error']);
?>