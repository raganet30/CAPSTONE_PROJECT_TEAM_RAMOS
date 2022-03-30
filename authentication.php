<?php 

	session_start();

	if(!isset($_SESSION['authenticated']))
	{

		$_SESSION['status'] ="Please enter your username and password and click Login.";
		header("location:login.php");
		exit(0);

	}

 ?>