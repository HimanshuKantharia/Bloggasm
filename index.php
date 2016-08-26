<?php
		require 'classes/blogControl.php';
		$blogger = new blogger();


//********LOGIN*****


	if (!empty($_POST['lusername']) && !empty($_POST['lpassword'])  ) {

		$logusername = $_POST['lusername'];
		$logpassword = $_POST['lpassword'];

		// $username = stripslashes($username);
  //   	$password = stripslashes($password);
  //   	$username = $mysqli->real_escape_string($username);
  //   	$password = $mysqli->real_escape_string($password);

		if ($logusername == "admin" && $logpassword == "admin" ) {

			echo '<script language="javascript">';
				echo 'alert("Admin is called")';
				echo '</script>';
			
			header("location: admin/admin.php");
			
		}
		else {
			$result = $blogger->checkUser($logusername,$logpassword);

			$rows = mysqli_num_rows($result);

			if ($rows == 1) {

			 	session_start();
		 		
		 		$blogger->login($logusername);	
		 			
		 		header("location: user/userPage.php");

		 	} else { 
		 		echo '<script language="javascript">';
				echo 'alert("User does not exist")';
				echo '</script>';
				}
		}

	} else {
		// echo '<script language="javascript">';
		// echo 'alert("Username OR Password cannot be empty")';
		// echo '</script>';
				//echo "Username OR Password cannot be empty<br>";
	}

