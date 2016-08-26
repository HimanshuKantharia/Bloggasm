<?php
$cid = $_POST['blog_changeid'];
echo $cid;

	require 'classes/blogControl.php';

	$blog = new blog();
	$resultAct = $blog->getBlogActivity($cid);

	echo $resultAct;
	if ($resultAct == 'N') {
		$value = 'Y';
	} else {
		$value = 'N';
	}
	$result1 = $blog->changeBlogActivity($cid,$value);
	header('location: admin/admin.php');
?>