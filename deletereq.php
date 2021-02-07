<?php 
	require('./databasestud.php');
	
	if(isset($_POST['deletereq'])){
		$deletereq = $_POST['deletereq'];
		
		$queryDelete = "DELETE FROM tbl_request WHERE ISBN = $deletereq";
		$sqlDelete = mysqli_query($connection, $queryDelete);
		
		echo '<script> alert("Succesfuly Deleted!")</script>';
		echo '<script> window.location.href = "/siaG4/requestbook.php"</script>';
		}
		else{
		echo '<script> window.location.href = "/siaG4/requestbook.php"</script>';	
		}
		
?>