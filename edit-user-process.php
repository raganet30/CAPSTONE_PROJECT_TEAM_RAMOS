<?php 
	
	include("dbcon.php");
	include("currentdate.php");
	
    session_start();


     if (isset($_POST['btn_save'])) 
    {
    	 $id = $_POST['id'];
    	 $username=$_POST['username'];
    	 $email=$_POST['email'];
    	 $newpassword= md5($_POST['new_password']);
		 $role=$_POST['role'];
		 $status=$_POST['status'];
		 $userid=$_POST['userid'];
		

			if($_POST['new_password']!=null)
			{
				
				$query ="update admin_user set username='$username',email='$email', password='$newpassword', verify_status='$status', role='$role' where id='$id' ";
	             $query_run= mysqli_query($con,$query);

			             if ($query_run) 
			        {
			          
			            $_SESSION['status'] = "Data saved successfully!";
			            header("location:manage-users.php");

			            $activity="set new password for"." ".$username;

			            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
						$query_run2= mysqli_query($con,$query2);
			           
			        }
			        else
			        {
			            $_SESSION['status'] = "Data saving failed!";
			            header("location:manage-users.php");
			        }

			}

			else
			{
				$query ="update admin_user set username='$username',email='$email', verify_status='$status', role='$role' where id='$id' ";
	             $query_run= mysqli_query($con,$query);

			             if ($query_run) 
			        {
			          
			            $_SESSION['status'] = "Data saved successfully!";
			            header("location:manage-users.php");

			            $activity="updated user information for"." ".$username;

			            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
						$query_run2= mysqli_query($con,$query2);



			           
			        }
			        else
			        {
			            $_SESSION['status'] = "Data saving failed!";
			            header("location:manage-users.php");
			        }


			}

			 
				


		

    }



	


 ?>