<?php
	require '../classes/blogControl.php';

	$blog = new blog();
	$imageThings = new imageThings();
	$blog_id_edit = $_POST['bid'];
	$blog_title = $_POST['title'];
	$blog_desc = $_POST['desc'];
	$blog_category = $_POST['category'];

	echo $blog_id_edit;

	if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])) {
		
		$result1 = $blog->editBlog($blog_id_edit,$blog_title,$blog_desc,$blog_category);




		$image= addslashes($_FILES['imagedataedit']['tmp_name']);

		if ($image == 1) {

		//$name= addslashes($_FILES['imagedata']['tmp_name']);
		echo "filename" . $image;
		$image= file_get_contents($image);
		$image= base64_encode($image);
		
		$imageThings->editimage($blog_id_edit,$image);

	}

		header('location: userPage.php');
}
?>
