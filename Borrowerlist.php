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
      <img src="images/av3.png" class="profile_image" alt="">
      <h4>Admin</h4>
    </center>
    <a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
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
            <h2>Book<b> Borrowed</b></h2>
          </div>
          <div class="col-sm-4">
            <img src="images/search1.png" class="searchicon"><input type="text" placeholder="Search"><i></i></input>
          </div>
        </div>
      </div>


      <table class="table table-bordered">
        <thead>
          <tr>

            <th>ISBN</th>
            <th>Studentnumber</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Course</th>
            <th>Date_Borrowed</th>
            <th>Due_Date</th>
            <th>Action</th>
            <th>Action</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          <?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
            <tr>

              <td><?php echo $results['ISBN'] ?></td>
              <td><?php echo $results['studentnumber'] ?></td>
              <td><?php echo $results['firstname'] ?></td>
              <td><?php echo $results['lastname'] ?></td>
              <td><?php echo $results['course'] ?></td>
              <td><?php echo $results['date_borrowed'] ?></td>
              <td><?php echo $results['due_date'] ?></td>
              <td>


                <form action="/siaG4/returnbook.php" method="post">
                  <button type="submit" class="btn btn-primary" name="request" value="request" data-toggle="modal" data-target="#myModal">Return Book</button>


                  <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Return A Book</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <div class="main">
                            <form action="/siaG4/returnbook.php" method="post">


                              <h3>ISBN:</h3><input type="text" name="ISBN" value="<?php echo $results['ISBN'] ?>" required />
                              <br>
                              <h3>Studentnumber:</h3><input type="text" name="studentnumber" required />
                              <br>
                              <h3>Firstname:<h3> <input type="text" name="firstname" value="<?php echo $results['firstname'] ?>" required />
                                  <br>
                                  <h3>Lastname: </h3><input type="text" name="lastname" value="<?php echo $results['lastname'] ?>" required />
                                  <br>
                                  <h3>Course: </h3><input type="text" name="course" value="<?php echo $results['course'] ?>" required />
                                  <br>


                            </form>
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="return" value="return">Return</button>
                            <input type="hidden" name="deleteret" value="<?php echo $results['ISBN'] ?>">

                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>
              </td>
              <td>
                <button type="submit" class="btn btn-success" name="edit" value="edit" data-toggle="modal" data-target="#myModal1">Edit</button>
              </td>
              <td>
                <form action="/siaG4/deleteborrow.php" method="post">
                  <button type="submit" class="btn btn-danger" name="delete" value="delete">DELETE</button>
                  <input type="hidden" name="deleteID" value="<?php echo $results['ISBN'] ?>">
                </form>
              </td>

            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>