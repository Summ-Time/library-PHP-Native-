<?php 
	require('./databasestud.php');
	
	if(isset($_POST['create'])){
		$ISBN = $_POST['ISBN'];
		$studentnumber = $_POST['studentnumber'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
    
        $course = $_POST['course'];
        $setdate = $_POSY['setdate'];
        $setduedate = $_POSY['setduedate'];
		
		
		$queryCreate = "INSERT INTO tbl_borrowed VALUES('$ISBN', '$studentnumber', '$firstname', '$lastname', '$course', '$setdate', '$setduedate')";
		$sqlCreate = mysqli_query($connection, $queryCreate);
		
		echo '<script> alert("Succesfuly Issued!")</script>';
        echo '<script> window.location.href = "/siaG4/requestbook.php"</script>';
        
        $queryDelete = "DELETE FROM tbl_request WHERE ISBN = $ISBN";
        $sqlDelete = mysqli_query($connection, $queryDelete);
        
        $queryUpdate = "UPDATE booklist SET status = 'Unavailable' WHERE ISBN = $ISBN";
        $sqlUpdate = mysqli_query($connection, $queryUpdate);
		}
		else{
		echo "error";
		}
		
?>