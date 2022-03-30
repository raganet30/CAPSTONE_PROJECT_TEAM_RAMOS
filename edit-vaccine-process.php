<?php 
	include("currentdate.php");
	include("dbcon.php");
	
    session_start();


     if (isset($_POST['btn_save'])) 
    {
  
  		 $id=$_POST['id'];
    	 $name=$_POST['name'];
		 $dosage= $_POST['dosage'];
		 $dose_type= $_POST['dose-type'];
		 $brand=$_POST['brand'];
    	 


    	 $userid=$_POST['userid'];
    	
		

			
				
				$query ="update vaccine set vaccine_name='$name',vaccine_dosage='$dosage',vaccine_dose_type='$dose_type',vaccine_brand='$brand' where vaccine_id='$id' ";

	             $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

			             if ($query_run) 
			        {
			          
			            $_SESSION['status'] = "Data saved successfully!";
			            header("location:vaccine.php");

			            $activity="updated vaccine details for vaccine ID No.".$id;

			            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
						$query_run2= mysqli_query($con,$query2);
			           
			        }
			        else
			        {
			            $_SESSION['status'] = "Data saving failed!";
			            header("location:edit-vaccine.php");
			        }

			

    }


	


 ?>