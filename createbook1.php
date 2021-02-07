<?php 
	require('./databasestud.php');
	
	if(isset($_POST['create'])){
		$book_id = $_POST['book_id'];
		$ISBN = $_POST['ISBN'];
		$title = $_POST['title'];
		$author = $_POST['author'];
		$category = $_POST['category'];
		$status = $_POST['status'];
		
		
		
		$queryCreate = "INSERT INTO booklist VALUES (null, '$ISBN', '$title', '$author', '$category', '$status')";
		$sqlCreate = mysqli_query($connection, $queryCreate);
		
		echo '<script> alert("Succesfuly Created!")</script>';
		echo '<script> window.location.href = "/siaG4/bookdetails.php"</script>';
		}
		else{
		echo "error";
		}
		
?>