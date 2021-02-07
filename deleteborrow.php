<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
	require('./databasestud.php');
	
	if(isset($_POST['delete'])){
		$deleteID = $_POST['deleteID'];
		
		$queryDelete = "DELETE FROM tbl_borrowed WHERE ISBN = $deleteID";
        $sqlDelete = mysqli_query($connection, $queryDelete);

        $queryUpdate = "UPDATE booklist SET status = 'Available' WHERE ISBN = $deleteID";
        $sqlUpdate = mysqli_query($connection, $queryUpdate);
		 
		echo '<script> alert("Succesfuly Updated and Deleted!")</script>';
		echo '<script> window.location.href = "/siaG4/Borrowerlist.php"</script>';
		}
		else{
		echo '<script> window.location.href = "/siaG4/Borrowerlist.php"</script>';	
		}
		
?>