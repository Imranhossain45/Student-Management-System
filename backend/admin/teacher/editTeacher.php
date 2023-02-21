<?php
session_start();
require_once "../../../db.php";

$id = $_GET['id'];
if ((int)$id && !empty($id)) {

  $query = "SELECT * FROM teachers WHERE id= $id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $teacher = mysqli_fetch_assoc($result);
  }
}
$error = [];
if (isset($_POST['submit'])) {
  $name = trim(htmlentities($_POST['name']));
  $email = trim(htmlentities($_POST['email']));
  $phone = trim(htmlentities($_POST['phone']));
  $photo = $_FILES['photo'];
  $teacher_id = trim(htmlentities($_POST['teacher_id']));
  $teacher_info = trim(htmlentities($_POST['teacher_info']));

  $photoType = ['jpeg', 'jpg', 'png'];
  $photoEx = explode('.', $photo['name']);
  $photoTypeCheck = in_array(strtolower(end($photoEx)), $photoType);

  $error = [];
  if (empty($name)) {
    $error['nameErr'] = '*Required';
  }
  if (empty($email)) {
    $error['emailErr'] = '*Required';
  }
  if (empty($phone)) {
    $error['phoneErr'] = '*Required';
  }
  if (empty($teacher_id)) {
    $error['teacher_idErr'] = '*Required';
  }
  if (empty($name)) {
    $error['teacher_infoErr'] = '*Required';
  }

  if (empty($photo['name'])) {
    $error['photoErr'] = 'Select Your Photo';
  } elseif ($photoType === false) {
    $error['photoTypeErr'] = 'Select Valid Photo(jpeg,jpg,png)';
  } elseif ($photo['size'] > 2000000) {
    $error['photoSizeErr'] = 'Max Photo Size 2MB';
  }


  if ($photo['name']) {
    $photoName = $name . '-' . uniqid() . '.' . end($photoEx);
    $photoPath = "../../uploads/teacher/" . $teacher['photo'];
    if (file_exists($photoPath)) {
      unlink($photoPath);
    }
    $uploadPhoto = move_uploaded_file($photo['tmp_name'], "../../uploads/teacher/" . $photoName);
    $updatePhotoQuery = "UPDATE teachers SET photo='$photoName' WHERE id=$id";
    $updatePhotoResult = mysqli_query($conn, $updatePhotoQuery);
  }

  if (empty($error)) {
    $updateQuery = "UPDATE teachers SET `name`='$name',`email`='$email',`phone`='$phone', `teacher_id`='$teacher_id', `teacher_info`='$teacher_info' WHERE id= $id";

    $updateResult = mysqli_query($conn, $updateQuery);
    if ($updateResult) {
      $_SESSION['success'] = "Teacher info Edited";
      header("location: allTeachers.php");
    }
  }
};


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
          <li class="breadcrumb-item active" aria-current="page">Edit Teacher</li>
        </ol>
      </nav>
      <h1 class="m-0">Edit Teacher</h1>
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card-header">
        <h1>Edit Teachers Info</h1>
      </div>
      <div class="card">
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <b>Name:</b>
              <input type="text" name="name" class=" form-control" placeholder="Enter Teacher Name" value="<?= $teacher['name'] ?>">
              <?php
              if (isset($error['nameErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['nameErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Email:</b>
              <input type="email" name="email" class=" form-control" placeholder="Enter Teacher Email" value="<?= $teacher['email'] ?>">
              <?php
              if (isset($error['emailErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['emailErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Phone:</b>
              <input type="number" name="phone" class=" form-control" placeholder="Enter Teacher's Phone" value="<?= $teacher['phone'] ?>">
              <?php
              if (isset($error['phoneErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['phoneErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Photo:</b>
              <input type="file" name="photo" class=" form-control" value="<?= $teacher['photo'] ?>">
              <?php
              if (isset($error['photoErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['photoErr']);
              }
              if (isset($error['photoTypeErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['photoTypeErr']);
              }
              if (isset($error['photoSizeErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['photoSizeErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Teacher Id:</b>
              <input type="number" name="teacher_id" class=" form-control" placeholder="Enter Teacher Id" value="<?= $teacher['teacher_id'] ?>">
              <?php
              if (isset($error['teacher_idErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['teacher_idErr']);
              }
              ?>
            </div>
            <div class="form-group">
              <b>Teacher Info:</b>
              <textarea name="teacher_info" class=" form-control" placeholder="Enter Teacher Info" rows="7"><?= $teacher['teacher_info'] ?></textarea>
              <?php
              if (isset($error['teacher_infoErr'])) {
                printf("<p class='alert alert-danger'>%s</p>", $error['teacher_infoErr']);
              }
              ?>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3">Update Teacher</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once "../inc/footer.php";
unset($error);
?>