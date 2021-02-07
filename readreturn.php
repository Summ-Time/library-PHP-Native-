<?php 
	require('./databasestud.php');
	
	$queryAccounts = "SELECT * FROM tbl_borrowed";
	$sqlAccounts = mysqli_query($connection, $queryAccounts);
?>