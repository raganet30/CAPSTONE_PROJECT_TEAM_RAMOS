<?php 
	
	include("dbcon.php");
	include("currentdate.php");
	
    session_start();


     if (isset($_POST['save'])) 
    {
  
    	 $name=$_POST['name'];
    	 $contact_person=$_POST['contact_person'];
    	 $address=$_POST['address'];
    	 //$postalcode=$_POST['postalcode'];
    	 $email=$_POST['email'];
    	 $phone=$_POST['phone'];
    	 $telephone=$_POST['telephone'];
    	 $userid=$_POST['userid'];
    	
		

			
				
				$query ="update settings set name='$name',contact_person='$contact_person',address='$address',email='$email',phone='$phone',telephone='$telephone' ";
	             $query_run= mysqli_query($con,$query);

			             if ($query_run) 
			        {
			          
			            $_SESSION['status'] = "Data saved successfully!";
			            header("location:settings.php");

			            $activity="have changed the settings";

			            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
						$query_run2= mysqli_query($con,$query2);
			           
			        }
			        else
			        {
			            $_SESSION['status'] = "Data saving failed!";
			            header("location:settings.php");
			        }

			

    }

elseif ($_POST['cancel']) 
{
	header("location:index.php");
}

	


 ?>