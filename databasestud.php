<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'project';
	
	$connection = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_error()){
		echo "Error!";
		echo "Message:".mysqli_connect_error()."<br>";
		
	}
