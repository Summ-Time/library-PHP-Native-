<?php
//this will start the connection of the db
ob_start();

//this is will start the session
session_start();

//this connectio to the host 
defined("DB_HOST") ? NULL : define("DB_HOST", "localhost");

defined("DB_USER") ? NULL : define("DB_USER", "root");

defined("DB_PASS") ? NULL : define("DB_PASS", "");

defined("DB_NAME") ? NULL : define("DB_NAME", "project");

//this will check the connection of the host 
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_error()) {
	echo "Error!";
	echo "Message:" . mysqli_connect_error() . "<br>";
}

require_once('function.php');
