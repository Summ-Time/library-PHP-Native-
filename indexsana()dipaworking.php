<?php
 session_start();
    if (isset ($_SESSION['studentnumber'])) {

    $_SESSION['msg'] = "you must log in to view this page";

    header("location: student.php");


    }

    if (issset($_GET['logout'])){

        session_destroy();
        unset($_SESSION['studentnumber']);
        header ("location: student.php");
    }

?>

<!DOCTYPE html>
<html>
 <head>
 <title>library qtqt </title> </head>
<body>
         <h1>homepage   </h1>
<?php
if(isset($_SESSION['successs'])):
?>

<div>
<h3> <?php 

    echo $_SESSION['success'];
    unset($_SESSION['success']);
?>
</h3>
</div>

<?php endif ?>


<button><a href="index.php?logout='1'"> </a> </button>





 </body>
</hmtl>
