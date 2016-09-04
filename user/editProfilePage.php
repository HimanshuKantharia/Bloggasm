<?php

	require '../classes/blogControl.php';
	$blogger = new blogger();
	$connect = new connect();
	
	session_start();	
	$username = $_SESSION['username'];
	echo $username;

	$blogger_id = $blogger->getId($username);
	echo $blogger_id;

		
	$bname = $_POST['name'];
	$blastname = $_POST['lastname'];
	//$bgender = $_POST['gender'];
	$bcontact = $_POST['contact'];
	$babout = $_POST['about'];

	$query = "UPDATE profile SET blogger_name = '".$bname."', blogger_lastname = '".$blastname."', contact = '".$bcontact."', about = '".$babout."' WHERE blogger_id = '".$blogger_id."'";
	$result = $connect->executeQuery($query);

	header ("location: userPage.php");
?>	