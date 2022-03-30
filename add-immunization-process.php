<?php 
	include("dbcon.php");
    include("currentdate.php");
	session_start();

	if(isset($_POST['btn_save']))
	{

		$clientid="";
        $values = $_POST['search'];
        $stripped = str_replace(' ', '', $values);
        $remarks=$_POST['remarks'];


            ///query to get vaccine ID
        $date_given=date("Y-m-d",strtotime($_POST['date_given']));

        $query = "select * from client where concat(client_fname,client_mi,client_lname)  like '%$stripped%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                 $clientid .= $row['client_id'];
                 
             }
         }


             ///query to get Healthworker ID
        $hw_id="";
        $values2 = $_POST['vaccinator'];
        $stripped2 = str_replace(' ', '', $values2);

        $query = "select * from healthworker where concat(hw_fname,hw_mi,hw_lname)  like '%$stripped2%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                    //echo $row['hw_id'];
                    $hw_id .= $row['hw_id'];
             }
         }     


         ///query to get vaccine ID
         $vaccine_name=$_POST['vaccine_name'];
         $vaccine_id="";
         $query = " select vaccine_id from vaccine where vaccine_name='$vaccine_name' ";
         $query_run=mysqli_query($con,$query);

         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
             	$vaccine_id.=$row['vaccine_id'];
             }
         }


        
         $query = " select * from client_immunization where vaccine_id='$vaccine_id' and client_id='$clientid' ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)>=1) 
         {
             $_SESSION['status'] = "Data Saving Failed!"." ".$_POST['vaccine_name']." "."vaccine is already given to"." ".$_POST['search'];
			 header("location:add-immunization.php");
         }



		else
		{
					$query = "insert into client_immunization (vaccine_id,	client_id,client_immu_date,hw_id,client_immu_remarks) values ('$vaccine_id','$clientid','$date_given','$hw_id','$remarks') ";
				$query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

				if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:immunization.php");

            $userid=$_POST['userid'];
            $activity="added new immunization record.";
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);




             /////count visit query
         $query = " select * from visit where client_id='$clientid' and visit_date ='$date_given' ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)<1) 
         {
            $query3="insert into visit(client_id,visit_date) values('$clientid','$date_given')";
            $query_run3= mysqli_query($con,$query3); 
         }   
           ///////////////////////






         //////update client immunization status

               $rt = mysqli_query($con,"SELECT *  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where client_immunization.client_id ='$clientid'   ");
                                                            $num1 = mysqli_num_rows($rt);
                                                            if($num1>=10)
                                                            {
                                                                $stat="Fully Immunized";
                                                                $query ="update client set client_immu_status='$stat'  where client_id='$clientid' ";
                                                                $query_run= mysqli_query($con,$query);
                                                            }
                                                            else
                                                            {
                                                                $stat="Not Fully Immunized";
                                                                $query ="update client set client_immu_status='$stat'  where client_id='$clientid' ";
                                                                $query_run= mysqli_query($con,$query);
                                                            }
                                                           

//////update client immunization status


				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:add-immunization.php");
				}
		}

		




	}




 ?>