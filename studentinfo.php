<?php
require('./readstud.php');

if (!isset($_SESSION['admin_username'])) {
	header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Admin Side</title>
	<link rel="stylesheet" href="css/css5.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<link rel="stylesheet" href="css/csss4.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
			<img src="images/av3.png" class="profile_image" alt="">
			<h4>Admin</h4>
		</center>
		<a href="index.php"><i class="fas fa-desktop"></i><span>Home</span></a>
		<a href="#"><i class="fas fa-key"></i><span>Change Password</span></a>
		<a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>

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
					<div class="col-sm-8">
						<h2>Manage Student <b>Account</b></h2>
					</div>
					<div class="col-sm-4">
						<img src="images/search1.png" class="searchicon"><input type="text" placeholder="Search"><i></i></input>
					</div>
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Student_ID</th>
						<th>FirstName</th>
						<th>Lastname</th>
						<th>Birthday</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>Course</th>
						<th>Username</th>
						<th>Password</th>
						<th>Email</th>
						<th>Action</th>
						<th>Action</th>

					</tr>
				</thead>
				<tbody>
					<?php while ($results = mysqli_fetch_array($sqlAccounts)) { ?>
						<tr>
							<td><?php echo $results['studentnumber'] ?></td>
							<td><?php echo $results['first_name'] ?></td>
							<td><?php echo $results['lastname'] ?></td>
							<td><?php echo $results['birthday'] ?></td>
							<td><?php echo $results['gender'] ?></td>
							<td><?php echo $results['phone'] ?></td>
							<td><?php echo $results['course'] ?></td>
							<td><?php echo $results['username'] ?></td>
							<td><?php echo $results['password'] ?></td>
							<td><?php echo $results['email'] ?></td>
							<td>

								<button type="submit" class="btn btn-success" name="edit" value="edit" data-toggle="modal" data-target="#myModal">Edit</button>

								<input type="hidden" name="editstudentnumber" value="<?php echo $results['studentnumber'] ?>" required />

								<input type="hidden" name="editfirst_name" value="<?php echo $results['first_name'] ?>" required />

								<input type="hidden" name="editlastname" value="<?php echo $results['lastname'] ?>" required />

								<input type="hidden" name="editbirthday" value="<?php echo $results['birthday'] ?>" required />

								<input type="hidden" name="editgender" value="<?php echo $results['gender'] ?>" required />

								<input type="hidden" name="editphone" value="<?php echo $results['phone'] ?>" required />

								<input type="hidden" name="editcourse" value="<?php echo $results['course'] ?>" required />

								<input type="hidden" name="editusername" value="<?php echo $results['username'] ?>" required />

								<input type="hidden" name="editpassword" value="<?php echo $results['password'] ?>" required />

								<input type="hidden" name="editemail" value="<?php echo $results['email'] ?>" required />


								<div class="modal" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">

											<!-- Modal Header -->
											<div class="modal-header">
												<h4 class="modal-title">Update User</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<!-- Modal body -->
											<div class="modal-body">
												<div class="main">
													<form action="/siaG4/updatestud.php" method="post">

														<h3>studentNumber:</h3><input type="text" name="updatestudentnumber" value="<?php echo $editstudentnumber ?>" required />
														<br>

														<h3>Firstname:</h3> <input type="text" name="updatefirst_name" value="<?php echo $editfirst_name ?>" required />
														<br>
														<h3>Lastname: </h3><input type="text" name="updatelastname" value="<?php echo $editlastname ?>" required />
														<br>

														<h3>Birthday: </h3><input type="text" name="updatebirthday" value="<?php echo $editbirthday ?>" required />
														<br>

														<h3>Gender: </h3><input type="text" name="updategender" value="<?php echo $editgender ?>" required />
														<br>

														<h3>Phone: </h3><input type="text" name="updatephone" value="<?php echo $editphone ?>" required />
														<br>

														<h3>Course:</h3> <input type="text" name="updatecourse" value="<?php echo $editcourse ?>" required />
														<br>

														<h3>Username:</h3> <input type="text" name="updateusername" value="<?php echo $editusername ?>" required />
														<br>

														<h3>Password: </h3><input type="text" name="updatepassword" value="<?php echo $editpassword ?>" required />


														<br>

														<h3>Email:</h3> <input type="text" name="email" value="<?php echo  $editemail ?>" required />
														<br>


													</form>

												</div>

												<!-- Modal footer -->
												<div class="modal-footer">
													<button type="submit" class="btn btn-success" name="update" value="update" />Update</button>
													<input type="hidden" name="updateID" />

													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>

											</div>
										</div>
									</div>
								</div>
							<td>
								<form action="/siaG4/deletestud.php" method="post">
									<button type="submit" class="btn btn-danger" name="delete" value="Delete">DELETE</button>
									<input type="hidden" name="deleteID" value="<?php echo $results['studentnumber'] ?>">
								</form>
							</td>
							</td>
						</tr>
					<?php }
					?>
				</tbody>
			</table>

		</div>
	</div>