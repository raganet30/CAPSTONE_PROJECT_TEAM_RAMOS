<?php 
session_start();
include('dbcon.php');


	if (isset($_GET['token'])) 
	{
		$token =$_GET['token'];

		$verify_query = "select verify_token , verify_status from admin_user where verify_token='$token' limit 1";
		$verify_query_run = mysqli_query($con, $verify_query);

		if (mysqli_num_rows($verify_query_run) > 0) 
		{
			$row = mysqli_fetch_array($verify_query_run);
			if ($row['verify_status']=="0") 
			{
				$clicked_token = $row['verify_token'];
				$update_query = "update admin_user set verify_status='1'where verify_token='$clicked_token' limit 1 ";
				$update_query_run =mysqli_query($con,$update_query);

				if ($update_query_run) 
				{
				$_SESSION['status'] ="Verification successful!";
				header("location:login.php");
				exit(0);
				}

				else
				{
				$_SESSION['status'] ="Verification failed!";
				header("location:login.php");
				}

			}

			else
			{
				$_SESSION['status'] =" Email is already verified.You can login now.";
				header("location:login.php");
			}
		}

		else
		{
		$_SESSION['status'] ="This token does not exist!";
		header("location:login.php");
		}

	}


	else
	{
		$_SESSION['status'] ="Not allowed!";
		header("location:login.php");
	}	



 ?>