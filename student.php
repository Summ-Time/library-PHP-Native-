<?php
require('./databasestud.php');



if ($_SERVER["REQUEST_METHOD"] == "POST"){


if (isset($_POST['login'])) {


  $username = escape_string($_POST['username']);
  $password = escape_string($_POST['password']);

  $query = query("SELECT * FROM studentacc WHERE username = '{$username}' AND password = '{$password}'");

  confirm($query);

  $row = $query->fetch_array(MYSQLI_NUM);

  // login function
  if (mysqli_num_rows($query) == 0) {
    //if the user have 0 result return then will return to login
    echo '<script type="text/javascript"> 
            setTimeout(function () { 
             swal("Error!","Invalid Username and Password","warning") 
            }, 1000);
          </script>';
          $_SESSION['login_attempts'] += 1;
    
  } else {
    // if the result have 1 result then it will login
    $_SESSION['student_id'] = $row[0];
    $_SESSION['student_username'] = $row[1];
    redirect("indexstudent.php");
  }
  if (isset ($_SESSION["locked"])){
    $difference = time() - $_SESSION["locked"];
    if($difference > 10){
      unset($_SESSION["locked"]);
      unset($_SESSION["login_attempts"]);
    } 
  }
}
}
?>
<html>

<head>
  <title>Student Login</title>
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
      <form action="" method="post">
     
        <input type="text" id="username" class="fadeIn second" name="username" placeholder="Username" required>
        <br>
        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
        <br>
        <?php 
          
          if ($_SESSION["login_attempts"] > 3)
          {
              $_SESSION["locked"] = time();
              echo "Please wait for 10 seconds";
          }
          else{
        ?>
     
        <input type="submit" class="fadeIn fourth" name="login" value="Login">
        <?php 
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