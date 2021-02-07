<?php
require('./databasestud.php');

if (!isset($_SESSION['librarian_username'])) {
  header('Location: librarian.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Side</title>
  <link rel="stylesheet" href="css/css6.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <h3>QCU <span>LIBRARY</span></h3>
    </div>
    <div class="right_area">
      <a href="student.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--sidebar start-->
  <div class="sidebar">
    <center>
      <br>
      <br>
      <br>
      <img src="images/librarian.png" class="profile_image" alt="">
      <h4>Librarian</h4>
    </center>
    <a href="indexlibrarian.php"><i class="fas fa-desktop"></i><span>Home</span></a>
    <a href="#"><i class="fas fa-key"></i><span>Change Password</span></a>
    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>

  </div>

  <!--sidebar end-->
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="index3">
    <div class="index1">
      <div class="content">
        <div class="gallery">

          <a href="bookdetails.php"><img src="images/bookdetails.png" width="600" height="400">
          </a>
          <div class="desc">Book Details</div>
        </div>

        <div class="gallery">
          <a href="borrowbooklist.php"><img src="images/borrower.jpg" width="600" height="400">
          </a>
          <div class="desc">Borrow Booklist</div>
        </div>

        <div class="gallery">
          <a href="#"><img src="images/report.png" width="600" height="400">
          </a>
          <div class="desc">Monthly Report</div>
        </div>
      </div>
    </div>
    <div class="index2">
      <div class="content">
        <div class="gallery">

          <a href="penalties1.php"><img src="images/penalty.jpg" width="600" height="400">
          </a>
          <div class="desc">Penalties</div>
        </div>

        <div class="gallery">
          <a href="student.php"><img src="images/libid.png" width="600" height="400">
          </a>
          <div class="desc">Create Library_ID</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>