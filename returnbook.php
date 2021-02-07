<?php 
	require('./databasestud.php');
	
	if(isset($_POST['return'])){



		$deleteret = $_POST['deleteret'];
        
        $queryUpdate = "UPDATE booklist SET status = 'Available' WHERE ISBN = $deleteret";
        $sqlUpdate = mysqli_query($connection, $queryUpdate);

		$queryDelete = "DELETE FROM tbl_borrowed WHERE ISBN = $deleteret";
		$sqlDelete = mysqli_query($connection, $queryDelete);
		
		echo '<script> alert("Succesfuly Returned and Updated!")</script>';
		echo '<script> window.location.href = "/siaG4/viewreturn.php"</script>';
		}
		else{
		echo '<script> window.location.href = "/siaG4/viewreturn.php"</script>';	
		}
		
?>