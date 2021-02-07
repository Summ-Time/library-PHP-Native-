<?php
require('./databasestud.php');

?>

<?php

if (!isset($_SESSION['student_username'])) {
  header('Location: student.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student Side</title>
  <!-- Custom CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css1.css">
  <link rel="stylesheet" href="css/css5.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/borrowerlist.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check" style="float:left">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <h3>QCU <span>LIBRARY</span></h3>
    </div>
    <div class="right_area">
      <a href="student_logout.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--sidebar start-->
  <div class="sidebar">
    <center>
      <br>
      <br>
      <br>
      <img src="images/student.png" class="profile_image" alt="">
      <h4>Student</h4>
    </center>
    <a href="indexstudent.php"><i class="fas fa-desktop"></i><span>Home</span></a>
    <a href="#"><i class="fas fa-key"></i><span>Change Password</span></a>
    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>

  </div>
  <!--sidebar end-->

  <div class="container" style="padding-top: 13rem;">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search">
      <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Book_ID</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>

          </tr>
        </thead>
        <tbody>
          <?php book::book_list(); ?>
        </tbody>
      </table>
      <a href="viewreturn.php"><button type="button" class="btn btn-info" name="return">View Return Books</button></a>
    </div>
  </div>

</body>

</html>