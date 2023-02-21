<?php
session_start();
require_once "../../../db.php";
require_once "../inc/header.php";
$sql = "SELECT * FROM `departments` WHERE status=1";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  $rows = mysqli_fetch_all($result, true);
}
?>
<div class="container-fluid page__heading-container">
  <div class="page__heading d-flex align-items-end">
    <div class="flex">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="../index.php">
              <h5>Home</h5>
            </a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Course</li>
        </ol>
      </nav>
      <h1 class="m-0">Add Course</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card-header">
        <h1>Add Course</h1>
      </div>
      <div class="card">
        <div class="card-body">
          <form action="insertCourse.php" method="POST">
            <div class=" form-group">
              <b>Department:</b>
              <select name="department" class="form-control mt-2">
                <option disabled selected>Select Department</option>
                <?php
                foreach ($rows as $row) {
                ?>
                  <option value="<?= $row['id'] ?>"><?= $row['department'] ?></option>
                <?php
                }
                ?>
              </select>
              <?php
              if (isset($_SESSION['error']['departmentErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['departmentErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Semester:</b>
              <input type="text" name="semester" class=" form-control" placeholder="Enter semester Name">
              <?php
              if (isset($_SESSION['error']['semesterErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['semesterErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Subject1:</b>
              <input type="text" name="subject1" class=" form-control" placeholder="Enter subject1">
              <?php
              if (isset($_SESSION['error']['subject1Err'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['subject1Err']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Subject2:</b>
              <input type="text" name="subject2" class=" form-control" placeholder="Enter subject2">
              <?php
              if (isset($_SESSION['error']['subject2Err'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['subject2Err']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Subject3:</b>
              <input type="text" name="subject3" class=" form-control" placeholder="Enter subject3">
              <?php
              if (isset($_SESSION['error']['subject3Err'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['subject3Err']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Subject4:</b>
              <input type="text" name="subject4" class=" form-control" placeholder="Enter subject4">
            </div>
            <div class="form-group">
              <b>Subject5:</b>
              <input type="text" name="subject5" class=" form-control" placeholder="Enter subject5">
            </div>
            <div class="form-group">
              <b>Subject6:</b>
              <input type="text" name="subject6" class=" form-control" placeholder="Enter subject6">
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-3">Add Course</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




<?php
require_once "../inc/footer.php";
unset($_SESSION['error']);
?>