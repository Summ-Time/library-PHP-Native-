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


///////////////////////////////////////////////////////////////////////////////////////////////////////////STUDENT
class book
{
    public static function update()
    {
        if (isset($_POST['submit'])) {
            $title      =       escape_string($_POST['title']);
            $author     =       escape_string($_POST['author']);
            $category   =       escape_string($_POST['category']);
            $status     =       escape_string($_POST['status']);
            $section     =      escape_string($_POST['section']);
            $quantity   =       escape_string($_POST['quantity']);

            $ISBN       =       escape_string($_POST['isbn']);

            $query = "UPDATE booklist SET ";
            $query .= "title     =       '{$title}',";
            $query .= "author    =       '{$author}',";
            $query .= "category  =       '{$category}',";
            $query .= "status    =       '{$status}',";
            $query .= "section    =       '{$section}',";
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
                <th colspan="12" class="text-center bg-danger text-white"> No Result </th>
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////ADMIN
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
                    <td class="text-center">
                    <a href="edit_libacc.php?id={$row['library_id']}" class="btn btn-success">Edit</a>
                        </td>
                        <td class="text-center">
                             <button Onclick="deleteclick{$row['library_id']}()" id="delete" class="btn btn-danger">Delete</button>          
                     </td>
                     <!-- Delete Function -->
                     <script>
                     function deleteclick{$row['library_id']}() {
                         Swal.fire({
                             title: 'Are you sure?',
                             text: "Do you want to delete this!",
                             icon: 'warning',
                             showCancelButton: true,
                             confirmButtonColor: '#3085d6',
                             cancelButtonColor: '#d33',
                             confirmButtonText: 'Yes, delete it!'
                           }).then((result) => {
                                 if(result.value){
                                     window.location.href="deletelib.php?id={$row['library_id']}";
                                 }
                           })
                        }
                     </script>
                </tr>
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }
}
class libaccedit
{
    public static function libacc_edit()
    {
        if (isset($_POST['submit'])) {

            $name     =       escape_string($_POST['name']);
            $username   =       escape_string($_POST['username']);
            $password     =       escape_string($_POST['password']);


            $query = "UPDATE librarianacc SET ";

            $query .= "name    =       '{$name}',";
            $query .= "username  =       '{$username}',";
            $query .= "password    =       '{$password}',";



            $query .= "WHERE library_id =" . escape_string($_GET['id']);

            $udpate = query($query);
            confirm($udpate);

            set_message('Book Updated!');
            redirect("librarianinfo.php");
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
                <th colspan="12" class="text-center bg-danger text-white"> No Result </th>
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
                   <td>{$row['email']}</td>

                   <td class="text-center">
                   <a href="edit_student_account.php?id={$row['studentnumber']}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                        <button Onclick="deleteclick{$row['studentnumber']}()" id="delete" class="btn btn-danger">Delete</button>          

                   </td>
                </tr>

                <!-- Delete Function -->
                <script>
                function deleteclick{$row['studentnumber']}() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to delete this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                            if(result.value){
                                window.location.href="deletestud.php?id={$row['studentnumber']}";
                            }
                      })
                   }
                </script>
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
                  

                   <td class="text-center">
                        <a href="edit_book.php?id={$row['book_id']}" class="btn btn-success">Edit</a>
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
                        <input type="button" class="btn btn-primary" name="Issuebook" value="Issue book">
                        </td>
                        <td class="text-center">
                        <input type="button" class="btn btn-success" name="Returnbook" value="Return book">
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
class addlib
{
    public static function add_lib()
    {
        if (isset($_POST['submit'])) {

            $library_id =   escape_string($_POST['library_id']);
            $name       =         escape_string($_POST['name']);
            $username   =     escape_string($_POST['username']);
            $password   =     escape_string($_POST['password']);


            $query = query("INSERT INTO librarianacc (library_id, name, username, password) VALUES ('$library_id', '$name', '$username', '$password')");
            confirm($query);
            set_message('Librarian Account was added');
            redirect('librarianinfo.php');
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////LIBRARIAN

class book_listlib
{
    public static function booklistlib()
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
                  

                   <td class="text-center">
                        <a href="edit_book.php?id={$row['book_id']}" class="btn btn-success">Edit</a>
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
                                window.location.href="deletebooklib.php?id={$row['book_id']}";
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

class studentacclib
{

    public static function studentacc_listlib()
    {

        $mainquery = query("SELECT * FROM studentacc");
        confirm($mainquery);
        $counter = 1;

        if (mysqli_num_rows($mainquery) == 0) {

            $list_classroom = <<< DELIMITER
            <tr>
                <th colspan="12" class="text-center bg-danger text-white"> No Result </th>
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

                   <td class="text-center">
                        <input type="button" class="btn btn-success" name="edit" value="Edit">
                        </td>
                        <td>
                        <button Onclick="deleteclick{$row['studentnumber']}()" id="delete" class="btn btn-danger">Delete</button>          

                   </td>
                </tr>

                <!-- Delete Function -->
                <script>
                function deleteclick{$row['studentnumber']}() {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to delete this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                            if(result.value){
                                window.location.href="deletestudlib.php?id={$row['studentnumber']}";
                            }
                      })
                   }
                </script>
                </tr>
                DELIMETER;
                $counter++;
                echo $product;
            }
        }
    }
}
class book_borrowedlib
{

    public static function bookborrowedlib()
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
                        <input type="button" class="btn btn-primary" name="Issuebook" value="Issue book">
                        </td>
                        <td class="text-center">
                        <input type="button" class="btn btn-success" name="Returnbook" value="Return book">
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
                                window.location.href="deletereqlib.php?id={$row['borrowed_id']}";
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


class account
{
    public static function student_update()
    {
        if (isset($_POST['submit'])) {

            $firstname      =       escape_string($_POST['firstname']);
            $lastname       =       escape_string($_POST['lastname']);
            $birthday       =       escape_string($_POST['birthday']);
            $gender         =       escape_string($_POST['gender']);
            $email          =       escape_string($_POST['email']);
            $phone          =       escape_string($_POST['phone']);
            $course         =       escape_string($_POST['course']);


            $query = "UPDATE studentacc SET ";
            $query .= "first_name    =       '{$firstname}',";
            $query .= "lastname     =       '{$lastname}',";
            $query .= "birthday     =       '{$birthday}',";
            $query .= "gender       =       '{$gender}',";
            $query .= "email        =       '{$email}',";
            $query .= "phone        =       '{$phone}',";
            $query .= "course       =       '{$course}'";
            $query .= "WHERE studentnumber =" . escape_string($_GET['id']);

            $udpate = query($query);
            confirm($udpate);

            set_message('Student Updated!');
            redirect("studentinfo.php");
        }
    }
    public static function librarian_update()
    {
        if (isset($_POST['submit'])) {

            $name           =       escape_string($_POST['name']);
            $username       =       escape_string($_POST['username']);
            $password       =       escape_string($_POST['password']);


            $query = "UPDATE studentacc SET ";
            $query .= "name         =       '{$name}',";
            $query .= "username     =       '{$username}',";
            $query .= "password     =       '{$password}'";
            $query .= "WHERE library_di =" . escape_string($_GET['id']);

            $udpate = query($query);
            confirm($udpate);

            set_message('Librarian Updated!');
            redirect("librarianinfo.php");
        }
    }
}
