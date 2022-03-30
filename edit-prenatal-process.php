<?php 
	$prenatal_id=$_POST['prenatal_id'];

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


	if(isset($_POST['btn_save']))
	{


		 $query=" update prenatal set client_id='$clientid',prenatal_type='$type',prenatal_checknum='$check_up_num',prenatal_weight='$weigth',prenatal_height='$height',prenatal_age_gest='$age_gest',prenatal_upperbp='$upperbp',prenatal_lowerbp='$lowerbp',prenatal_nutristat='$nutri_stat',prenatal_pregstat='$preg_stat',prenatal_creationbplan='$creation_bplan',prenatal_bplanchanges='$changes_bplan',prenatal_advice='$advice',prenatal_dental='$dental',prenatal_labtest='$lab',prenatal_hemog='$hemog',prenatal_urinalysis='$urinalysis',prenatal_cbc='$cbc',prenatal_bloodrh='$blood_group',prenatal_etiotest='$etio',prenatal_papsmear='$pap_smear',prenatal_gestdiab='$gest_diab',prenatal_bacteriuria='$bacte',prenatal_STI='$sti',prenatal_stool='$stool',prenatal_acetic='$acetic',prenatal_provname='$hsp_name',prenatal_hospref='$hospital_ref' where prenatal_id='$prenatal_id' ";


		 $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

         if ($query_run) 
				{
					//echo '<script> alert("Data saved successsfuly!"); </script>';

					$_SESSION['status'] = "Data saved successfully!";
					header("location:prenatal1.php");




			$userid=$_POST['userid'];
            $activity="updated prenatal  record ID no.".$prenatal_id;
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);


				}
				else
				{
					//echo '<script> alert("Failed saving data!"); </script>';
					$_SESSION['status'] = "Data saving failed!";
					header("location:edit-prenatal1.php");
				}




	}

?>