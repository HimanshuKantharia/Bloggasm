<?php
$cid = $_POST['blogger_changeid'];
echo $cid;

	require '../classes/blogControl.php';

	$blogger = new blogger();
	$resultAct = $blogger->getActivity($cid);

	echo $resultAct;
	if ($resultAct == 'N') {
		$value = 'Y';
	} else {
		$value = 'N';
	}
	$result1 = $blogger->changeActivity($cid,$value);
	header('location: admin.php');
?>