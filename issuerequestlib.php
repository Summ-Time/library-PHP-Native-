<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

	$query = query("UPDATE tbl_borrowed SET request = 'approve' WHERE borrowed_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

   // $query = query("DELETE FROM tbl_borrowed WHERE borrowed_id = " . escape_string($_GET['id']) . " ");
    //confirm($query);

    set_message("Request Have Been Approved!");
    redirect("requestbooklib.php");
}

