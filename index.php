<?php
require('./databasestud.php');

?>

<?php

if (!isset($_SESSION['admin_username'])) {
  header('Location: admin.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Side</title>
  <link rel="stylesheet" href="css/css1.css">
  <link rel="stylesheet" href="css/css9.css">
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
      <a href="admin_logout.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--sidebar start-->
  <div class="sidebar">
    <center>
      <br>
      <br>
      <br>
      <img src="images/av3.png" class="profile_image" alt="">
      <h4>Hi! <?php echo $_SESSION['admin_username']?></h4>
    </center>
    <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
    <a href="studentinfo.php"><i class="far fa-user-circle"></i><span>Manage Student Info</span></a>
    <a href="librarianinfo.php"><i class="far fa-user"></i><span>Manage Librarian Info</span></a>
    <a href="borrowerlist.php"><i class="fas fa-user-friends"></i><span>Manage Borrower list</span></a>
    <a href="booklist.php"><i class="fas fa-book-open"></i><span>Manage Book list</span></a>
    <a href="requestbook.php"><i class="fas fa-book-open"></i><span>Manage Request Book</span></a>
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
  </div>

  <!--sidebar end-->
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
      <div class="col-sm-8">
            <h1><b> SUMMARY</b></h1>
          </div>
        <div class="gallery">
       
           
            <div class="desc"><p><b>Total Students</b>
            
            <i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i></p>
            <br>
            
            <br>
            
            <?php report::studentreport(); ?>
            <br>
            <br>
            <br>
            <br>
            <hr>
            <a href="studentinfo.php"><span>More Info</span></a>
        </div>
        </div>

        <div class="gallery">

          <div class="desc"><p><b>Total Books</b>
          
         
            
          <i class="fas fa-book fa-lg"></i></p>
          <br>
            
            <br>
          <?php report::bookreport(); ?>
          <br>
            <br>
            <br>
            <br>
            <hr>
            <a href="booklist.php"><span>More Info</span></a>
        </div>

        </div>

        <div class="gallery">

        <div class="desc"><p><b>Borrowers   </b>
        <i class="fa fa-list fa-sm" aria-hidden="true"></i></p>
        <br>
            <br>
            
        <?php report::borrowerreport(); ?>
        <br>
            <br>
            <br>
            <br>
            <hr>
            <a href="borrowerlist.php"><span>More Info</span></a>
        </div>
          </div>

      </div>
    </div>
    <div class="index2">
      <div class="content">
       
     
      </div>
    </div>
  </div>
</body>

</html>
