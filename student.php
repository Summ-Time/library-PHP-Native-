<?php
require('./databasestud.php');

$ip = getUserIpAddr();

if (isset($_SESSION['attnum'])) {

  $_SESSION['attnum']++;

  if ($_SESSION['attnum'] > 4) {

    $ipcheck = query("SELECT * FROM attempt_login WHERE ip = '{$ip}'");
    confirm($ipcheck);

    // get data
    while ($row = fetch_array($ipcheck)) {
      $ip = getUserIpAddr();
      $ip   = escape_string($row['ip']);
      $end  = escape_string($row['end']);
    }

    // check if the date
    if (mysqli_num_rows($ipcheck) == 0) {

      $start = date("Y-m-d H:i:s");
      $end = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +1 minutes"));

      $query = query("INSERT INTO attempt_login(ip, start, end)VALUE('$ip', '$start', '$end')");
      confirm($query);
    }

    if (date("Y-m-d H:i:s") >= $end) {
      unset($_SESSION['attnum']);
      $query = query("DELETE FROM attempt_login WHERE ip = '$ip'");
      confirm($query);
      echo $query;
    }
  }
} else {

  $_SESSION['attnum'] = 1;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['login'])) {



    $username = escape_string($_POST['username']);
    $password = escape_string($_POST['password']);

    $query = query("SELECT * FROM studentacc WHERE username = '{$username}' AND password = '{$password}'");

    confirm($query);

    $row = $query->fetch_array(MYSQLI_NUM);

    // login function
    if (mysqli_num_rows($query) == 0) {
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
        if ($_SESSION['attnum'] >= '4') {
          echo '<br>please wait 1 minute <br><br>';
        } else {

          echo '<input type="submit" class="fadeIn fourth" name="login" value="Login">';
        }
        ?>
      </form>
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