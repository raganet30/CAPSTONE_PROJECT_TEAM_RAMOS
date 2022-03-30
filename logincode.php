<?php 
include('dbcon.php');
session_start();



	if (isset($_POST['login_btn'])) 
	{
		

		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password= mysqli_real_escape_string($con,md5($_POST['password']));

		$login_query = "select  * from admin_user where username='$username' and password='$password' limit 1 ";
		$login_query_run =mysqli_query($con,$login_query);


		

		if (mysqli_num_rows($login_query_run)>0) 
		{
		 	$row = mysqli_fetch_array($login_query_run);
		 	
		 	$role.=$row['role'];

		 	if ($row['verify_status']=='1') 
		 	{
		 		$_SESSION['authenticated']= TRUE;
		 		$_SESSION['auth_user']=[
		 			'username'=>$row['username'],
		 			

		 		];
		 		header("location:index.php");

		 		$_SESSION['username']=$_POST['username'];

		 	}
		 	else
		 	{
		 	$_SESSION['status'] ="Please verify your email to login!";
			header("location:login.php");
		 	}
		} 

		else
		{

		$_SESSION['status'] ="Invalid credentials!";
		header("location:login.php");
		}

	}

 ?>