<?php 
	include("dbcon.php");
	include("currentdate.php");
	session_start();

	$type=$_POST['type'];
	$check_up_num=$_POST['check_up_num'];
	$date=date("Y-m-d",strtotime($_POST['date']));
	$weigth=$_POST['weigth'];
	$height=$_POST['height'];
	$age_gest=$_POST['age_gest'];
	$upperbp=$_POST['upperbp'];
	$lowerbp=$_POST['lowerbp'];
	$nutri_stat=$_POST['nutri_stat'];
	$preg_stat=$_POST['preg_stat'];
	$creation_bplan=$_POST['creation_bplan'];
	$changes_bplan=$_POST['changes_bplan'];
	$advice=$_POST['advice'];
	$dental=$_POST['dental'];
	$lab=$_POST['lab'];
	$hemog=$_POST['hemog'];
	$urinalysis=$_POST['urinalysis'];
	$cbc=$_POST['cbc'];
	$blood_group=$_POST['blood_group'];
	$etio=$_POST['etio'];
	$pap_smear=$_POST['pap_smear'];
	$gest_diab=$_POST['gest_diab'];
	$bacte=$_POST['bacte'];
	$sti=$_POST['sti'];
	$stool=$_POST['stool'];
	$acetic=$_POST['acetic'];
	$tetanus_date=date("Y-m-d",strtotime($_POST['tetanus_date']));
	$return_date=date("Y-m-d",strtotime($_POST['return_date']));
	$hsp_name=$_POST['hsp_name'];
	$hospital_ref=$_POST['hospital_ref'];



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




         $query="insert into prenatal(client_id,prenatal_type,prenatal_checknum,prenatal_date,prenatal_weight,prenatal_height,prenatal_age_gest,prenatal_upperbp,prenatal_lowerbp,prenatal_nutristat,prenatal_pregstat,prenatal_creationbplan,prenatal_bplanchanges,prenatal_advice,prenatal_dental,prenatal_labtest,prenatal_hemog,prenatal_urinalysis,prenatal_cbc,prenatal_bloodrh,prenatal_etiotest,prenatal_papsmear,prenatal_gestdiab,prenatal_bacteriuria,prenatal_STI,prenatal_stool,prenatal_acetic,prenatal_tetanus,prenatal_datereturn,prenatal_provname,prenatal_hospref) values ('$clientid','$type','$check_up_num','$date','$weigth','$height','$age_gest','$upperbp','$lowerbp','$nutri_stat','$preg_stat','$creation_bplan','$changes_bplan','$advice','$dental','$lab','$hemog','$urinalysis','$cbc','$blood_group','$etio','$pap_smear','$gest_diab','$bacte','$sti','$stool','$acetic','$tetanus_date','$return_date','$hsp_name','$hospital_ref') ";

         $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

         if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:prenatal1.php");

			$activity="has consulted prenatal check-up" ;
			$query = "insert into history (client_id,activity,date) values ('$clientid','$activity','$logdate2') ";
			$query_run= mysqli_query($con,$query);



			$userid=$_POST['userid'];
            $activity="added new prenatal check-up record.";
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
					header("location:add-prenatal1.php");
				}



	}



?>