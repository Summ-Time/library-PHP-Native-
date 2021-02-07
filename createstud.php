<?php 
	require('./databasestud.php');
	
	if(isset($_POST['create'])){
		$studentnumber = $_POST['studentnumber'];
		$first_name = $_POST['first_name'];
		$lastname = $_POST['lastname'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$course = $_POST['course'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$queryCreate = "INSERT INTO studentacc VALUES('$studentnumber', '$first_name', '$lastname', '$birthday', '$gender', '$email', '$phone', '$course', '$username',    '$password')";
		$sqlCreate = mysqli_query($connection, $queryCreate);
		
		echo '<script> alert("Succesfuly Created!")</script>';
		echo '<script> window.location.href = "/siaG4/register.php"</script>';
		}
		else{
		echo "error";
		}
		
?>