<?php
session_start();	
$username = $_SESSION['username'];
echo $username;
require '../classes/blogControl.php';
$blogger = new blogger();

$blogger_id = $blogger->getId($username);
echo $blogger_id;

$query = "SELECT blogger_name,blogger_lastname,gender,contact,about FROM profile WHERE blogger_id = '" . $blogger_id . "' ";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../icon.ico" />
	<script src="../bootstrap/js/jquery-2.2.4.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/custom.css" rel="stylesheet">	
</head>
<body>
	<a type="button" class="btn" href="userpage.php">BACK</a>
	<a type="button" class="btn btn-primary" href="editProfile.php"><span class="glyphicon glyphicon-pencil"> </span>Edit</a>

</body>
</html>
