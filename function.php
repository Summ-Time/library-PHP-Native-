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



// function redirect($location, $sec=0)
// {
//     if (!headers_sent())
//     {
//         header( "refresh: $sec;url=$location" ); 
//     }
//     elseif (headers_sent())
//     {
//         echo '<noscript>';
//         echo '<meta http-equiv="refresh" content="'.$sec.';url='.$location.'" />';
//         echo '</noscript>';
//     }
//     else
//     {
//         echo '<script type="text/javascript">';
//         echo 'window.location.href="'.$location.'";';
//         echo '</script>';
//     }
// }



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
    public function book_list()
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
}
