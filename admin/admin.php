<!-- <?php
	//session_start();
	$_SESSION['username'] = "admin";
?> -->
<!DOCTYPE HTML>
<html>
<head>
	<title>Welcome Admin</title>
	<link rel="shortcut icon" href="../icon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../bootstrap/js/jquery-2.2.4.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../bootstrap/css/custom.css" rel="stylesheet">

</head>
<body>
<h1>Admin you are Welcome to your page.</h1>


<form action="logout.php">
	<button type="submit" class="btn btn-primary">Logout</button>
</form>
<br><br>

<div>
	<?php

	require '../classes/blogControl.php';

	session_start();
	$_SESSION['username'] = "admin";


	$blogger = new blogger();
	$result = $blogger->displayBloggers();

echo "<h3>List of<strong> Bloggers.</strong></h3><br/>";


	echo '<table width="100%">'; // start a table tag in the HTML
	echo "<tr>";
	echo "<td class=\"text-center\">" . "<label>" . "Blogger Username" . "</label>" . "</td>";
	echo "<td class=\"text-center\">" . "<label>" . "Blogger Creation Date" . "</label>" . "</td>";
	echo "<td class=\"text-center\">" . "<label>" . "Blogger Updation Date" . "</label>" ."</td>";
	echo "<td class=\"text-center\">" . "<label>" . "Change Activity" . "</label>" . "</td>";
	echo "<td class=\"text-center\">" . "<label>" . "Blogger End Date" . "</label>" . "</td>";
	echo "</tr>";

	
	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
		

		if ($row['blogger_is_active'] == 'N') {
			$ny = "Activate";

		}else{
			$ny = "Deactivate";
			$row['blogger_end_date'] = "-";
		}
		
		
		echo "<tr>";
		echo "<td class=\"text-center\">" . "<p class=\"text-capitalize\">";

		echo "<form method = \"post\" action = \"../authorPage.php\">";
		$bid = $blogger->getId($row['blogger_username']);
		//echo "<a href=\"../authorPage.php\">" . $row['blogger_username'] . "</a>" . "</p></td>";
		echo "<input type =\"hidden\" name=\"bid\"";
		echo "value = \"" . $bid . "\">";
		
		echo "<input type=\"submit\"";
		echo "value = \"" . $row['blogger_username'] . "\">";
		echo "</form>";

		echo "<td class=\"text-center\">" . $row['blogger_creation_date'] . "</td>";
		echo "<td class=\"text-center\">" . $row['blogger_updated_date'] . "</td>";
		echo "<td class=\"text-center\">";
			echo "<form method = \"post\" action = \"changeActivity.php\">";

			if ($row['blogger_is_active'] == 'N') {
			echo "<button type=\"submit\" class=\"btn btn-success\" name=\"toggle\" value = \" ";

		}else{
			$ny = "Deactivate";
			echo "<button type=\"submit\" class=\"btn btn-danger\" name=\"toggle\" value = \" ";
		}
				
				echo $row['blogger_username'];
				echo "\" >";
				echo $ny;
				echo "</button>";
				$changeid = $blogger->getId($row['blogger_username']);
				echo "<input type =\"hidden\" name=\"blogger_changeid\"";
				echo "value = \"" . $changeid . "\">";
		echo "<td class=\"text-center\">" . $row['blogger_end_date'] . "</td>";
			echo "</form>";
		echo "</td></tr>"; 
		}	

	echo "</table>";


?>
</div>


</body>
</html>

<?php
	
?>
