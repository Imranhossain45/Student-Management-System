<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login - SB Admin</title>
  <link href="../../css/styles.css" rel="stylesheet" />
</head>

<body class=" bg-dark bg-opacity-25">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-lg-5">

              <div class="card shadow-lg border-0 rounded-lg mt-5">

                <div class="card-header bg-dark bg-opacity-25">
                  <h2 class="text-center my-4">Sign Up</h2>
                </div>
                <div class="card-body">
                  <form action="signupPost.php" method="POST">
                    <div class="form-group">
                      <b>First Name:</b>
                      <input type="text" name="fname" class="form-control" placeholder="Enter Your First Name">
                      <?php
                      if (isset($_SESSION['error']['fnameErr'])) {
                        printf("<p class='text-danger'> %s </p>", $_SESSION['error']['fnameErr']);
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <b>Last Name:</b>
                      <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name">
                      <?php
                      if (isset($_SESSION['error']['lnameErr'])) {
                        printf("<p class='text-danger'> %s </p>", $_SESSION['error']['lnameErr']);
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <b>Email Address:</b>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email">
                      <?php
                      if (isset($_SESSION['error']['emailErr'])) {
                        printf("<p class='text-danger'> %s </p>", $_SESSION['error']['emailErr']);
                      }
                      ?>
                    </div>
                    <div class="form-group mt-2">
                      <b>Password:</b>
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <?php
                      if (isset($_SESSION['error']['passwordErr'])) {
                        printf("<p class='text-danger'> %s </p>", $_SESSION['error']['passwordErr']);
                      }
                      ?>
                    </div>
                    <div class="form-check mt-2 mb-3">
                      <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                      <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-sm btn-primary">Sign Up</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2022</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="" crossorigin="anonymous">
  </script>
  <script src="../../js/scripts.js"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
?>