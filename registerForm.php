<!-- <?php
	// require 'classes/blogControl.php';
	// $blogger = new blogger();

	// $newusername = $_POST['new_username'];
	// $newpassword = $_POST['new_password'];

	// $result = $blogger->checkUser($newusername,$newpassword);

	// $rows = mysqli_num_rows($result);

	// if ($rows != 1) {

	// 	$blogger->createBlogger($newusername,$newpassword);
	// 	echo "You have  joined the Community now Login to continue<br>";
	// 	echo '<script language="javascript">';
	// 	echo 'alert("You have  joined the Community now Login to continue")';
	// 	echo '</script>';

	// 			//header("location: index.php");
	// }
?> -->

<!DOCTYPE html>
<html>
	<head>
		<title>Registration page</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="icon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="bootstrap/js/jquery-2.2.4.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="materialize/css/materialize.min.css">
		<link rel="stylesheet" href="bootstrap/css/font-awesome/css/font-awesome.min.css">
		<link href="custom.css" rel="stylesheet">
	</head>
	<body>
	
	<div>
	<article class="col-sm-9 col-md-12">
			<div class="col-md-6 col-md-offset-3">
			
				<!-- START Registration form -->
				
				<div class="panel panel-form">
					<!-- Form header -->
					<div class="panel-heading">
						<h2 class="title">Registration</h2>
						<p>Already have an account? <a href="index.php">Sign in</a>.</p>
					</div>
					
					<div class="panel-body">

						<form role="form" action="registerPage.php" method="post">

							<!-- Name -->
							<div class="form-group">
								<label for="name" class="control-label">Name <span class="required-field">*</span></label>
								<div class="has-feedback">
									<input type="text" class="form-control" id="name" name="name" />
									<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>
							
							<!-- LastName -->
							<div class="form-group">
								<label for="lastname" class="control-label">Last name <span class="required-field">*</span></label>
								<div class="has-feedback">
									<input type="text" class="form-control" id="lastname" name="lastname" />
									<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>

							<!-- UserName -->
							<div class="form-group">
								<label for="username" class="control-label">User name <span class="required-field">*</span></label>
								<div class="has-feedback">
									<input type="text" class="form-control" id="username" name="username" />
									<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>

							<!-- Password -->
							<div class="form-group">
								<label for="password" class="control-label">Password <span class="required-field">*</span></label>
								<div class="has-feedback">
									<input type="password" class="form-control" id="password" name="password" />
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
									<input type="text" class="form-control" id="lastname" name="contact" />
									<span class="fa fa-phone form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>

							<!-- About -->
							<div class="form-group">
								<label for="username" class="control-label">About <span class="required-field">*</span></label>
								<div class="has-feedback">
									<input type="text" class="form-control" id="lastname" name="about" />
									<span class="fa fa-info form-control-feedback" aria-hidden="true"></span>
								</div>
							</div>
						
							<!-- Agree static text -->
							<div class="form-group">
								<p class="form-control-static">
									Do you agree to the <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a>,
									and terms incorporated therein?
								</p>
							</div>
							
							<!-- Create button -->
							<div class="form-group text-center">
								<button type="submit" id="sbmtbtn" name="sbmtbtn" class="btn btn-success">Agree and Create Account</button>
							</div>
						</form>
					</div>
					
					<!-- Form footer -->
					<div class="panel-footer">
						<span class="required-field">*</span> - required field
					</div>
				</div>
				
				<!-- END Registration form -->
			
			</div>
		</article>
	</div>
	</body>
</html>