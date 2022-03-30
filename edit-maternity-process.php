<?php 
	include("dbcon.php");
	include("currentdate.php");
	session_start();

	if(isset($_POST['btn_save']))
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

         $bmi=$_POST['bmi'];
         $mens_date=date("Y-m-d",strtotime($_POST['mens_date']));
         $expect_date=date("Y-m-d",strtotime($_POST['expect_date']));
         $preg_num=$_POST['preg_num'];

          $id=$_POST['id'];


		
		if ($_POST['mens_date']!=null&&$_POST['expect_date']!=null) 
             	{

					$query = "update maternity set client_id='$clientid',maternity_bmi='$bmi',maternity_mensdate='$mens_date', maternity_expectdate='$expect_date', maternity_pregnum='$preg_num' where maternity_id='$id' ";
				    $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				}


		elseif ($_POST['mens_date']!=null) 
             	{

					$query = "update maternity set client_id='$clientid',maternity_bmi='$bmi',maternity_mensdate='$mens_date',  maternity_pregnum='$preg_num' where maternity_id='$id' ";
				    $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				}


		elseif ($_POST['expect_date']!=null) 
             	{

					$query = "update maternity set client_id='$clientid',maternity_bmi='$bmi', maternity_expectdate='$expect_date', maternity_pregnum='$preg_num' where maternity_id='$id' ";
				    $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				}

		else
             	{

					$query = "update maternity set client_id='$clientid',maternity_bmi='$bmi', maternity_pregnum='$preg_num' where maternity_id='$id' ";
				    $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				}		




		$query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

		if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:maternity.php");



			$userid=$_POST['userid'];
            $activity="updated maternity record ID no.".$id;
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);

				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:add-maternity.php");
				}


	}

 ?>