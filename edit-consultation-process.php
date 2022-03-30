<?php 
	include("currentdate.php");
	include("dbcon.php");
	session_start();

	if (isset($_POST['btn_save'])) 
	{
		
	
 	

        $clientid="";
        $values = $_POST['search'];
        $stripped = str_replace(' ', '', $values);
        $query = "select * from client where concat(client_fname,client_mi,client_lname)  like '%$stripped%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                 $clientid .= $row['client_id'];
                 //echo $row['client_id'];
             }
         }     

  





        $hwid="";
        $values = $_POST['doctor'];
        $stripped = str_replace(' ', '', $values);
        $query = "select * from healthworker where concat(hw_fname,hw_mi,hw_lname)  like '%$stripped%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                    //echo $row['hw_id'];
                    $hwid .= $row['hw_id'];
             }
         }     

   


         		$con_id=$_POST['con_id'];
				$complaints=$_POST['complaints'];
				//$bp=$_POST['bp'];

				$upperbp=$_POST['upperbp'];
				$lowerbp=$_POST['lowerbp'];

             	$resp_rate=$_POST['resp_rate'];
             	$cap_refill=$_POST['cap_refill'];
             	$temp=$_POST['temp'];
             	$weigth=$_POST['weigth'];
             	$pulse_rate=$_POST['pulse_rate'];

             	//$hw_id=$row['hw_id'];	
             	$diagnosis=$_POST['diagnosis'];
             	$treatment=$_POST['treatment'];
             	//$con_group=$_POST['con_group'];
             	$consult_date=date("Y-m-d",strtotime($_POST['consult_date']));


             	if ($_POST['consult_date']!=null) 
             	{
             		
             	

             	$query = " update consultation set client_id='$clientid', consultation_complaints='$complaints', consultation_upperbp='$upperbp', consultation_lowerbp='$lowerbp',consultation_resprate='$resp_rate', consultation_cr='$cap_refill', consultation_temp='$temp', consultation_weight='$weigth', consultation_prate='$pulse_rate', consultation_diag='$diagnosis', consultation_treatment='$treatment',  consultation_date='$consult_date', hw_id='$hwid' where consultation_id='$con_id' ";




             		
             	}

             	else
             	{

             		$query = " update consultation set client_id='$clientid', consultation_complaints='$complaints',consultation_upperbp='$upperbp', consultation_lowerbp='$lowerbp', consultation_resprate='$resp_rate', consultation_cr='$cap_refill', consultation_temp='$temp', consultation_weight='$weigth', consultation_prate='$pulse_rate', consultation_diag='$diagnosis', consultation_treatment='$treatment',   hw_id='$hwid' where consultation_id='$con_id' ";



             	}



				$query_run= mysqli_query($con,$query);

				if ($query_run) 
				{
					
					$_SESSION['status'] = "Data saved successfully!";
					header("location:consultation.php");



			$userid=$_POST['userid'];
            $activity="updated consultation record ID no.".$con_id;
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);






				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:add-consultation.php");
				}



} 

?>