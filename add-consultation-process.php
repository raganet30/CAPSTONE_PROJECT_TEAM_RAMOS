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
                 
             }
         }     

  





        $hwid="";
        $values2 = $_POST['doctor'];
        $stripped2 = str_replace(' ', '', $values2);

        $query = "select * from healthworker where concat(hw_fname,hw_mi,hw_lname)  like '%$stripped2%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                    //echo $row['hw_id'];
                    $hwid .= $row['hw_id'];
             }
         }     

   

















				//$client_id=$_POST['client_id'];
				//$doctor_id=$_POST['doctor_id'];
				$complaints=$_POST['complaints'];
				//$bp=$_POST['upperbp']."/".$_POST['lowerbp'];

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




             	$query = "insert into consultation (client_id,consultation_complaints,consultation_upperbp,consultation_lowerbp,consultation_resprate,consultation_cr,consultation_temp,consultation_weight,consultation_prate,consultation_diag,consultation_treatment,consultation_date,hw_id) values ('$clientid','$complaints','$upperbp','$lowerbp','$resp_rate','$cap_refill','$temp','$weigth','$pulse_rate','$diagnosis','$treatment','$consult_date','$hwid') ";
				$query_run= mysqli_query($con,$query);

				if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:consultation.php");



					$activity="has been diagnosed for"." ".$diagnosis ;

					$query = "insert into history (client_id,activity,date) values ('$clientid','$activity','$consult_date') ";
					$query_run= mysqli_query($con,$query);




			$userid=$_POST['userid'];
            $activity="added new consultation record.";
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);







            /////count visit query
         $query = " select * from visit where client_id='$clientid' and visit_date ='$consult_date' ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)<1) 
         {
            $query3="insert into visit(client_id,visit_date) values('$clientid','$consult_date')";
            $query_run3= mysqli_query($con,$query3); 
         }   
           ////////




				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:add-consultation.php");
				}









} 

?>