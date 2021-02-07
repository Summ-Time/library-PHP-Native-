<?php 
	require('./databasestud.php');
	
	$queryAccounts = "SELECT * FROM librarianacc";
	$sqlAccounts = mysqli_query($connection, $queryAccounts);
?>