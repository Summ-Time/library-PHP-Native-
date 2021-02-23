<?php
require('./databasestud.php');

$time_logout = date('Y-m-d H:i:s');
$time_login = $_SESSION['time_login'];
$student_id = $_SESSION['student_id'];

$query = "UPDATE tbl_loginhistory SET ";
$query .= "time_logout  =   '{$time_logout}'";
$query .= " WHERE time_login = '" . escape_string($time_login);
$query .= "' AND student_id = " . escape_string($student_id);

$udpate = query($query);
confirm($udpate);

session_destroy();
redirect('student.php');
