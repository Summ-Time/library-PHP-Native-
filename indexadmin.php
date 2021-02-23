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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
      <h4>Hi! <?php echo $_SESSION['admin_username'] ?></h4>
    </center>
    <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
    <a href="studentinfo.php"><i class="far fa-user-circle"></i><span>Manage Student Info</span></a>
    <a href="librarianinfo.php"><i class="far fa-user"></i><span>Manage Librarian Info</span></a>
    <a href="borrowerlist.php"><i class="fas fa-user-friends"></i><span>Manage Borrower list</span></a>
    <a href="booklist.php"><i class="fas fa-book-open"></i><span>Manage Book list</span></a>
    <a href="requestbook.php"><i class="fas fa-book-open"></i><span>Manage Request Book</span></a>
    <a href="index.php"><i class="fas fa-user-circle"></i><span>Generate Report</span></a>
    <a href="borrowhistory.php"><i class="fas fa-book-open"></i><span>Borrow History</span></a>
    <a href="loginhistory.php"><i class="fas fa-user-friends"></i><span>Student Login History</span></a>
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
          <h1><b> DASHBOARD</b></h1>

        </div>
        <a href="studentinfo.php">
          <div class="gallery">


            <div class="desc">
              <p><b>Total Students</b> <i class="fa fa-graduation-cap fa-lg" aria-hidden="true"></i></p> <img src="images/student.png">
              <br>
              <br>
              <div class="moreinfo">
                <h3><b><?php report::studentreport(); ?></b></h3>
                <span>More Info</span>
              </div>
            </div>
          </div>
        </a>
        <a href="booklist.php">
          <div class="gallery">

            <div class="desc">
              <p><b>Total Books</b> <i class="fas fa-book fa-lg"></i></p> <img src="images/bookdetails.png">
              <br>
              <br>
              <div class="moreinfo">
                <h3><b><?php report::bookreport(); ?></b></h3>
                <span>More Info</span>
              </div>
            </div>
          </div>
        </a>
        <a href="borrowerlist.php">
          <div class="gallery">

            <div class="desc">
              <p><b>Borrowers</b> <i class="fa fa-list fa-sm" aria-hidden="true"></i></p> <img src="images/borrower.jpg">
              <br>
              <br>
              <div class="moreinfo">
                <h3><b><?php report::borrowerreport(); ?></b></h3>
                <span>More Info</span>
              </div>
            </div>
          </div>
        </a>

      </div>
    </div>
    <div class="index2">
      <div class="content">


        <button onclick="printDiv('printMe')" class="btn btn-primary
      " style="margin-bottom: 10px;"> Generate Report</button>


      </div>
    </div>
  </div>
  <div style="display:none" id='printMe'>
    <div class="col-sm-8">
      <h2>List of <b> Borrower</b></h2>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Borrowed_ID</th>
          <th>Student_Name</th>
          <th>Book_Title</th>
          <th>Borrowed_Date</th>
          <th>Due_Date</th>
          <th>Request</th>
          <th>Penalty</th>


        </tr>
      </thead>
      <tbody id="myTable">
        <?php book_borrowedreport::bookborrowedreport(); ?>
      </tbody>
    </table>
    <div class="col-sm-8">
      <h2>List of Borrower with <b> Penalties </b></h2>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Borrowed_ID</th>
          <th>Student_Name</th>
          <th>Book_Title</th>
          <th>Borrowed_Date</th>
          <th>Due_Date</th>



          <th>Request</th>
          <th>Penalty</th>


        </tr>
      </thead>
      <tbody id="myTable">
        <?php book_borrowedreportpenalty::bookborrowedreportpenalty(); ?>
      </tbody>
    </table>
    <div class="col-sm-8">
      <h2>Borrower <b> History</b></h2>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Borrowed_ID</th>
          <th>Student_Name</th>
          <th>Book_Title</th>
          <th>Borrowed_Date</th>
          <th>Due_Date</th>
          <th>Penalty</th>


        </tr>
      </thead>
      <tbody id="myTable">
        <?php book_requesthistoryreport::book_requesthistory_report(); ?>
      </tbody>
    </table>
    <div class="col-sm-8">
      <h2>List of <b> Student</b></h2>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Student_ID</th>
          <th>FirstName</th>
          <th>Lastname</th>
          <th>Birthday</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Course</th>
          <th>Username</th>
          <th>Password</th>
          <th>Email</th>


        </tr>
      </thead>
      <tbody id="myTable">
        <?php studentaccreport::studentacc_listreport(); ?>
      </tbody>
    </table>
    <div class="col-sm-8">
      <h2>List of <b> Books</b></h2>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Book_ID</th>
          <th>ISBN</th>
          <th>Title</th>
          <th>Author</th>
          <th>Category</th>
          <th>Section</th>
          <th>Status</th>
          <th>Quantity</th>


        </tr>
      </thead>
      <tbody id="myTable">
        <?php book_listreport::booklistreport(); ?>
      </tbody>
    </table>
    <div class="col-sm-8">
      <h2>Student Login/Logout <b> History</b></h2>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Loginhistory_id</th>
          <th>student_id</th>
          <th>time_login</th>
          <th>time_logout</th>



        </tr>
      </thead>
      <tbody id="myTable">
        <?php loginhistorystud::login_historystud(); ?>
      </tbody>
    </table>
  </div>
  <script>
    function printDiv(printMe) {
      var printContents = document.getElementById(printMe).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

    }
  </script>
  </div>
  </div>
</body>

</html>