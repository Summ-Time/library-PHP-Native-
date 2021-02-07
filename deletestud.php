<?php 
	require('./databasestud.php');
	
	if(isset($_POST['delete'])){
		$deleteID = $_POST['deleteID'];
		
		$queryDelete = "DELETE FROM studentacc WHERE studentnumber = $deleteID";
		$sqlDelete = mysqli_query($connection, $queryDelete);
		
		echo '<script> alert("Succesfuly Deleted!")</script>';
		echo '<script> window.location.href = "/siaG4/studentinfo.php"</script>';
		}
		else{
		echo '<script> window.location.href = "/try/studentinfo.php"</script>';	
		}
		
?>