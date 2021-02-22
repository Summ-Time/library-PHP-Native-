<?php
require('./databasestud.php');

unset($_SESSION['librarian_username']);
redirect('librarian.php');
