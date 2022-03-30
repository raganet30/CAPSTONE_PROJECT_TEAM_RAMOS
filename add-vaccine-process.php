<?php 
	include("dbcon.php");
	include("currentdate.php");

	session_start();

	if(isset($_POST['btn_save']))
	{

		$name=$_POST['name'];
		$dosage= $_POST['dosage'];
		$dose_type= $_POST['dose-type'];
		$brand=$_POST['brand'];

		

		$query = "insert into vaccine (vaccine_name,vaccine_dosage,vaccine_dose_type,vaccine_brand) values ('$name','$dosage','$dose_type','$brand') ";
		$query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

		if ($query_run) 
		{
			//echo '<script> alert("Data saved successsfuly!"); </script>';

			$_SESSION['status'] = "Data saved successfully!";
			header("location:vaccine.php");



			$userid=$_POST['userid'];
			$activity="added new vaccine.";
			$query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
		    $query_run2= mysqli_query($con,$query2);
		}
		else
		{
			//echo '<script> alert("Failed saving data!"); </script>';
			$_SESSION['status'] = "Data saving failed!";
			header("location:add-vaccine.php");
		}




	}




 ?>