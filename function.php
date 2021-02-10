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
        echo '<div class="alert alert-info">' . '<button type="button" class="close" data-dismiss="alert">&times;</button>' . $_SESSION['message'] . '</div>';
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


//student
class book
{
    public static function update()
    {
        if (isset($_POST['submit'])) {
            $title      =       escape_string($_POST['title']);
            $author     =       escape_string($_POST['author']);
            $category   =       escape_string($_POST['category']);
            $status     =       escape_string($_POST['status']);
            $quantity   =       escape_string($_POST['quantity']);
            $ISBN       =       escape_string($_POST['isbn']);

            $query = "UPDATE booklist SET ";
            $query .= "title     =       '{$title}',";
            $query .= "author    =       '{$author}',";
            $query .= "category  =       '{$category}',";
            $query .= "status    =       '{$status}',";
            $query .= "quantity  =       '{$quantity}',";
            $query .= "ISBN      =       '{$ISBN}'";
            $query .= "WHERE book_id =" . escape_string($_GET['id']);

            $udpate = query($query);
            confirm($udpate);

            set_message('Book Updated!');
            redirect("booklist.php");
        }
    }
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
                   <td>{$row['section']}</td>
                   <td>{$row['status']}</td>
                   <td>{$row['quantity']}</td>
                   <td>{$row['available_qty']}</td>
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
            $available_qty = escape_string($_POST['available_qty']);


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
                    <td>{$row['section']}</td>
                    <td>{$row['request']}</td>
                    <td>{$row['borrowed_date']}</td>
                    <td>{$row['due_date']}</td>
                </tr>
                DELIMITER;
                echo $list_book_history;
            }
        }
    }

    public static function book_create()
    {
        if (isset($_POST['submit'])) {

            $title = escape_string($_POST['title']);

            $query  = query("SELECT * FROM booklist WHERE title = '$title'");
            confirm($query);

            if (mysqli_num_rows($query) == 1) {

                set_message('Book Already Exists');
            } else {
                $title = escape_string($_POST['title']);
                $author = escape_string($_POST['author']);
                $category = escape_string($_POST['category']);
                $status = escape_string($_POST['status']);
                $quantity = escape_string($_POST['quantity']);
                $section = escape_string($_POST['section']);
                $ISBN = escape_string($_POST['ISBN']);

                $query = query("INSERT INTO booklist(title, author, category, status, quantity, section, ISBN) VALUES ('$title', '$author', '$category', '$status', '$quantity', '$section', '$ISBN')");
                confirm($query);
                set_message('Book Add to the list');
                redirect('booklist.php');
            }
        }
    }
}
//admin
class librarianacc
{
    public static function librarianacc_list()
    {

        $mainquery = query("SELECT * FROM librarianacc");
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
                   <td>{$row['library_id']}</td>
                   <td>{$row['name']}</td>
                   <td>{$row['username']}</td>
                   <td>{$row['password']}</td>
                   <td>
                   <input type="button" class="btn btn-success" name="edit" value="Edit">
                   </td>
                   <td>
                   <input type="button" class="btn btn-danger" name="Delete" value=Delete>
                   </td>
                </tr>
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }
}
class studentacc
{

    public static function studentacc_list()
    {

        $mainquery = query("SELECT * FROM studentacc");
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
                   <td>{$row['studentnumber']}</td>
                   <td>{$row['first_name']}</td>
                   <td>{$row['lastname']}</td>
                   <td>{$row['birthday']}</td>
                   <td>{$row['gender']}</td>
                   <td>{$row['phone']}</td>
                   <td>{$row['course']}</td>
                   <td>{$row['username']}</td>
                   <td>{$row['password']}</td>
                   <td>{$row['email']}</td>
                   <td>
                   <input type="button" class="btn btn-success" name="edit" value="Edit">
                   </td>
                   <td>
                   <input type="button" class="btn btn-danger" name="Delete" value=Delete>
                   </td>
                </tr>
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }
}

class book_list
{
    public static function booklist()
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
                   <td>{$row['title']}</td>
                   <td>{$row['author']}</td>
                   <td>{$row['category']}</td>
                   <td>{$row['section']}</td>
                   <td>{$row['status']}</td>
                   <td>{$row['quantity']}</td>
                   <td>{$row['available_qty']}</td>

                   <td class="text-center">
                        <input type="button" class="btn btn-success" name="edit" value="Edit">
                        </td>
                        <td>
                        <button Onclick="deleteclick{$row['book_id']}()" id="delete" class="btn btn-danger">Delete</button>          

                   </td>
                </tr>

                <!-- Delete Function -->
                <script>
                function deleteclick{$row['book_id']}() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                            if(result.value){
                                window.location.href="delete_book.php?id={$row['book_id']}";
                            }
                      })
                   }
                </script>
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }
}

class book_borrowed
{

    public static function bookborrowed()
    {

        $mainquery = query("SELECT * FROM tbl_borrowed");
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
                   <td>{$row['borrowed_id']}</td>
                   <td>{$row['student_id']}</td>
                   <td>{$row['book_id']}</td>
                   <td>{$row['borrowed_date']}</td>
                   <td>{$row['due_date']}</td>
                   <td>{$row['request']}</td>
                   
                   <td class="text-center">
                        <input type="button" class="btn btn-success" name="edit" value="Edit">
                        </td>
                        <td>
                        <button Onclick="deleteclick{$row['borrowed_id']}()" id="delete" class="btn btn-danger">Delete</button>          

                   </td>
                </tr>

                <!-- Delete Function -->
                <script>
                function deleteclick{$row['borrowed_id']}() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                            if(result.value){
                                window.location.href="deletereq.php?id={$row['borrowed_id']}";
                            }
                      })
                   }
                </script>
               
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }
}
class addstuds
{
    public static function addstud()
    {
        if (isset($_POST['create'])) {
            $user_id = escape_string($_POST['studentnumber']);
            $firstname = escape_string($_POST['first_name']);
            $lastname = escape_string($_POST['lastname']);
            $birthday = escape_string($_POST['birthday']);
            $gender = escape_string($_POST['gender']);
            $phone = escape_string($_POST['phone']);
            $course = escape_string($_POST['course']);
            $username = escape_string($_POST['username']);
            $password = escape_string($_POST['password']);
            $email = escape_string($_POST['email']);


            $query = query("INSERT INTO studentacc(studentnumber, first_name, lastname, birthday, gender, phone , course , username , password , email ) 
            VALUE ('$user_id', '$firstname', '$lastname', '$birthday', '$gender', '$phone', '$course', '$username', '$password', '$email')");
            confirm($query);




            set_message('Succesfully Created!');
            redirect('studentinfo.php');
        }
    }
}
