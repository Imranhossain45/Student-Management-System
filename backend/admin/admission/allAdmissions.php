<?php
session_start();
require_once "../inc/header.php";
require_once "../../../db.php";

$query = "SELECT * FROM admissions";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result)) {
  $admissions = mysqli_fetch_all($result, true);
}
?>


<?php
if (isset($_SESSION['success'])) {
  printf('<div class="alert alert-success"> %s </div>', $_SESSION['success']);
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
          <li class="breadcrumb-item active" aria-current="page">All Admission</li>
        </ol>
      </nav>
      <h1 class="m-0">All Admission</h1>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h1 class=" text-center">Applied For Admission</h1>
          </div>
          <div class="card-body">
            <table class=" table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($admissions as $admission) {
                ?>
                  <tr>
                    <td><?= $admission['id'] ?></td>
                    <td><?= $admission['name'] ?></td>
                    <td><?= $admission['email'] ?></td>
                    <td><?= $admission['phone'] ?></td>
                    <td><?= substr($admission['message'], 0, 30) . '...' ?></td>
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
  </div>
</div>


<?php
require_once "../inc/footer.php";
?>