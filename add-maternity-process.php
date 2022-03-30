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


		
		$query="insert into maternity(client_id,maternity_bmi,maternity_mensdate,maternity_expectdate,maternity_pregnum) values ('$clientid','$bmi','$mens_date','$expect_date','$preg_num') ";
		$query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

		if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:maternity.php");


			$userid=$_POST['userid'];
            $activity="added new maternity record.";
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