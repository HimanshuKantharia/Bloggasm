<?php
	require '../classes/blogControl.php';

	$blog = new blog();
	$blog_id_edit = $_POST['bid'];
	$blog_title = $_POST['title'];
	$blog_desc = $_POST['desc'];
	$blog_category = $_POST['category'];

	echo $blog_id_edit;

	if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])) {
		
		

		$result1 = $blog->editBlog($blog_id_edit,$blog_title,$blog_desc,$blog_category);

		//$newResult = mysqli_fetch_array($result1);
		// echo "<html>";
		// echo "<form action=\"editPage.php\" method=\"post\"> ";
		// echo "<input type=\"hidden\" name = \"bid\" value=\" " . $blog_id_edit . "\">";
		// echo "</form>";
		// echo "</html>";
		header('location: userPage.php');

	}
?>
