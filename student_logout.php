<?php
require('./databasestud.php');

unset($_SESSION['student_username']);
redirect('student.php');
