<?php
		//session_start();
			session_destroy();
if(!isset($_SESSION)){
			header("location: ../index.php");
		}
?>