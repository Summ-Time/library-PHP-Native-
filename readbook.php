<?php 
	require('./databasestud.php');
	
	$queryAccounts = "SELECT * FROM booklist";
	$sqlAccounts = mysqli_query($connection, $queryAccounts);
?>