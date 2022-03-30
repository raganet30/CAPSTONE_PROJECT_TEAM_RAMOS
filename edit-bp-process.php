<?php
	include("currentdate.php"); 
	include("dbcon.php");
	session_start();

	if(isset($_POST['btn_save']))
	{

		$clientid="";
        $values = $_POST['search'];
        $stripped = str_replace(' ', '', $values);
    

        $id=$_POST['id'];
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


           
        
         			if ($_POST['date']!=null) 
             	{

					$query = "update bp_monitoring set client_id='$clientid', upperbp='$upperbp',lowerbp='$lowerbp',level='$level',date='$date' where id='$id' ";
				    $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				}


				else
				{
					$query = "update bp_monitoring set client_id='$clientid', upperbp='$upperbp',lowerbp='$lowerbp',level='$level' where id='$id' ";
				    $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				}









				if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:bp-monitoring.php");


			$userid=$_POST['userid'];
            $activity="updated BP Monitoring record ID no.".$id;
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);



				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:add-bp.php");
				}
		

		




	}




 ?>