 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
	require('./databasestud.php');
	
	if(isset($_POST['deletebook'])){
		$deletebookID = $_POST['deletebookID'];
		
		$queryDelete = "DELETE FROM booklist WHERE book_id = $deletebookID";
		$sqlDelete = mysqli_query($connection, $queryDelete);
		
		echo '<script> alert("Succesfuly Deleted!")</script>';
		echo '<script> window.location.href = "/siaG4/booklist.php"</script>';
		}
		else{
		echo '<script> window.location.href = "/siaG4/booklist.php"</script>';	
		}
		
?>