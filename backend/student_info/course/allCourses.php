<?php
session_start();
require_once "../../../db.php";
require_once "../inc/header.php";
$query = "SELECT * FROM courses ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)) {
  $courses = mysqli_fetch_all($result, true);
}
$dQuery = "SELECT * FROM departments ";
$dResult = mysqli_query($conn, $dQuery);
if (mysqli_num_rows($dResult)) {
  $department = mysqli_fetch_all($dResult, true);
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
          <li class="breadcrumb-item active" aria-current="page">All course</li>
        </ol>
      </nav>
      <h1 class="m-0">All course</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h3>Select Department & Semester</h3>
        </div>
        <div class="card-body">
          <form action="#">
            <div class=" form-group">
              <b>Select Department:</b>
              <select name="" id="" class=" form-select">
                <option value="">CSE</option>
                <option value="">BBA</option>
              </select>
            </div>
            <div class=" form-group">
              <b>Select Semester:</b>
              <select name="" id="" class=" form-select">
                <option value="">First Semester</option>
                <option value="">Second Semester</option>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3" style="margin-left: 120px;">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid page__container">
  <div class="row">
    <div class="col-lg-12">
      <?php
      if (isset($_SESSION['success'])) {
        printf('<div class="alert alert-success"> %s </div>', $_SESSION['success']);
      }
      ?>
      <table class=" table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Subject</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($courses as $key => $course) {
          ?>
            <tr>
              <td><?= $course['id'] ?></td>
              <td>
                <?php
                $depID = $course['department'];
                $sql = "SELECT department FROM `departments` WHERE id='$depID'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  foreach ($result as $x) {
                    echo $x['department'];
                  }
                } else {
                  echo $course['department'];
                }
                ?>

              </td>
              <td><?= $course['semester'] ?></td>
              <td>

                <div>
                  <?= $course['subject1'] ?>
                </div>
                <div>
                  <?= $course['subject2'] ?>
                </div>
                <div>
                  <?= $course['subject3'] ?>
                </div>
                <div>
                  <?= $course['subject4'] ?>
                </div>
                <div>
                  <?= $course['subject5'] ?>
                </div>
                <div>
                  <?= $course['subject6'] ?>
                </div>

              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>
</div>


<?php
require_once "../inc/footer.php";
unset($_SESSION['success']);
unset($_SESSION['error']);
?>