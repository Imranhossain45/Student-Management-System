<?php
session_start();
require_once "../../../db.php";
$id = $_GET['id'];
if ((int)$id && !empty($id)) {
  $query = "SELECT id,name,email,phone,student_id,department FROM students WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);
  }
}
$error = [];
if (isset($_POST['submit'])) {
  $name = trim(htmlentities($_POST['name']));
  $email = trim(htmlentities($_POST['email']));
  $phone = trim(htmlentities($_POST['phone']));
  $student_id = trim(htmlentities($_POST['student_id']));
  $department = trim(htmlentities($_POST['department']));

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
    $updateQuery = "UPDATE students SET name='$name',email='$email',phone='$phone',student_id='$student_id',department='$department' WHERE id =$id";
    $updateResult = mysqli_query($conn, $updateQuery);
    if ($updateResult) {
      $_SESSION['success'] = 'Student Data Updated!';
      header("location:allStudents.php");
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
          
          <h1>Update Atudent Info</h1>
        </div>
        <div class="card">
          <div class="card-body">
            <form action="" method="POST">
              <div class=" form-group">
                <b>Name:</b>
                <input type="text" name="name" class=" form-control" placeholder="Enter Student Name" value="<?= $student['name'] ?>">
                <?php
                if (isset($error['nameErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['nameErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Email:</b>
                <input type="email" name="email" class=" form-control mt-2" placeholder="Enter Student Email" value="<?= $student['email'] ?>">
                <?php
                if (isset($error['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Phone:</b>
                <input type="number" name="phone" class=" form-control mt-2" placeholder="Enter Student Phone" value="<?= $student['phone'] ?>">
                <?php
                if (isset($error['phoneErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['phoneErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Student ID:</b>
                <input type="number" name="student_id" class=" form-control mt-2" placeholder="Enter Student Phone" value="<?= $student['student_id'] ?>">
                <?php
                if (isset($error['student_idErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['student_idErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Department:</b>
                <input type="text" name="department" class="form-control mt-2" placeholder="Enter Department Name" value="<?= $student['department'] ?>">
                <?php
                if (isset($error['departmentErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $error['departmentErr']);
                }
                ?>
              </div>
              <button type=" submit" name="submit" class="btn btn-primary mt-3" style="margin-left: 220px;">Update Student</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <form action="#" method="POST">
                <div class=" form-group">
                  <b>Department Name:</b>
                  <input type="text" name="department" class=" form-control">
                  <?php
                  if (isset($_SESSION['error']['departmentErr'])) {
                    printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['departmentErr']);
                  }
                  ?>
                </div>
                <button type="submit" name="add_department" class="btn bt-sm btn-primary mt-4">Add Department</button>
              </form>
            </div>
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