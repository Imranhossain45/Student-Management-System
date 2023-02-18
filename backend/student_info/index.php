<?php
if (!isset($_SESSION['login-user'])) {
  header("location: ../auth/login.php");
}
function siteUrl()
{
  $bassfol = explode('/', $_SERVER['REQUEST_URI']);
  $protocol = explode('/', $_SERVER["SERVER_PROTOCOL"]);
  return strtolower($protocol['0']) . "://" . $_SERVER['SERVER_NAME'] . "/" . $bassfol[1];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <link href="<?= siteUrl() ?>/backend/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= siteUrl() ?>/backend/admin/assets/css/datatable.css" rel="stylesheet" />
  <link href="<?= siteUrl() ?>/backend/admin/assets/css/styles.css" rel="stylesheet" />
  <link href="<?= siteUrl() ?>/backend/admin/assets/css/style.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= siteUrl() ?>/backend/student/index.php">Start Bootstrap</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="<?= siteUrl() ?>/backend/auth/logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="<?= siteUrl() ?>/backend/student/index.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <!-- banner part start -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsbanner" aria-expanded="false" aria-controls="collapseLayoutsbanner">
              <div class="sb-nav-link-icon"><i class="fa-regular fa-image"></i></div>
              Student Info
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsbanner" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/banner/allBanners.php">All
                  My Courses</a>
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/banner/addBanner.php">My Result</a>
              </nav>
            </div>
            <!-- banner part end -->
            <!-- teacher part start -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Teachers
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/teacher/allTeachers.php">All
                  Teachers</a>
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/teacher/addTeacher.php">Add
                  Teacher</a>
              </nav>
            </div>
            <!-- Teacher part end -->
            <!-- Students part start -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsblog" aria-expanded="false" aria-controls="collapseLayoutsblog">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Students
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsblog" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/student/allStudents.php">All
                  Students</a>
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/student/addStudent.php">Add
                  Student</a>
              </nav>
            </div>
            <!-- blog part end -->
            <!-- team part start -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsteam" aria-expanded="false" aria-controls="collapseLayoutsteam">
              <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-person"></i></div>
              Admission
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsteam" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?= siteUrl() ?>/backend/admin/admission/allAdmissions.php">All
                  Admissions</a>
              </nav>
            </div>
            <!-- team part end -->

            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Charts
            </a>
            <a class="nav-link" href="tables.html">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Tables
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content" style="margin-left: 20px;">
      <main>

      </main>
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
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/jquery-3.6.3.min.js" crossorigin="anonymous">
  </script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/scripts.js"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/chart-area-demo.js" crossorigin="anonymous">
  </script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/chart-bar-demo.js"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/chart-pie-demo.js"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/datatables-demo.js" crossorigin="anonymous"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/Chart.min.js"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/simple-datatables@latest.js"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/datatables-simple-demo.js"></script>
  <script src="<?= siteUrl() ?>/backend/admin/assets/js/all.js"></script>
</body>

</html>