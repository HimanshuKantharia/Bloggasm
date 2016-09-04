<?php
session_start();	
$username = $_SESSION['username'];
echo $username;
require '../classes/blogControl.php';

$blogger = new blogger();

$blogger_id = $blogger->getId($username);
echo $blogger_id;

	$result = $blogger->bloggerProfile($blogger_id);
	$row = mysqli_fetch_array($result);
	
	$bname = $row['blogger_name'];

	$blastname = $row['blogger_lastname'];
	$bgender = $row['gender'];
	$bcontact = $row['contact'];
	$babout = $row['about'];
?>	

<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../icon.ico" />
	<script src="../bootstrap/js/jquery-2.2.4.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/custom.css" rel="stylesheet">
</head>
<body>
	
	<div>
	<article class="col-sm-9 col-md-12">
			<div class="col-md-6 col-md-offset-3">
			
				<!-- START Registration form -->
				
				<div class="panel panel-form">
					<!-- Form header -->
					<div class="panel-heading">
						<h2 class="title">Edit Your Profile</h2>
						<p>Don't want to edit? <a href="userPage.php">Go Back</a>.</p>
					</div>
					
					<div class="panel-body">

						<form role="form" action="editProfilePage.php" method="post">

							<!-- Name -->
							<div class="form-group">
								<label for="name" class="control-label">Name <span class="required-field">*</span></label>
								<div class="has-feedback">
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $bname;?>" />
						<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>
							
							<!-- LastName -->
							<div class="form-group">
								<label for="lastname" class="control-label">Last name <span class="required-field">*</span></label>
								<div class="has-feedback">
						<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $blastname;?>"/>
						<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>

						
							<!-- Email -->
							<!-- <div class="form-group">
								<label for="email" class="control-label">Email <span class="required-field">*</span></label>
								<div class="has-feedback">
									<input type="email" class="form-control" id="email" />
									<span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>
								</div>
							</div> -->

														
							<!-- Gender -->
							<!-- <div class="row">							
								<div class="col-sm-4 form-group">
									<label for="gender" class="control-label">Gender <span class="required-field">*</span></label>
									<select id="gender">
										<input list="genders" name="gender">
									  		<datalist id="genders">
									    		<option><span class="fa fa-mars"></span>Male</option>
									    		<option><span class="fa fa-icon"></span>Female</option>
									    	</datalist>						
									</select>
								</div>
							</div> -->

							
							<!-- Contact -->
							<div class="form-group">
								<label for="username" class="control-label">Contact <span class="required-field">*</span></label>
								<div class="has-feedback">
						<input type="text" class="form-control" id="lastname" name="contact" value="<?php echo $bcontact;?>"/>
						<span class="fa fa-phone form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>

							<!-- About -->
							<div class="form-group">
								<label for="username" class="control-label">About <span class="required-field">*</span></label>
								<div class="has-feedback">
						<input type="text" class="form-control" id="lastname" name="about" value="<?php echo $babout;?>"/>
						<span class="fa fa-info form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>
						
														
							<!-- Create button -->
							<div class="form-group text-center">
								<button type="submit" id="sbmtbtn" name="sbmtbtn" class="btn btn-success">Submit</button>
							</div>
						</form>
					</div>
					
					
				</div>
				
				<!-- END Registration form -->
			
			</div>
		</article>
	</div>

</body>
</html>