<?php
 require ('./databasestud.php');
 
 session_start();
 
 if(isset($_POST['login'])){
	 $username = trim($_POST['username']);
	 $password = trim($_POST['password']);
	 
	 
	 if(empty($username) || empty($password)){
		echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Error!","Please fill up the fields","warning");';
        echo '}, 1000);</script>';
	 }
	 else{
		 $queryValidate = "SELECT * FROM adminacc WHERE username = '$username' AND password ='$password'";
		 $sqlValidate = mysqli_query($connection, $queryValidate);
		 
		 if (mysqli_num_rows($sqlValidate) > 0){
			 
			 echo "<script>window.location.href = '/siaG4/index.php'</script>";
		 }
	     else {
		    $_SESSION['invalid'] = 'invalid';
			
		echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Error!","Invalid Username and Password","error");';
        echo '}, 1000);</script>';
	 }
	 }
 }
 
 ?>
<html>
<head>
 <link href = "css/css2.css" rel="stylesheet" type="text/css"/>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- body -->
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
   
   <a href = "student.php"> <h2 class="inactive underlineHover"> Student </h2> </a>

    <a href="Admin.php"> <h2 class="active">Admin</h2>  </a>

 <a href="librarian.php"> <h2 class="inactive underlineHover">Librarian</h2>  </a>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images/av3.png" id="icon"/>
    </div>

    <!-- Login Form -->
     <form action="/siaG4/admin.php" method = "post">
      <input type="text" id="username" class="fadeIn second" name="username" placeholder=" UserName">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
     <input type="submit" class="fadeIn fourth" name="login" value="login"> 
	 
    
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
     
	  <a class="underlineHover" href="#">Forgot Password?</a>
    </div>


    <!-- Remind -->
    <div id = "formFooter">
         Quezon City University
</div>
  </div>
</div>
</body>
</html>