<?php 
	require('./databasestud.php');
	
	if(isset($_POST['create'])){
		$library_id = $_POST['library_id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		$queryCreate = "INSERT INTO librarianacc VALUES('$library_id', '$name', '$username', '$password')";
		$sqlCreate = mysqli_query($connection, $queryCreate);
		
		echo '<script> alert("Succesfuly Created!")</script>';
		echo '<script> window.location.href = "/siaG4/librarianinfo.php"</script>';
		}
		else{
		echo "error";
		}
		
?>