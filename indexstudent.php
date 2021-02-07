<?php
require('./readbook.php');
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
  <link rel="stylesheet" href="css/css5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="css/csss4.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/borrowerlist.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
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
      <img src="images/student.png" class="profile_image" alt="">
      <h4>Student</h4>
    </center>
    <a href="indexstudent.php"><i class="fas fa-desktop"></i><span>Home</span></a>
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
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-8">
            <h2>Book<b> List</b></h2>
          </div>
          <div class="col-sm-4">
            <img src="images/search1.png" class="searchicon"><input type="text" placeholder="Search"><i></i></input>
          </div>
        </div>
      </div>


      <table class="table table-bordered">
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
          <?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
            <tr>
              <td><?php echo $results['book_id'] ?></td>
              <td><?php echo $results['ISBN'] ?></td>
              <td><?php echo $results['title'] ?></td>
              <td><?php echo $results['author'] ?></td>
              <td><?php echo $results['category'] ?></td>
              <td><?php echo $results['status'] ?></td>

            </tr>
          <?php }
          ?>
        </tbody>
      </table>

      <div class="buttonstudent">

        <a href="viewreturn.php"><button type="button" class="btn btn-info" name="return">View Return Books</button></a>
        <br>
        <br>
        <form action="/siaG4/request.php" method="post">
          <button type="submit" class="btn btn-success" name="request" value="request" data-toggle="modal" data-target="#myModal">Request Book</button>


          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Request Book</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <div class="main">
                    <form action="/siaG4/request.php" method="post">


                      <h3>ISBN:</h3><input type="text" name="ISBN" required />
                      <br>
                      <h3>Studentnumber:</h3><input type="text" name="studentnumber" required />
                      <br>
                      <h3>Firstname:<h3> <input type="text" name="firstname" required />
                          <br>
                          <h3>Lastname: </h3><input type="text" name="lastname" required />
                          <br>
                          <h3>Course: </h3><input type="text" name="course" required />
                          <br>

                    </form>

                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="create" value="create">Request</button>
                    <input type="hidden" name="create" />

                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <td>
        </form>
      </div>
    </div>
  </div>