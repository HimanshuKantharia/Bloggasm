<?php
	require 'classes/blogControl.php';
	$blogger = new blogger();

	

	 	// echo '<script language="javascript">';
	 	// echo 'alert("You have  joined the Community now Login to continue")';
	 	// echo '</script>';
	

	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$about = $_POST['about'];
	$gender = "m";
	echo $name;

	$result = $blogger->checkUser($username,$password);

	$rows = mysqli_num_rows($result);

	if ($rows != 1) {

	 	$blogger->createBlogger($username,$password);
		$bloggerid = $blogger->getMaxBloggerId();
		echo $bloggerid;
		$blogger->createProfile($bloggerid,$name,$lastname,$gender,$contact,$about);
	 	echo "gootcha no one";
		header("location: index.php");
	} else {
		# code...
		echo "gott one";
	$bloggerid = $blogger->getMaxBloggerId();
		echo $bloggerid;
		$blogger->createProfile($bloggerid,$name,$lastname,$gender,$contact,$about);

	}

?>