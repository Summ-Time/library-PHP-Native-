<?php require_once("databasestud.php");


if (isset($_GET['id'])) {

    $query = query("DELETE FROM librarianacc WHERE library_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("Librarian Have Been Deleted!");
    redirect("librarianinfo.php");
}
