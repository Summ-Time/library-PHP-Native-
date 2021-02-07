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
                        <h2><b>Penalties</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <img src="images/search1.png" class="searchicon"><input type="text" placeholder="Search"><i></i></input>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>

                <tbody>
                    <tr>
                        <th>Stud_ID</th>
                        <th>Name</th>
                        <th>Book_ID</th>
                        <th>Title</th>
                        <th>Duedate</th>
                        <th>Penalty</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                <tbody>
                    <tr>
                        <td>18-1104</td>
                        <td>Jake</td>
                        <td>00001</td>
                        <td>JAVA</td>
                        <td>1/17/2020</td>
                        <td>5.00</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <td>18-1105</td>
                        <td>Mark</td>
                        <td>00002</td>
                        <td>JAVA</td>
                        <td>1/18/2020</td>
                        <td>3.00</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>

                        </td>
                    </tr>
                    <tr>
                        <td>18-1107</td>
                        <td>Jomarie</td>
                        <td>00003</td>
                        <td>JAVA</td>
                        <td>1/19/2020</td>
                        <td>2.00</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>

                        </td>
                    </tr>
                </tbody>

            </table>
            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i>Add New</button>
        </div>
    </div>