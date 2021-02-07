<?php 
	require('./databasestud.php');
	
	if(isset($_POST['edit'])){
		$editstudentnumber = $_POST['editstudentnumber'];
		$editfirst_name = $_POST['editfirst_name'];
		$editlastname = $_POST['editlastname'];
		$editbirthday = $_POST['editbirthday'];
		$editgender = $_POST['editgender'];
		$editphone = $_POST['editphone'];
		$editcourse = $_POST['editcourse'];
		$editusername = $_POST['editusername'];
		$editpassword = $_POST['editpassword'];
		$editemail = $_POST['editemail'];
		
		
		
	}
	if(isset($_POST['update'])){
		$updatestudentnumber = $_POST['updatestudentnumber'];
		$updatefirst_name = $_POST['updatefirst_name'];
		$updatelastname = $_POST['updatelastname'];
		$updatebirthday = $_POST['updatebirthday'];
		$updategender = $_POST['updategender'];
		$updatephone = $_POST['updatephone'];
		$updatecourse = $_POST['updatecourse'];
		$updateusername = $_POST['updateusername'];
		$updatepassword = $_POST['updatepassword'];
		$updateemail = $_POST['updateemail'];
		
		$queryUpdate = "UPDATE studentacc SET lastname = '$updatelastname', first_name = '$updatefirst_name', birthday= '$updatebirthday'
, gender = '$updategender', phone = '$updatephone', course = '$updatecourse', username = '$updateusername', password = '$updatepassword', email = '$updateemail'		WHERE studentnumber = $updateID";

		$sqlUpdate = mysqli_query($connection, $queryUpdate);
		echo '<script> alert("Succesfuly Updated!")</script>';
		echo '<script> window.location.href = "/siaG4/studentinfo.php"</script>';
		}
		else{
		'<script> window.location.href = "/siaG4/studentinfo.php"</script>';
		}
		
	
	
?>
