<?php
require('./databasestud.php');

session_destroy();
redirect('student.php');
