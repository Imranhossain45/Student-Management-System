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
  <link rel="stylesheet" href="../../css/styles.css">
  <title>Login Form</title>
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
                  <h3 class=" text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                  <form action="loginPost.php" method="POST">
                    <div class="form-group">
                      <b>Email Address:</b>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email">
                      <?php
                      if (isset($_SESSION['error']['emailErr'])) {
                        printf("<p class='text-danger'> %s </p>", $_SESSION['error']['emailErr']);
                      }
                      ?>
                    </div>
                    <div class="form-group">
                      <b>Password:</b>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password">
                      <?php
                      if (isset($_SESSION['error']['passwordErr'])) {
                        printf("<p class='text-danger'> %s </p>", $_SESSION['error']['passwordErr']);
                      }
                      ?>
                    </div>
                    <div class="form-check mb-3 mt-2">
                      <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="">
                      <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="text-center mt-4 mb-0">
                      <button type="submit" name="submit" class="btn btn-sm btn-primary">Login</button>
                    </div>
                    <div class="text-center mt-4 mb-0">
                      <a class="" href="password.html" style="text-decoration: none;">Forgot Password?</a>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">Need an account?<a href="signup.php" style="text-decoration: none;"> Sign up!</a>
                  </div>
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
  <script src="../../js/scripts.js" crossorigin="anonymous">
  </script>
  <script src=""></script>
</body>

</html>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>