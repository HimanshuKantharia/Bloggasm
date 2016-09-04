<?php
		require 'classes/blogControl.php';
		session_start();
		session_destroy();
		
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
<!-- 	<script src="materialize/js/materialize.min.js"></script>
 -->	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- 	<link rel="stylesheet" href="materialize/css/materialize.min.css">
 -->	<link rel="stylesheet" href="bootstrap/css/font-awesome/css/font-awesome.min.css">
		<link href="custom.css" rel="stylesheet">


</head>

<body>

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
						<li><a href="MU-Material\index.html">About Me</a></li>
						<li><a href="#contactus">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>


<div class="container">
  
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
       
    <div class="modal-content">
       
        <div class="modal-body">
          
	          
<div class="container">
  	<h3>Login or Register here</h3>
	<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
			
		<form method="post" action="login.php" name="loginForm" class="form-label-left input_mask">
		
		<div class="form-group has-feedback">
			<label class="control-label" for="usrn" >Username <span class="required">*</span></label>
			<input type="text" name="lusername" id="usrn" required="required" placeholder="username" class="form-control has-feedback-left">
			<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
		</div>
			
		<div class="form-group has-feedback">
			<label class="coltrol-label" for="pswd">Password <span class="required">*</span> </label>		
			<input type="password" name="lpassword" id="pswd" required="required" placeholder="password" class="form-control has-feedback-left">
			<span class="fa fa-user form-control-feedback " aria-hidden="true"></span>
		</div>
				
		<div class="form-group">
			<button type="submit" name="sbmtbutton" id="sbmt" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Submit</button>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="reset" class="btn btn-danger">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;
		</div>		

		<h5>Still not having an account, <a href="registerForm.php">Register here.</a></h5>

		</form>

		</div>

	<!-- 
	<div id="register" class="tab-pane fade">
		<h3>Register</h3>
			
		<form method="post" action="register.php" name="registerForm" class="form-label-right input_mask">
		
		
		<div class="form-group has-feedback">
			<label class="control-label" for="new_usrn">Username <span class="required">*</span></label>
			<input type="text" name="new_username" id="new_usrn" required="required" placeholder="username" class="form-control has-feedback-left">
			<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
		</div>		
				
		
		<div class="form-group has-feedback">
			<label class="control-label" for="new_pswd">Password <span class="required">*</span> </label>
			<input type="password" name="new_password" id="new_pswd" required="required" placeholder="password" class="form-control has-feedback-left">
			<span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
		</div>		
		
		<div>
			<button type="submit" id="rgst"  name="regbutton" class="btn btn-success">Register</button>&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
				
			</form>
	</div> -->

        <div class="modal-footer">
          <button type="button" class=" close" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>



<div>
	<?php
	
	$blogger = new blogger();



		$connect = new connect();
		$blog = new blog();
		$imageThings = new imageThings();

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
			$blog_id = $row['blog_id'];
			$imageThings->displayimage($blog_id);
			echo "</div";
			echo "<br><br><br>";
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
				<form action="mailto:kanthariahimanshu@gmail.com" method = "post" class="form-horizontal">
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


