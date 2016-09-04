<?php
	require '../classes/blogControl.php';	
	//require '../classes/dbcontrol.php';

	$bloggerId = $_POST['bloggerId'];

	//if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])) {
?>



<!DOCTYPE html>
<html>
<head>
	<title>Write A Blog</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../icon.ico" />
	<script src="../bootstrap/js/jquery-2.2.4.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/custom.css" rel="stylesheet">
</head>
<body>
<h2>Write a Blog here.</h2>
<form action="userPage.php">
	<input type="submit" class="btn btn-primary" value="Write Later">
</form>

<form method="post" action="writeBlog.php" enctype='multipart/form-data'>
<div class="form-group">
	<div class="col-md-1">
	<label for="title">Title :</label>
	</div>
	<div class="col-md-11">
	<input type="text" name="title" required="required" class="form-control">
	</div>
</div><br><br>
<div class="form-group">
	<div class="col-md-1">
	<label for="category">Category :</label>
	</div>
	<div class="col-md-11">
	<input type="text" name="category" required="required" class="form-control">
	</div>
</div><br><br>
<div class="form-group">
	<div class="col-md-1">
	<label for="desc">Describe here :</label>
	</div>
	<div class="col-md-11">
	<textarea id="txtarea" name="desc" required="required" class="form-control" rows="5"></textarea>
</div><br><br><br><br><br><br>

<div class="form-group">
	<div class="col-md-1">
	<label for="imagedata">Upload image :</label>
	</div>
	<div class="col-md-11">
	<input type="file" name="imagedata">
</div><br><br><br><br><br><br>

 
 <input type="hidden" name="bloggerId" value="<?php echo $bloggerId; ?>">

<div class="form-group">
	<div class="col-md-4">
	<input type="submit" value = "Submit" name="submitbtn" class="btn btn-primary">
	</div>


</div>
</form>

</body>
</html>

<?php						
	if(isset($_POST['submitbtn']) && !empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])){			
		echo "Bloger id " .$bloggerId;

		$blogger = new blogger();
		$bloggerName = $blogger->getUsername($bloggerId);
				
		$blog = new blog();
		$blog->storeBlog($bloggerId,$_POST['title'],$_POST['desc'],$_POST['category'],$bloggerName);
		
		$blogMaxId = $blog->getMaxBlogid();
		echo $blogMaxId;

		$imageThings = new imageThings();

		//$target_dir = "C:\Program Files (x86)\SOFTWARES\Wamp\wamp\www\Blogging\FinalFS/";
		//$target_file = $target_dir . basename($_FILES['imagedata']['tmp_name']);
		//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		if(getimagesize($_FILES['imagedata']['tmp_name']) == FALSE)
		{
			echo "Please select an image.";
		}
		else
		{
			 $image= addslashes($_FILES['imagedata']['tmp_name']);
			 //$name= addslashes($_FILES['imagedata']['tmp_name']);
			 $name = $blogMaxId;
			 $image= file_get_contents($image);
			 $image= base64_encode($image);
			 $imageThings->saveimage($name,$image);
			echo "Gottcha!..";
			$imageThings->displayimage($blogMaxId);
		}
	}

?>