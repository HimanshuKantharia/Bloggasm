<?php
	require '../classes/blogControl.php';

	$imageThings = new imageThings();
	$blog = new blog();
	$blog_id_edit = $_POST['bid'];

	//echo "<br>blog id = " . $blog_id_edit ;

	$result = $blog->displayBlog($blog_id_edit);

	$oldResult = mysqli_fetch_array($result);

	$blog_title = $oldResult['blog_title'];
	$blog_desc = $oldResult['blog_desc'];
	$blog_category = $oldResult['blog_category'];

	//echo $blog_title;
	//echo $blog_category;
	//echo $blog_desc;

	// if (isset($_POST['submitbtn']) && !empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])) {
	// 	$result1 = $blog->editBlog($blog_id_edit,$blog_title,$blog_desc,$blog_category);
	// 			//echo "<br>HIMANSHu<br>";

	// 	//$newResult = mysqli_fetch_array($result1);

	// 	// $image= addslashes($_FILES['imagedata']['tmp_name']);
	// 	// //$name= addslashes($_FILES['imagedata']['tmp_name']);
	// 	// $image= file_get_contents($image);
	// 	// $image= base64_encode($image);
	// 	// echo "<br>HIMANSHu<br>";
	// 	// $imageThings->editimage($blog_id_edit,$image);
	// }

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit A Blog</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../icon.ico" />
	<script src="../bootstrap/js/jquery-2.2.4.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/custom.css" rel="stylesheet">
</head>
<body>
<h2>EDIT a Blog here.</h2>
<a type="button" class="btn btn-danger" href="userPage.php">I will EDIT later.</a>

<form method="post" action="updatePage.php" role="form" enctype="multipart/form-data">
<div class="form-group">
	<div class="col-md-1">
	<label for="title">Title :</label>
	</div>
	<div class="col-md-11">
	<input type="text" name="title" required="required" class="form-control" value = "<?php echo $blog_title;?> ">
	</div>
</div><br><br>
<div class="form-group">
	<div class="col-md-1">
	<label for="category">Category :</label>
	</div>
	<div class="col-md-11">
	<input type="text" name="category" required="required" class="form-control" value = "<?php echo $blog_category;?> ">
	</div>
</div><br><br>
<div class="form-group">
	<div class="col-md-1">
	<label for="desc">Describe here :</label>
	</div>
	<div class="col-md-11">
	<textarea id="txtarea" name="desc" required="required" class="form-control" rows="5" ><?php echo $blog_title;?></textarea>
	</div><br><br>

	<input type="hidden" name = "bid" value=" <?php echo $blog_id_edit;?> ">

	<div class="form-group">
	<div class="col-md-1">
	<label for="imagedata">Upload image :</label>
	</div>
	<div class="col-md-11">
	<input type="file" name="imagedataedit" >
</div><br><br><br><br><br><br>

<div class="form-group">
	<div class="col-md-4s">
	<input class="btn btn-primary" type="submit" value="Submit">
	</div>


</div>
</form>

</body>
</html>
	