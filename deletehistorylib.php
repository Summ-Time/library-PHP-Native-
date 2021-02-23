<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

    $query = query("DELETE FROM tbl_borrowedhistory WHERE borrowed_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("History Have Been Deleted!");
    redirect("borrowhistorylib.php");
}

