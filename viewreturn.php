<?php 
	require('./readreturn.php');
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Side</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css1.css">
  <link rel="stylesheet" href="css/css5.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/borrowerlist.js"></script>

  <script src="js/fontawesome-pro.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>QCU <span>LIBRARY</span></h3>
      </div>
      <div class="right_area">
        <a href="student.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
	  <br>
	  <br>
	  <br>
        <img src="images/student.png" class="profile_image" alt="">
        <h4>Student</h4>
      </center>
      <a href="indexstudent.php"><i class="fas fa-desktop"></i><span>Home</span></a>
      <a href="#"><i class="fas fa-key"></i><span>Change Password</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
      <div class="date">
    <?php
echo "Date: ";
echo date("Y-m-d").   "<br>";

?>
<br>
<?php
echo "Time: ";
?>
<div id="clock"></div>
<script type="text/javascript">
setInterval(displayclock, 500);
function displayclock(){
  var time = new Date();
  var hrs = time.getHours();
  var min = time.getMinutes();
  var sec = time.getSeconds();

  if(hrs > 12){
      hrs =hrs -12;
  }
  if(hrs==0){
    hrs=12;
  }
  document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec;
}
</script>
</div>
  </div>
    </div>
	
    <!--sidebar end-->
    <br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
  <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Book<b> Borrowed</b></h2></div>
                    <div class="container" style="padding-top: 13rem;">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search">
      <div class="input-group-append">
        <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </div>
        </div>
                </div>
            </div>
           
      
             <table class="table table-bordered">
                <thead>
                    <tr>
                      
                        <th>Borrowed_ID</th>
                        <th>Student_ID</th>
					            	<th>Book_ID</th>
						            <th>Borrowed_Date</th>
						            <th>Due_Date</th>
                      
                        
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody>
				<?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
                    <tr>
                        
                        <td><?php echo $results['borrowed_id']?></td>
                       <td><?php echo $results['student_id']?></td>
						<td><?php echo $results['book_id']?></td>
						<td><?php echo $results['borrowed_date']?></td>
						<td><?php echo $results['due_date']?></td>
            
          
            <td>
           
            <form action="/siaG4/returnbook.php" method="post">
                        <button type="submit" class="btn btn-success" name="request" value="request" data-toggle="modal" data-target="#myModal">Return Book</button>
					
					 
                     <div class="modal" id="myModal">
                     <div class="modal-dialog">
                     <div class="modal-content">

      <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Return A Book</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>

      <!-- Modal body -->
						  <div class="modal-body">
							<div class="main">
					<form action="/siaG4/returnbook.php" method="post">
					

          <h3>ISBN:</h3><input type="text" name="ISBN" value="<?php echo $results ['ISBN']?>" required/>
					<br>
					<h3>Studentnumber:</h3><input type="text" name="studentnumber"  required/>
					<br>
					<h3>Firstname:<h3> <input type="text" name="firstname" value="<?php echo $results ['firstname']?>" required/>
					<br>
					<h3>Lastname: </h3><input type="text" name="lastname" value="<?php echo $results ['lastname']?>"   required/>
					<br>
					<h3>Course: </h3><input type="text" name="course" value="<?php echo $results ['course']?>"   required/>
					<br>
                  
                    
					</form>
          </div>

<!-- Modal footer -->
<div class="modal-footer">
<button type="submit"  class="btn btn-success" name="return" value="return">Return</button>
<input type="hidden" name="deleteret" value="<?php echo $results ['ISBN']?>">

<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</td>
                   
						</tr>
						   <?php }
				?>
						</tbody>
						</table>
			<div class="buttonstudent">
            <a href="indexstudent.php"><button type="button" class="btn btn-info">View Book List</button></a>
            
			</div>
			</div>
    </div>
	
	
	