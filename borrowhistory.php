<?php
require('./readreturn.php');

if (!isset($_SESSION['admin_username'])) {
  header('Location: admin.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Side</title>
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

  <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

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
      <h4>Hi! <?php echo $_SESSION['admin_username'] ?></h4>
    </center>
    <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
    <a href="studentinfo.php"><i class="far fa-user-circle"></i><span>Manage Student Info</span></a>
    <a href="librarianinfo.php"><i class="far fa-user"></i><span>Manage Librarian Info</span></a>
    <a href="borrowerlist.php"><i class="fas fa-user-friends"></i><span>Manage Borrower list</span></a>
    <a href="booklist.php"><i class="fas fa-book-open"></i><span>Manage Book list</span></a>
    <a href="requestbook.php"><i class="fas fa-book-open"></i><span>Manage Request Book</span></a>
    <a href="borrowhistory.php"><i class="fas fa-book-open"></i><span>Borrow History</span></a>
    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
    <br>
    <div class="date">
      <?php
      echo "Date: ";
      echo date("Y-m-d") .   "<br>";

      ?>
      <br>
      <?php
      echo "Time: ";
      ?>
      <div id="clock"></div>
      <script type="text/javascript">
        setInterval(displayclock, 500);

        function displayclock() {
          var time = new Date();
          var hrs = time.getHours();
          var min = time.getMinutes();
          var sec = time.getSeconds();

          if (hrs > 12) {
            hrs = hrs - 12;
          }
          if (hrs == 0) {
            hrs = 12;
          }
          document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec;
        }
      </script>
    </div>
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
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-8">
            <h2>Borrow <b>History</b></h2>
          </div>
          <div class="container" style="padding-top: 20px;">
          <?php display_message(); ?>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="myInput" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>

              <th>Borrowed_ID</th>
              <th>Student_Name</th>
              <th>Book_ID</th>
              <th>Borrowed_Date</th>
              <th>Due_Date</th>
              <th>Penalty</th>
             
              <th>Action</th>
             

            </tr>
          </thead>
          <tbody id="myTable">
            <?php borrowhistory::book_requesthistory(); ?>
          </tbody>
        </table>
        <script>
          $(document).ready(function() {
            $("#myInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
        </script>