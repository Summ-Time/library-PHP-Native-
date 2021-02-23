<?php
require('./databasestud.php');
$loginhistory_id = escape_string($_SESSION['student_id']);
$time = date('Y-d-m H:i:s');
$query = query("UPDATE tbl_loginhistory SET time_logout = now() WHERE student_id = '$loginhistory_id' ");
    confirm($query);
unset($_SESSION['student_username']);
redirect('student.php');
