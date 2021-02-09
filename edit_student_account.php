<?php
require('./databasestud.php');

if (!isset($_SESSION['admin_username'])) {
    header('Location: admin.php');
}

if (isset($_GET['id'])) {

    $query = query("SELECT * FROM studentacc WHERE studentnumber = " . escape_string($_GET['id']) . "");

    confirm($query);

    while ($row = fetch_array($query)) {

        $firstname   =   escape_string($row['first_name']);
        $lastname    =  escape_string($row['lastname']);
        $birthday   =   escape_string($row['birthday']);
        $gender     =   escape_string($row['gender']);
        $email      =   escape_string($row['email']);
        $phone      =   escape_string($row['phone']);
        $course     =   escape_string($row['course']);
    }

    // account::student_update();
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
    <?php book::update() ?>
    <div class="container" style="padding-top: 13rem;">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">firstname</label>
                        <input type="text" class="form-control" value="<?php echo $firstname; ?>" name="firstname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">lastname</label>
                        <input type="text" class="form-control" value="<?php echo $lastname; ?>" name="lastname">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">birthday</label>
                        <input type="text" class="form-control" value="<?php echo $birthday; ?>" name="birthday">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sel1">Gender:</label>
                        <select class="form-control" name="gender">
                            <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="text" class="form-control" value="<?php echo $email; ?>" name="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="number" class="form-control" value="<?php echo $phone; ?>" name="phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">course</label>
                        <input type="text" class="form-control" value="<?php echo $course; ?>" name="course">
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