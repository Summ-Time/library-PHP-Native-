<?php
require('./databasestud.php');

if (isset($_POST['login'])) {

  $username = escape_string($_POST['username']);
  $password = escape_string($_POST['password']);

  $query = query("SELECT * FROM studentacc WHERE username = '{$username}' AND password = '{$password}'");

  confirm($query);

  $row = $query->fetch_array(MYSQLI_NUM);

  // login function
  if (mysqli_num_rows($query) == 0) {
    // if the user have 0 result return then will return to login
    echo '<script type="text/javascript"> 
            setTimeout(function () { 
              swal("Error!","Invalid Username and Password","error") 
            }, 1000);
          </script>';
  } else {
    // if the result have 1 result then it will login
    $_SESSION['student_id'] = $row[0];
    $_SESSION['student_username'] = $row[1];
    redirect("indexstudent.php");
  }
}
?>
<html>

<head>
  <link href="css/css2.css" rel="stylesheet" type="text/css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
      <form action="/library-PHP-Native-/student.php" method="post">
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required>
        <br>
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
        <input type="submit" class="fadeIn fourth" name="login" value="Login">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="register.php">Not yet Registered?</a>
        <br>
        <br>
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>
  </body>

</html>