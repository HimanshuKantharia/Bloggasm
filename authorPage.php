<!DOCTYPE html>
<html>
<head>
	<title>Author Page</title>
	<link rel="shortcut icon" href="icon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="bootstrap/js/jquery-2.2.4.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/custom.css" rel="stylesheet">

</head>
<body>
	<?php
	session_start();
	//echo $_SESSION['check'];
	if ($_SESSION['username'] == "admin") {
		echo "<br />";
		echo "<form action=\"admin/admin.php\">";
		echo "<button class=\"btn btn-primary left\" type = \"submit\">Admin Page</button>";
		echo "</form>";
	} else {
		
		echo "<form action=\"index.php\">";
		echo "<button class=\"btn btn-primary left\" type = \"submit\">Home</button>";
		echo "</form>";
	}
	?>
		
</body>
</html>
<?php

	require 'classes/blogControl.php';

 	$blogger_id = $_POST['bid'];

	$blog = new blog();
	$result = $blog->displayBlogs($blogger_id);
	

	$blogger = new blogger();
	$authorName = $blogger->getUsername($blogger_id);

	echo "<blockquote>";
	echo "<p>";
	echo "<br>Author Name : " . $authorName .  "<br>";
	echo "Author Id: " . $blogger_id .  "<br>";
	//echo "Joint on: " . $blogger_create_date . "<br>";
	echo "</p>";
	echo "</blockquote>";

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	
	if ($_SESSION['username'] != 'admin') {

	if ($row['blog_is_active'] == 'Y'){
	echo "<div class=\"jumbotron\">";

	echo "<label>" . "<br>Blog Title : " . "</label>" .  $row['blog_title'] . "<br>";
	echo "<label>" . "Blog Category : " . "</label>" .  $row['blog_category'] . "<br>";
	echo "<label>" . "Blog Description : " . "</label>" .  $row['blog_desc'] . "<br>";
	echo "<label>" . "Blog Creation date : " . "</label>" .  $row['creation_date'] . "<br>";


	}
}

	if ($_SESSION['username'] == 'admin') {

	echo "<div class=\"jumbotron\">";

	echo "<label>" . "<br>Blog Title : " . "</label>" .  $row['blog_title'] . "<br>";
	echo "<label>" . "Blog Category : " . "</label>" .  $row['blog_category'] . "<br>";
	echo "<label>" . "Blog Description : " . "</label>" .  $row['blog_desc'] . "<br>";
	echo "<label>" . "Blog Creation date : " . "</label>" .  $row['creation_date'] . "<br>";

	if ($row['blog_is_active'] == 'N') {
			$ny = "InActive";
				$act = "Activate post";
		}else{
			$ny = "Active";
			$act = "DeActivate post";
	}

		echo "<label>" . "Blog Activity : " . "</label>" . "<strong>" .  $ny . "</strong>" ."<br>";
		echo "<br />";

		echo "<form method = \"post\" action=\"changeBlogActivity.php\">";
		echo "<input type =\"hidden\" name=\"blog_changeid\"";
		echo "value = \"" . $row['blog_id'] . "\">";

		echo "<button class=\"btn btn-primary left\" type = \"submit\">" . $act . "</button>";
		echo "</form>";
	}
	echo "</div>";

	}

	
?>