<?php
		require 'classes/blogControl.php';
		$blogger = new blogger();
		$logusername = $_POST['lusername'];
		$logpassword = $_POST['lpassword'];

		$logusername = stripslashes($logusername);
     	$logpassword = stripslashes($logpassword);
     	

		if ($logusername == "admin" && $logpassword == "admin" ) {

			echo '<script language="javascript">';
				echo 'alert("Admin is called")';
				echo '</script>';
			session_start();
			$_SESSION['username'] = "admin";
			header("location: admin/admin.php");
			
		}
		else {
			$result = $blogger->checkUser($logusername,$logpassword);

			$rows = mysqli_num_rows($result);

			if ($rows == 1) {

			 	session_start();
		 		
		 		$blogger->login($logusername);	
		 			
		 		header("location: user/userPage.php");

		 	} else { 
		 		echo '<script language="javascript">';
				echo 'alert("User does not exist")';
				echo '</script>';
				}
		}

	?>