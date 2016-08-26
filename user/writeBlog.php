<?php
	require '../classes/blogControl.php';	
		
	$bloggerId = $_POST['bloggerId'];

	if (!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['desc'])) {
						
				
		echo "Bloger id " .$bloggerId;

		$blogger = new blogger();
		$bloggerName = $blogger->getUsername($bloggerId);
				
		$blog = new blog();
		$blog->storeBlog($bloggerId,$_POST['title'],$_POST['desc'],$_POST['category'],$bloggerName);
		
		}

?>

<!DOCTYPE HTML>
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

<form method="post" action="writeBlog.php" name="blogForm" role="form">
<div class="form-group">
	<div class="col-md-1">
	<label for="title">Title :</label>
	</div>
	<div class="col-md-11">
	<input type="text" name="title" class="form-control">
	</div>
</div><br><br>
<div class="form-group">
	<div class="col-md-1">
	<label for="category">Category :</label>
	</div>
	<div class="col-md-11">
	<input type="text" name="category" class="form-control">
	</div>
</div><br><br>
<div class="form-group">
	<div class="col-md-1">
	<label for="desc">Describe here :</label>
	</div>
	<div class="col-md-11">
	<textarea id="txtarea" name="desc" class="form-control" rows="5"></textarea>
</div><br><br><br><br><br><br>

<!-- <div class="form-group">
	<div class="col-md-1">
	<label for="name">Upload image :</label>
	</div>
	<div class="col-md-11">
	<input type="file" accept="image/*" name="image">
</div><br><br><br><br><br><br>

 -->
 <input type="hidden" name="bloggerId" value="<?php echo $bloggerId; ?>">

<div class="form-group">
	<div class="col-md-4">
	<input type="submit" name="submit">
	</div>


</div>
</form>

</body>
</html>