//*******Registeration******
	

	
   if (!empty($_POST['new_username']) && !empty($_POST['new_password']) ) {
		
		$newusername = $_POST['new_username'];
		$newpassword = $_POST['new_password'];

		$result = $blogger->checkUser($newusername,$newpassword);
	
		$rows = mysqli_num_rows($result);

		if ($rows != 1) {
			//echo date("y-m-d");
			$blogger->createBlogger($newusername,$newpassword);
			//echo "You have  joined the Community now Login to continue<br>";
			echo '<script language="javascript">';
			echo 'alert("You have  joined the Community now Login to continue")';
		    echo '</script>';

			//header("location: index.php");
		}
		
	} else {
		// echo '<script language="javascript">';
		// echo 'alert("Username OR Password cannot be empty")';
		// echo '</script>';
		//echo "User Already Exist. Login to Continue Or Choose Another Username.<br>";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Bloggasm</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="icon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="bootstrap/js/jquery-2.2.4.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap/css/font-awesome/css/font-awesome.min.css">

</head>

<body>
<!-- ------------------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a href="#" class="navbar-brand">Bloggasm</a>
					
				</div>

				<div class="collapse navbar-collapse" id="navbar-collapse">
				<a href="" class="btn btn-info navbar-btn navbar-right" data-toggle="modal" data-target="#myModal">Login/Register</a>
					<ul class="nav navbar-nav">
						<!-- <li><a href="#feedback">Feedback</a></li>
						<li><a href="#gallery">Gallery</a></li>
						<li><a href="#features">Features</a></li> -->
						<li><a href="#aboutme">About Me</a></li>
						<li><a href="#contactus">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>


<h1><br><br>blob...admin....strip</h1>

<div class="container">
  
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
       
    <div class="modal-content">
       
        <div class="modal-body">
          
	          
<div class="container">
  <h3>Login or Register here</h3>
 <button type="button" class="close" data-dismiss="modal">&times;</button>
  <ul class="nav nav-tabs">
    <li class="active"><a class="signin-tab" data-toggle="tab" href="#login">Login</a></li>
    <li><a class="signup-tab"data-toggle="tab" href="#register">Register</a></li>
  </ul>
  <br>
</div>

<div class="tab-content">
	<div id="Login" class="tab-pane fade in active">
		<h3>Login</h3>
			<form method="post" action="index.php" name="loginForm">
				<label>Username: </label>
				<input type="text" name="lusername" id="usrn"><br>
				<label>Password: </label>
				<input type="password" name="lpassword" id="pswd"><br>
				<button type="submit" id="sbmt" class="btn bt-login">Submit</button>
			</form>
	</div>
	<div id="register" class="tab-pane fade">
		<h3>Register</h3>
			<form method="post" action="index.php" name="registerForm">
				<label>Enter Username: </label>
				<input type="text" name="new_username" id="new_usrn"><br>
				<label>Password: </label>
				<input type="password" name="new_password" id="new_pswd"><br>
				<button type="submit" id="rgst"  class="btn bt-login">Register</button>
			</form>
	</div>
</div>

        </div>

        <div class="modal-footer">
          <button type="button" class=" close" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- ------------------------------------------------------------------------------------------------------------- -->
<div>
<!-- <form method="post" action="index.php" name="loginForm">
	<label>Username: </label>
	<input type="text" name="username" id="usrn"><br>
	<label>Password: </label>
	<input type="password" name="password" id="pswd"><br>
	<button type="submit" id="sbmt">Submit</button>
</form>

<form method="post" action="index.php" name="registerForm">
	<label>Enter Username: </label>
	<input type="text" name="new_username" id="new_usrn"><br>
	<label>Password: </label>
	<input type="password" name="new_password" id="new_pswd"><br>
	<button type="submit" id="rgst">Register</button>
</form>
</div> -->
<br>
<div>
	<?php
	
	//require 'classes/dbcontrol.php';
		$connect = new connect();
		$blog = new blog();
		$query = 'SELECT blogger_id,blogger_username,blog_id,blog_title,blog_category,blog_desc,creation_date,blog_is_active FROM blog_master NATURAL JOIN blogger_info order by creation_date desc  ';
		$result = $connect->executeQuery($query);

		if (empty($result)) {
			echo "Nobody has written any blog yet. Be the first to write.";
		} else {
			// while ($blogs = $result->fetch_assoc()) {
			// 	$blog->displayBlogs($blogs['blog_id']);
			// }
echo "<div class = \"container\">";

			while($row = mysqli_fetch_array($result)){  
if($row['blog_is_active'] == "Y"){
			
			echo "<div class = \"jumbotron\">";
			
			//echo "Blogger ID :" . $row['blogger_id'] . "<br>";
			echo "<blockquote>";
			echo "<p>";
				echo "<form method=\"post\" action=\"authorPage.php\">";
				echo "Author :: " . "<label class=\"text-capitalize\">" . $row['blogger_username'] . "</label>  " ;
				echo "<input type = \"submit\" class = \"btn btn-primary\" value=\"View Profile\">";
				echo "<input type=\"hidden\" value=";
				echo "\"". $row['blogger_id'] ."\"";
				echo "name = \"bid\">";
				echo "</form>";
			echo "</p>";
			echo "</blockquote>";

			echo "<label>" . "Blog Title : " . "</label>" . $row['blog_title'] . "<br>"; 
			echo "<label>" . "Blog Category : "  . "</label>" . $row['blog_category'] . "<br>";
			echo "<label>" . "Blog Description : " . "</label>" . $row['blog_desc'] .  "<br>"; 
			echo "<label>" . "Blog Creation Date : " . "</label>" . $row['creation_date']  . "<br><br>";
			
			echo "</div";
		}
echo "</div";
			}
		}
	
	?>
</div>

<div class="container">
	<section>
		<div class="page-header" id="contactus">
			<h2>Contact us. <small>If you want More</small></h2>
		</div>

		<div class="row">
			<div class="col-lg-4">
				<p>Send us message or contact at below address</p>

				<address>
					<strong>Himanshu Kantharia</strong></br>
					202,Royal Plaza Appt,</br>
					Mahalaxmi mandir road,</br>
					Adajan,</br>
					Surat.</br>
					Mob.No. : 8511357339
				</address>
			</div>

			<div class="col-lg-8">
				<form action="index.php" method = "post" class="form-horizontal">
					<div class="form-group">
						<label for="user-name" class="col-lg-2 control-label">Name</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="cusername" placeholder="Enter your Name">
						</div>
					</div>

					<div class="form-group">
						<label for="user-email" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="cuseremail" placeholder="Enter your Email Address">
						</div>
					</div>


					<div class="form-group">
						<label for="user-message" class="col-lg-2 control-label">Your Message</label>
						<div class="col-lg-10">
							<textarea name="cusermessage" name="user-message" class="form-control" cols="20" rows="5" placeholder="Enter your Message"> 										
							</textarea> 
						</div>
					</div>

					<div class="form-group">
					
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					
					</div>
					
					<?php
					
					if (!empty($_POST['cusername']) && !empty($_POST['cuseremail']) && !empty($_POST['cusermessage'])) {
					
					echo "<div class=\"alert alert-success alert-dismissible fade in\" role=\"alert\">";
  					echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">";
    				echo "<span aria-hidden=\"true\">&times;</span>";
  					echo "</button>";
  					echo "<strong>Message sent Succesfully!</strong> We will Contact you soon.";
					echo "</div>";
					}
					?>

				</form>
			</div>
		</div>
	</section>
</div>
</div>
<div class="text-center">
	<a href="mailto:kanthariahimanshu@gmail.com" target="_blank"><span class="fa fa-envelope fa-lg"></span>&nbsp;</a>
	<a href="https://twitter.com/AvengerHimanshu" target="_blank"><span class="fa fa-twitter-square fa-lg"></span>&nbsp;</a>
	<a href="https://www.facebook.com/himanshu.kantharia" target="_blank"><span class="fa fa-facebook-square fa-lg"></span>&nbsp;</a>
	<a href="https://www.linkedin.com/in/himanshu-kantharia-8821a9115?trk=hp-identity-photo" target="_blank"><span class="fa fa-linkedin-square fa-lg"></span></a>
</div>

 <p class="text-center"><strong>&copy;</strong> <small>Copyright @2016</small></p>

</body>

</html>


