<?php
require('./databasestud.php');

if (!isset($_SESSION['admin_username'])) {
    header('Location: admin.php');
}

if (isset($_GET['id'])) {

    $query = query("SELECT * FROM librarianacc WHERE library_id = " . escape_string($_GET['id']) . "");

    confirm($query);

    while ($row = fetch_array($query)) {

        $name           =       escape_string($row['name']);
        $username       =       escape_string($row['username']);
        $password       =       escape_string($row['password']);
    }

    account::librarain_update();
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
            <img src="images/av3.png" class="profile_image" alt="">
            <h4>Hi! <?php echo $_SESSION['admin_username'] ?></h4>
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
    <div class="container" style="padding-top: 13rem;">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">name</label>
                        <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" class="form-control" value="<?php echo $password; ?>" name="password">
                    </div>
                </div>
            </div>
            <hr>
            <a href="booklist.php" class="btn btn-info">Back</a>

            <button class="btn btn-primary float-right" name="submit">Update</button>
        </form>
    </div>

</body>

</html>