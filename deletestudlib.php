<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

    $query = query("DELETE FROM studentacc WHERE studentnumber = " . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("Student Have Been Deleted!");
    redirect("studentinfolib.php");
}

