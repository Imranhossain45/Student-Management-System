<?php
session_start();
require_once "../../../db.php";
require_once "../inc/header.php";
$sql = "SELECT * FROM `departments` WHERE status=1";
$result = $conn->query($sql);
?>
<div class="content">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card-header text-center">
          <h1>Add Atudent Info</h1>
        </div>
        <div class="card">
          <div class="card-body">
            <form action="insertStudent.php" method="POST">
              <div class=" form-group">
                <b>Name:</b>
                <input type="text" name="name" class=" form-control" placeholder="Enter Student Name">
                <?php
                if (isset($_SESSION['error']['nameErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['nameErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Email:</b>
                <input type="email" name="email" class=" form-control mt-2" placeholder="Enter Student Email">
                <?php
                if (isset($_SESSION['error']['emailErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['emailErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Phone:</b>
                <input type="number" name="phone" class=" form-control mt-2" placeholder="Enter Student Phone">
                <?php
                if (isset($_SESSION['error']['phoneErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['phoneErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Student ID:</b>
                <input type="number" name="student_id" class=" form-control mt-2" placeholder="Enter Student Phone">
                <?php
                if (isset($_SESSION['error']['student_idErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['student_idErr']);
                }
                ?>
              </div>
              <div class=" form-group">
                <b>Department:</b>
                <select name="department" class="form-control mt-2">
                  <option disabled selected>Select Department</option>
                  <?php
                  if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <option value="<?= $row['id'] ?>"><?= $row['department'] ?></option>
                  <?php
                    }
                  }
                  $conn->close();
                  ?>
                </select>
                <?php
                if (isset($_SESSION['error']['departmentErr'])) {
                  printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['departmentErr']);
                }
                ?>
              </div>
              <button type=" submit" name="submit" class="btn btn-primary mt-3" style="margin-left: 220px;">Add Student</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <form action="" method="POST">
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