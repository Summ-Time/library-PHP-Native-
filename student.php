<?php
require('./databasestud.php');

// $_SESSION['locked'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['login'])) {

    $_SESSION['attnum'] = 1; // Reset counter

    $username = escape_string($_POST['username']);
    $password = escape_string($_POST['password']);

    $query = query("SELECT * FROM studentacc WHERE username = '{$username}' AND password = '{$password}'");

    confirm($query);

    $row = $query->fetch_array(MYSQLI_NUM);

    // login function
    if (mysqli_num_rows($query) == 0) {

      //if the user have 0 result return then will return to login
      // echo '<script type="text/javascript"> 
      //       setTimeout(function () { 
      //        swal("Error!","Invalid Username and Password","warning") 
      //       }, 1000);
      //     </script>';


    } else {

      // if the result have 1 result then it will login
      $student_id = $_SESSION['student_id'] = $row[0];
      $_SESSION['student_username'] = $row[1];
      $date_login = $_SESSION['time_login'] = date('Y-m-d H:i:s');

      $query = query("INSERT INTO tbl_loginhistory(student_id, time_login)VALUE('$student_id','$date_login')");

      redirect("indexstudent.php");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link href="css/css2.css" rel="stylesheet" type="text/css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
  <!-- body -->
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> Student </h2>
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/savatar.png" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="" method="post">

        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required>
        <br>
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
        <br>
        <input type="hidden" name="add" value="+">
        <?php
        if ('1' == '1') {
          echo 'please wait 1 minute';
          echo '<input type="submit" class="fadeIn fourth" name="login" value="Login" disabled>';
          echo '<input type="submit" class="fadeIn fourth" name="login" value="Login">';
        } else {

          echo '<input type="submit" class="fadeIn fourth" name="login" value="Login">';
        }
        ?>
      </form>
      <?php $_SESSION['attnum']++ ?>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
      <div id="formFooter">
        Quezon City University
      </div>

    </div>
  </div>
</body>

</html>