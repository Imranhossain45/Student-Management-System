<?php
session_start();
require_once "../inc/header.php";
?>
<div class="container-fluid page__heading-container">
  <div class="page__heading d-flex align-items-end">
    <div class="flex">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="../index.php">
              <h5>Home</h5>
            </a></li>
          <li class="breadcrumb-item active" aria-current="page">Add Teacher</li>
        </ol>
      </nav>
      <h1 class="m-0">Add Teacher</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card-header">
        <h1>Add Teachers Info</h1>
      </div>
      <div class="card">
        <div class="card-body">
          <form action="insertTeacher.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <b>Name:</b>
              <input type="text" name="name" class=" form-control" placeholder="Enter Teacher Name">
              <?php
              if (isset($_SESSION['error']['nameErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['nameErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Email:</b>
              <input type="email" name="email" class=" form-control" placeholder="Enter Teacher Email">
              <?php
              if (isset($_SESSION['error']['emailErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['emailErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Phone:</b>
              <input type="number" name="phone" class=" form-control" placeholder="Enter Teacher's Phone">
              <?php
              if (isset($_SESSION['error']['phoneErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['phoneErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Photo:</b>
              <input type="file" name="photo" class=" form-control">
              <?php
              if (isset($_SESSION['error']['photoErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['photoErr']);
              }
              if (isset($_SESSION['error']['photoTypeErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['photoTypeErr']);
              }
              if (isset($_SESSION['error']['photoSizeErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['photoSizeErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Teacher Id:</b>
              <input type="number" name="teacher_id" class=" form-control" placeholder="Enter Teacher Id">
              <?php
              if (isset($_SESSION['error']['teacher_idErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['teacher_idErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Teacher Info:</b>
              <textarea name="teacher_info" class=" form-control" placeholder="Enter Teacher Info" rows="7"></textarea>
              <?php
              if (isset($_SESSION['error']['teacher_infoErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $_SESSION['error']['teacher_infoErr']);
              }
              ?>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3">Add Teacher</button>
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