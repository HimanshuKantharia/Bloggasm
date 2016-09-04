<?php
	require '../classes/blogControl.php';

	session_start();
	$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome <?php echo $username; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../icon.ico" />
	<script src="../bootstrap/js/jquery-2.2.4.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/custom.css" rel="stylesheet">	
</head>
<body>
<h2 class="text-capitalize">Welcome, <?php echo $username; ?></h2>
<a type="button" class="btn btn-primary" href="editProfile.php"><span class="glyphicon glyphicon-user"></span> Edit Profile</a>

<h4><a class="btn btn-danger" href="logout.php">Log Out</a></h4>

<div>
	<?php
	
	$blogger = new blogger();
	$bloggerId = $blogger->getId($username);
	$blogger_is_active = $blogger->getActivity($bloggerId);

	$blog = new blog();
	$result = $blog->displayBlogs($bloggerId);

	$imageThings = new imageThings();
	//row = mysqli_fetch_array($result);

		

	if ($blogger_is_active == 'N') {
		echo "<h4>You are currently <strong>Inactivated</strong> by admin.</h4><br>";
	} else {
		echo "<div>";
		echo "<form action=\"writeBlog.php\" method=\"post\"> ";
		echo "<input type=\"hidden\" name=\"bloggerId\" value=\"" . $bloggerId . "\">";
		echo "<button type=\"submit\" class=\"btn btn-primary\" >";
		echo "<span class=\"glyphicon glyphicon-pencil\"> </span> ";
		echo "Write a Blog";
		echo "</button";
		echo "</form>";
		echo "</div>";
	}

	

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

	if ($row['blog_is_active'] == 'N') {
		$ba = "Inactive ";
	} else {	
		$ba = "Active";
	}

	echo "<div class=\"jumbotron\">";
	
	echo "<label>" . "Blog Title : " . "</label>" . $row['blog_title'] . "<br>";
	echo "<label>" . "Blog Category : " . "</label>" . $row['blog_category'] . "<br>";
	echo "<label>" . "Blog Description : " . "</label>" . $row['blog_desc'] . "<br>";
	echo "<label>" . "Blog ID : " . "</label>" . $row['blog_id'] . "<br>";
	echo "<label>" . "Blog Status : " . "</label>" . $ba . "<br>";

	$imageThings->displayimage($row['blog_id']);

	echo "<form action=\"editPage.php\" method=\"post\"> ";

	if ($blogger_is_active == 'N') {
		echo "<input class =\"btn btn-primary disabled\" type=\"submit\" value=\"Edit\" disabled>";// Just put a 'disabled' here.
	} else {
		echo "<button  class =\"btn btn-primary\" type=\"submit\" >";
		echo "<span class=\"glyphicon glyphicon-pencil\"> </span> ";
		echo "Edit";
		echo "</button>";
	}

	
	echo "<input type=\"hidden\" name = \"bid\" value=\" " . $row['blog_id'] . "\">";
	echo "</form>". "<br>"; 

	echo "</div>";
	}
?>
</div>
</body>
</html>