<?php 
	require('./databasestud.php');
	
	if(isset($_POST['deletelib'])){
		$deletelibID = $_POST['deletelibID'];
		
		$queryDelete = "DELETE FROM librarianacc WHERE library_id = $deletelibID";
		$sqlDelete = mysqli_query($connection, $queryDelete);
		
		echo '<script> alert("Succesfuly Deleted!")</script>';
		echo '<script> window.location.href = "/siaG4/librarianinfo.php"</script>';
		}
		else{
		echo '<script> window.location.href = "/siaG4/librarianinfo.php"</script>';	
		}
		
?>