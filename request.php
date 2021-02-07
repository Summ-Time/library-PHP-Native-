<?php 
	require('./databasestud.php');
	
	if(isset($_POST['create'])){
		$ISBN = $_POST['ISBN'];
		$studentnumber = $_POST['studentnumber'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $course = $_POST['course'];
		
		
		$queryCreate = "INSERT INTO tbl_request VALUES('$ISBN', '$studentnumber', '$firstname', '$lastname', '$course')";
		$sqlCreate = mysqli_query($connection, $queryCreate);
		
		echo '<script> alert("Succesfuly Requested!")</script>';
        echo '<script> window.location.href = "/siaG4/indexstudent.php"</script>';
       
}
		else{
		echo "error";
		}
		
?>