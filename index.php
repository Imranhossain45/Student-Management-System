<?php
session_start();
require_once "db.php";
$teacherQuery = "SELECT * FROM teachers limit 3";
$teacherResult = mysqli_query($conn, $teacherQuery);
if (mysqli_num_rows($teacherResult) > 0) {
  $teachers = mysqli_fetch_all($teacherResult, true);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Student Management System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
</head>

<body>
  <!-- navbar start -->
  <section>
    <nav>
      <label class="logo">W-School</label>
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Admission</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="backend/auth/login.php" class="btn btn-success">Login</a></li>
      </ul>
    </nav>
  </section>
  <!-- navbar end -->
  <!-- banner start -->
  <section class="banner_area">
    <div class="banner">
      <label class="banner_text">We Teach Students with Care</label>
      <img class="banner_img" src="img/school_management.jpg" alt="">
    </div>
  </section>
  <!-- banner end -->
  <!-- description start -->
  <section class="description_area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img class="description_img" src="img/school2.jpg" alt="">
        </div>
        <div class="col-lg-8">
          <?php
          if (isset($_SESSION['success'])) {
            printf('<div class="alert alert-success">%s</div>', $_SESSION['success']);
          }
          ?>

          <h1>Welcome to W-School</h1>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet nobis ex maxime deserunt explicabo dolor, voluptatibus debitis voluptas, quibusdam fuga quia at nihil consectetur rerum illum repellat id dignissimos et enim aliquam voluptate repudiandae fugiat error ipsa. Atque corrupti architecto provident earum aperiam? Illo excepturi, provident culpa hic fugit nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos distinctio fugit suscipit, laborum molestiae odio dicta est, assumenda eligendi dolorum impedit consequuntur mollitia placeat labore blanditiis dolore molestias sunt voluptate repellat. Voluptates corrupti rem ut maxime vel inventore officia dolorum libero repellendus odit quasi harum quia blanditiis eaque, nisi enim.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- description end -->
  <!-- teacher section start -->

  <section class="teacher_area">
    <center>
      <h1><u class="text-dark">Our Teachers</u></h1>
    </center>
    <div class="container">
      <div class="row">
        <?php
        foreach ($teachers as $teacher) {
        ?>
          <div class="col-lg-4">
            <div class="row techer_box">
              <img class="teacher_img" src="backend/uploads/teacher/<?= $teacher['photo'] ?>" alt="">
              <p><?= $teacher['teacher_info'] ?></p>
            </div>
          </div>
        <?php
        }
        ?>

        <!-- <div class="col-lg-4">
          <div class="row techer_box">
            <img class="teacher_img" src="img/teacher2.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos quia accusamus non nam ea delectus distinctio, nemo, ab magnam, veritatis debitis odio aperiam similique consequatur explicabo? Rerum nulla ratione qui?</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row techer_box">
            <img class="teacher_img" src="img/teacher3.jpg" alt="">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos quia accusamus non nam ea delectus distinctio, nemo, ab magnam, veritatis debitis odio aperiam similique consequatur explicabo? Rerum nulla ratione qui?</p>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <!-- teacher section end -->
  <!-- course section start -->

  <section class="course_area">
    <center>
      <h1><u class="text-dark">Our Courses</u></h1>
    </center>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="row course_box">
            <img class="course_img" src="img/web.jpg" alt="">
            <h3>Web Development</h3>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row course_box">
            <img class="course_img" src="img/marketing.png" alt="">
            <h3>Digital marketing</h3>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row course_box">
            <img class="course_img" src="img/graphic.jpg" alt="">
            <h3>Graphics Design</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- course section end -->
  <!-- admission-form section start -->
  <section class="admissionForm_area">
    <center>
      <h1>Admission Form</h1>
    </center>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">

          <div class="admission_form">
            <form action="admissionForm.php" method="POST">
              <div class="form-group">
                <b>Name:</b>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                <?php
                if (isset($_SESSION['error']['nameErr'])) {
                  printf('<p class="text-danger">%s</p>', $_SESSION['error']['nameErr']);
                }
                ?>
              </div>
              <div class="form-group">
                <b>Email:</b>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
              </div>
              <div class="form-group">
                <b>Phone:</b>
                <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number">
              </div>
              <div class="form-group">
                <b>Message:</b>
                <textarea name="message" rows="7" class="form-control" placeholder="Enter Your Message"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary mt-2 apply">Apply</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- admission-form section end -->
  <!-- footer section start -->
  <section class="footer_area">
    <footer>
      <h2>&copy; All rights reserved by MD Imran Hossain</h2>
    </footer>
  </section>
  <!-- footer section end -->








  <script src="js/jquery-3.6.3.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"> </script>
</body>

</html>
<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>