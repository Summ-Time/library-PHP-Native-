<?php

/*************************************************************************************************/
/******************************************HELPER CODE********************************************/
/*************************************************************************************************/
$upload_directory = "uploads";

// helper functions

function display_image($picture)
{

    global $upload_directory;

    return $upload_directory  . DS . $picture;
}

function last_id()
{

    global $connection;

    return mysqli_insert_id($connection);
}


function set_message($msg)
{

    if (!empty($msg)) {

        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}


function display_message()
{

    if (isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


function redirect($location)
{

    return header("Location: $location ");
}

function query($sql)
{

    global $connection;

    return mysqli_query($connection, $sql);
}


function confirm($result)
{

    global $connection;

    if (!$result) {

        die("QUERY FAILED " . mysqli_error($connection));
    }
}


function escape_string($string)
{

    global $connection;

    return mysqli_real_escape_string($connection, $string);
}



function fetch_array($result)
{
    return mysqli_fetch_array($result);
}


class book
{
    public static function book_list()
    {

        $mainquery = query("SELECT * FROM booklist");
        confirm($mainquery);
        $counter = 1;

        if (mysqli_num_rows($mainquery) == 0) {

            $list_classroom = <<< DELIMITER
            <tr>
                <th colspan="3" class="text-center bg-danger text-white"> No Result </th>
            </tr>
           DELIMITER;
            echo $list_classroom;
        } else {

            while ($row = fetch_array($mainquery)) {
                $product = <<<DELIMETER
                <tr>
                   <td>{$row['book_id']}</td>
                   <td>{$row['ISBN']}</td>
                   <td><a href="studentbookshow.php?id={$row['book_id']}">{$row['title']}</a></td>
                   <td>{$row['author']}</td>
                   <td>{$row['category']}</td>
                   <td>{$row['status']}</td>
                </tr>
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }

    public static function borrow_book()
    {
        if (isset($_POST['submit'])) {
            $user_id = escape_string($_POST['user_id']);
            $book_id = escape_string($_POST['book_id']);
            $due_date = escape_string($_POST['due_date']);
            $borrow_date = date("Y-m-d");
            $request = "padding";

            $query = query("INSERT INTO tbl_borrowed(student_id, book_id, borrowed_date, due_date, request) VALUE ('$user_id', '$book_id', '$borrow_date', '$due_date', '$request')");
            confirm($query);

            set_message('Book Borrowed Please go to the librarian to approve the book');
            redirect('indexstudent.php');
        }
    }

    public static function borrow_history()
    {
        $student_id = $_SESSION['student_id'];
        $query = query("SELECT
        *
      FROM tbl_borrowed
        INNER JOIN booklist
          ON tbl_borrowed.book_id = booklist.book_id
        INNER JOIN studentacc
          ON tbl_borrowed.student_id = studentacc.studentnumber
      WHERE tbl_borrowed.student_id = {$student_id} ");

        confirm($query);

        if (mysqli_num_rows($query) == 0) {
            $list_book_history = <<< DELIMITER
            <tr>
                <th colspan="7" class="text-center bg-red text-white"> No Result </th>
            </tr>
            DELIMITER;
            echo $list_book_history;
        } else {
            while ($row = fetch_array($query)) {
                $list_book_history = <<< DELIMITER
                <tr>
                    <td>{$row['title']}</td>
                    <td>{$row['author']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['request']}</td>
                    <td>{$row['borrowed_date']}</td>
                    <td>{$row['due_date']}</td>
                </tr>
                DELIMITER;
                echo $list_book_history;
            }
        }
    }
}
