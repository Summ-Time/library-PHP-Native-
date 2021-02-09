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
  <title>Librarian Side</title>
  <link rel="stylesheet" href="css/css6.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css1.css">
  <link rel="stylesheet" href="css/css5.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/borrowerlist.js"></script>

  <script src="js/fontawesome-pro.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
      <a href="librarian_logout.php" class="logout_btn">Logout</a>
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
      <h4>Hi! <?php echo $_SESSION['librarian_username']?></h4>
      <hr>
    </center>
    <a href="indexlibrarian.php"><i class="fas fa-desktop"></i><span>Home</span></a>
    <a href="studentinfolib.php"><i class="fas fa-user-edit"></i><span>Manage Student Info</span></a>
    <a href="borrowerlistlib.php"><i class="fas fa-user-friends"></i><span>Manage Borrower List</span></a>
    <a href="booklistlib.php"><i class="fas fa-book-open"></i><span>Manage Book List</span></a>
    <a href="#"><i class="fas fa-table"></i><span>Generate Report</span></a>
    <a href="#"><i class="far fa-id-card"></i><span>Create Lib_ID</span></a>
    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
  <br>
  <div class="date">
    <?php
echo "Date: ";
echo date("Y-m-d").   "<br>";

?>
<br>
<?php
echo "Time: ";
?>
<div id="clock"></div>
<script type="text/javascript">
setInterval(displayclock, 500);
function displayclock(){
  var time = new Date();
  var hrs = time.getHours();
  var min = time.getMinutes();
  var sec = time.getSeconds();

  if(hrs > 12){
      hrs =hrs -12;
  }
  if(hrs==0){
    hrs=12;
  }
  document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec;
}
</script>
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

          <a href="bookdetails.php"><img src="images/student.png" width="600" height="400">
          </a>
          <div class="desc">Manage Student Info</div>
        </div>

        <div class="gallery">
          <a href="borrowbooklist.php"><img src="images/borrower.jpg" width="600" height="400">
          </a>
          <div class="desc">Manage Borrower List</div>
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