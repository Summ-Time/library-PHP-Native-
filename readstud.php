<?php 
	require('./databasestud.php');
	
	$queryAccounts = "SELECT * FROM studentacc";
	$sqlAccounts = mysqli_query($connection, $queryAccounts);
?>