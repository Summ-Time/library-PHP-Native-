<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

    $query = query("DELETE FROM tbl_borrowed WHERE borrowed_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("Request Have Been Deleted!");
    redirect("requestbook.php");
}
