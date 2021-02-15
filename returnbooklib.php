<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

	$query = query("UPDATE booklist SET quantity = '$quantity+1' WHERE book_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

  	$query = query("DELETE FROM tbl_borrowed WHERE borrowed_id = " . escape_string($_GET['id']) . " ");
	confirm($query);




	set_message("Book Succesfully Return!");
    
    redirect("borrowerlistlib.php");
}

