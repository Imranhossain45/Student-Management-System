<?php
session_start();
require_once "../../../db.php";
require_once "../inc/header.php";
$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)) {
  $students = mysqli_fetch_all($result,true);
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
          <li class="breadcrumb-item active" aria-current="page">All Students</li>
        </ol>
      </nav>
      <h1 class="m-0">All Students</h1>
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
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Student ID</th>
            <th>Department</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          foreach ($students as $student) {
          ?>
            <tr>
              <td><?= $student['id'] ?></td>
              <td><?= $student['name'] ?></td>
              <td><?= $student['email'] ?></td>
              <td><?= $student['phone'] ?></td>
              <td><?= $student['student_id'] ?></td>
              <td><?= $student['department'] ?></td>
              <td><?= $student['status'] ?></td>
              <td>
                <a href="#" class="btn btn-sm btn-primary">View</a>
                <a href="editstudent.php?id=<?= $student['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                <a href="deletestudent.php?id=<?= $student['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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