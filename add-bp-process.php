<?php 
	include("currentdate.php");
	include("dbcon.php");
	session_start();

	if(isset($_POST['btn_save']))
	{

		$clientid="";
        $values = $_POST['search'];
        $stripped = str_replace(' ', '', $values);
       // $remarks=$_POST['remarks'];


        $upperbp=$_POST['upperbp'];
        $lowerbp=$_POST['lowerbp'];
        $level=$_POST['level'];

        $date=date("Y-m-d",strtotime($_POST['date']));

            ///query to get vaccine ID
       

        $query = "select * from client where concat(client_fname,client_mi,client_lname)  like '%$stripped%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                 $clientid .= $row['client_id'];
                 
             }
         }


           
        


					$query = "insert into bp_monitoring (client_id,upperbp,lowerbp,level,date) values ('$clientid','$upperbp','$lowerbp','$level','$date') ";
				$query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:bp-monitoring.php");


					$activity="has consulted BP check-up with BP:".$upperbp."/".$lowerbp ;
					$query = "insert into history (client_id,activity,date) values ('$clientid','$activity','$logdate2') ";
					$query_run= mysqli_query($con,$query);



			$userid=$_POST['userid'];
            $activity="added new BP Monitoring record.";
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);




          /////count visit query
         $query = " select * from visit where client_id='$clientid' and visit_date ='$date' ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)<1) 
         {
            $query3="insert into visit(client_id,visit_date) values('$clientid','$date')";
            $query_run3= mysqli_query($con,$query3); 
         }   
           ////////





				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:add-bp.php");
				}
		

		




	}




 ?>