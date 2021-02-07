<?php
require('./databasestud.php');


if (!isset($_SESSION['student_username'])) {
    header('Location: student.php');
}
?>

<?php

if (isset($_GET['id'])) {
    $query = query("SELECT * FROM booklist WHERE book_id = $_GET[id]");

    confirm($query);

    while ($row = fetch_array($query)) {

        $title           =           escape_string($row['title']);
        $author          =           escape_string($row['author']);
        $category        =           escape_string($row['category']);
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Student | <?php echo $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css4.css">
    <link rel="stylesheet" href="css/css5.css">
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

    <div class="container" style="padding-top: 13rem;">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="https://dummyimage.com/300x500/000/fff" alt="">
            </div>
            <div class="col-md-6">
                <h1><?php echo $title ?></h1>
                <hr>
                <p><?php echo $author ?></p>
                <p><?php echo $category ?></p>
            </div>
        </div>
        <hr>
        <form action="" method="post">
            <input type="text" name="user_id" value="<?php echo $_SESSION['student_id'] ?>" hidden>
            <input type="text" name="book_id" value="<?php echo $book_id ?>" hidden>
            <button type="submit" name="borrow" class="btn btn-primary">Borrow</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>