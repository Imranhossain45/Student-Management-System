<?php
session_start();
require_once "../../../db.php";
require_once "../inc/header.php";

$query = "SELECT * FROM teachers";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  $teachers = mysqli_fetch_all($result, true);
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
          <li class="breadcrumb-item active" aria-current="page">All Teachers</li>
        </ol>
      </nav>
      <h1 class="m-0">All Teachers</h1>
    </div>
  </div>
</div>
<div class="container-fluid page__container">
  <div class="row">
    <div class="col-lg-12">
      <?php
      if (isset($_SESSION['success'])) {
        printf("<p class='alert alert-success'>%s</p>", $_SESSION['success']);
      }
      ?>
    </div>
    <div class="card">
      <div class="card-header">
        <h1>All Teachers</h1>
      </div>
      <div class="card-body">
        <table class=" table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Teacher ID</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($teachers as $teacher) {
            ?>
              <tr>
                <td><?= $teacher['id'] ?></td>
                <td>
                  <img src="../../uploads/teacher/<?= $teacher['photo'] ?>" alt="<?= $teacher['name'] ?>" width="60">
                </td>
                <td><?= $teacher['name'] ?></td>
                <td><?= $teacher['email'] ?></td>
                <td><?= $teacher['phone'] ?></td>
                <td><?= $teacher['teacher_id'] ?></td>
                <td><?= $teacher['status'] ?></td>
                <td>
                  <a href="#" class="btn btn-sm btn-primary">Edit</a>
                  <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
</div>
<?php 
require_once "../inc/footer.php";
unset($_SESSION['success']);
?>