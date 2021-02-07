<? 

    session_start(); 

    // initializing variables

    $studentnumber = "";
    $email = "";

    $errors = array();


    // connecting to database

    $db = mysqli_connect('localhost','root','','project') or die("could not connect to database");

//register students

$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
$birthday = mysqli_real_escape_string($db, $_POST['birthday']);
$gender = mysqli_real_escape_string($db, $_POST['gender']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$studentnumber = mysqli_real_escape_string($db, $_POST['studentnumber']);
$course = mysqli_real_escape_string($db, $_POST['course']);
$password_1= mysqli_real_escape_string($db, $_POST['password_1']);
$password_2= mysqli_real_escape_string($db, $_POST['password_2']);


//form validation
if (empty($firstname)) {array_push($errors, "First name is required");}
if (empty($lastname)) {array_push($errors, "Last name is required"); }
if (empty($birthday)) {array_push($errors, "Birthday is required");}
if (empty($gender)) {array_push($errors, "Gender is required") ;}
if (empty($email)) {array_push($errors, "email is required") ;}
if (empty($phone)) {array_push($errors, "Phone Number is required") ;}
if (empty($studentnumber)) { array_push($errors, "Student Number is required") ;}
if (empty($course)) { array_push($errors, "Course is required") ;}
if ($password_1 != $password_2) {array_push($errors, "Password do not match" ) ;}

//check db for existing student with same student number

$user_check_query = "SELECT *FROM user WHERE '$username' or email = '$email' LIMIT 1";

$results =  mysqli_query($db,  $user_check_query);
$user = mysql_fetch_assoc($results);

if ($user){
     if ($user['studentnumber' === $studentnumber]) { array_push($errors, "Student number already exist");}

     if ($user['email' === $email]) { array_push($errors, "email already exist");}    
}

 // Register the user if  no error
  
     if(count($errors) == 0) {

        $password= md5($password_1); // password enrcyption to bro 

        $query = "INSERT INTO user(firstname, lastname, birthday, gender, 
        email, phone, studentnumber, course, password) VALUES ('$firstname', '$lastname', '$birthday, '$birthday', '$gender', '$email', '$phone', '$studentnumber', '$course', '$password')";
     

     mysqli_query($db, $query);
     
        $_SESSION['studentnumber'] = $studentnumber;
        $_SESSION['success'] = "you are now logged in";
        header('location: index.php');
        
    }
 ?>