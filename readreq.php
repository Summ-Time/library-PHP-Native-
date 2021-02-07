<?php 
	require('./databasestud.php');
	
	$queryAccounts = "SELECT * FROM tbl_request";
	$sqlAccounts = mysqli_query($connection, $queryAccounts);
?>