<?php 
	include("dbcon.php");
	include("currentdate.php");
	session_start();

	if(isset($_POST['btn_save']))
	{

		$fname = $_POST['fname'];
		$mi = $_POST['mi'];
		$lastname = $_POST['lastname'];
	

		$bday = new DateTime($_POST['dob']);
		$dob=date("Y-m-d",strtotime($_POST['dob']));
		
		$gender = $_POST['gender'];
		$barangay = $_POST['brgy'];
	
		$street=$_POST['street'];
		$purok=$_POST['purok'];
		$mother=$_POST['mother'];
		$father=$_POST['father'];
		$phone = $_POST['phone'];
		$status = $_POST['status'];
		$immu_status= "Not Fully Immunized";

		//$joindate = $_POST['joindate'];
		$joindate=date("Y-m-d",strtotime($_POST['joindate']));

		 $query = " select * from client where client_fname='$fname' and client_mi='$mi' and client_lname='$lastname'  ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)>=1) 
         {
             $_SESSION['status'] = "Data Saving Failed!"." ".$_POST['fname'].$_POST['mi'].$_POST['lastname']." "." is already recorded" ;
			 header("location:add-client.php");
         }
		
		else
		{



		$query = "insert into client (client_fname,client_mi,client_lname,client_bdate,client_gender,client_brgy,client_street,client_purok,client_mother,client_father,client_phone,client_status,client_immu_status,client_joindate) values ('$fname','$mi','$lastname','$dob','$gender','$barangay','$street','$purok','$mother','$father','$phone','$status','$immu_status','$joindate') ";
		$query_run= mysqli_query($con,$query);








		if ($query_run) 
		{
			//echo '<script> alert("Data saved successsfuly!"); </script>';

			$_SESSION['status'] = "Data saved successfully!";
			header("location:clients.php");



			$userid=$_POST['userid'];
			$activity="added new Client.";
			$query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
		    $query_run2= mysqli_query($con,$query2);

		}
		else
		{
			//echo '<script> alert("Failed saving data!"); </script>';
			$_SESSION['status'] = "Data saving failed!";
			header("location:add-client.php");
		}




	}


	}




 ?>