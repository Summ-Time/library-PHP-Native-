<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

    $query = query("DELETE FROM booklist WHERE book_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("Book Have Been Deleted!");
    redirect("booklist.php");
}
