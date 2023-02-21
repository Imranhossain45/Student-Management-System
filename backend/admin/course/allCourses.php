<?php
session_start();
require_once "../../../db.php";
require_once "../inc/header.php";
$query = "SELECT * FROM courses ";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)) {
  $courses = mysqli_fetch_all($result, true);
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
            <th>Status</th>
            <th>Action</th>
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
              <td><?= $course['status'] ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-primary">View</a>
                <a href="editCourse.php?id=<?= $course['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                <a href="deleteCourse.php?id=<?= $course['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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