<?php 
	include("dbcon.php");
	session_start();
	
	if(isset($_POST['btn_save']))
	{

		$fname = $_POST['fname'];
		$mi = $_POST['mi'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		//$dob = strtotime($_POST['dob']);

		$bday = new DateTime($_POST['dob']);
		$dob=date("Y-m-d",strtotime($_POST['dob']));
		//$today = new Datetime(date('m.d.y'));
		//$diff = $today->diff($bday);//age

		//$age= $diff->y.' Years, '.$diff->m.' month, '.$diff->d.' days';

		//$age = $_POST['age'];
		$gender = $_POST['gender'];
		$barangay = $_POST['barangay'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];

		//$joindate = $_POST['joindate'];
		$joindate=date("Y-m-d",strtotime($_POST['joindate']));


		$role = $_POST['role'];
		
		
		$query = " select * from healthworker where hw_fname='$fname' and hw_mi='$mi' and hw_lname='$lastname'  ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)>=1) 
         {
             $_SESSION['status'] = "Data Saving Failed!"." ".$_POST['fname'].$_POST['mi'].$_POST['lastname']." "." is already recorded" ;
			 header("location:add-client.php");
         }

         else
         {
		         	$query = "insert into healthworker (hw_fname,hw_mi,hw_lname,hw_email,hw_bdate,hw_gender,hw_brgy,hw_city,hw_province,hw_phone,hw_status,hw_joindate,hw_designation) values ('$fname','$mi','$lastname','$email','$dob','$gender','$barangay','$city','$province','$phone','$status','$joindate','$role') ";
				$query_run= mysqli_query($con,$query);

				if ($query_run) 
				{
					
					$_SESSION['status'] = "Data saved successfully!";
		           header("location:healthworkers.php");
				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
		            header("location:add-hw.php");
				}
         }

		




	}




 ?>