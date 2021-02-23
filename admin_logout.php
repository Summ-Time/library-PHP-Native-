<?php
require('./databasestud.php');

unset($_SESSION['admin_username']);
redirect('admin.php');
