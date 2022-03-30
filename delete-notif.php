<?php 
	
	include("dbcon.php");
	
	
    session_start();
	$id=intval($_GET['id']);


if (isset($id)) 
{
	

    $query ="delete from log where log_id='$id' ";
	 $query_run= mysqli_query($con,$query);

			             if ($query_run) 
			        {
			          
			            $_SESSION['status'] = "Deleted successfully!";
			            header("location:activities.php");

			          
			           
			        }

}			        
			        
?>    