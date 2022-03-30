<?php 
    
   // session_start();

 ?>
<!DOCTYPE html>
<html lang="en">

<?php include('dbcon.php') ?>
<?php include('includes/head.php');
include('authentication.php'); ?>


<body onload="window.print()">
    <div class="main-wrapper">



        
               

             


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

<?php 


                                     $query="select * from settings limit 1 ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>                              

                            <div class="card-header">
                                <center>
                                    <h4 ><?php echo $row['name'] ?> <br><?php echo $row['address'] ?><br><?php echo $row['phone']."|".$row['telephone'] ?><br><?php echo $row['email'] ?><br></h4>

                                    <i class="fas fa-table me-1"></i>
                                    MONTHLY IMMUNIZATION REPORT <?php echo date('M Y'); ?>
                                </center>
<?php 
    }
}
?>                                
                            </div>

                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>Immunization No.</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Vaccine</th>
                                        <th>Vaccinator</th>
                                        <th>Date Given</th>
                                        <th>Remarks</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php 

                                  
                                     $from= $_SESSION['from'];
                                     $to= $_SESSION['to'];
                                           
$query=" SELECT CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_immunization.client_immu_id as client_immu_id ,client.client_id as client_id,client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, client_immunization.client_immu_id as client_immu_id,vaccine.vaccine_name, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where MONTH(client_immu_date) = MONTH(CURRENT_DATE()) AND YEAR(client_immu_date) = YEAR(CURRENT_DATE())  " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>    




                                    <tr>
                                        <td><?= $items['client_immu_id'] ?></td>
                                        <td><?= $items['client_name']." ". $items['client_mi']." ". $items['client_lastname'] ?> </td>
                                        <td><?= $items['age']?></td>
                                        <td><?= $items['vaccine_name'] ?></td>
                                        <td><?= $items['hw_name']." ". $items['hw_mi']." ". $items['hw_lname'] ?></td>
                                        <td><?= $items['date_given'] ?></td>
                                        <td><?= $items['remarks'] ?></td>
                        

                                        
                                    </tr>
                                       <?php

                                            }
                                        }

?>


                                </tbody>
                            </table>

                            
                        </div>
                    </div>
           



        </div>
    </div>
    
    <div class="sidebar-overlay" data-reff=""></div>
    <div style="text-align: right;
height: 20px;
position:fixed;
margin:0px;
bottom:0px;">
    printed by: <?=$_SESSION['auth_user']['username'];?>
    | print date: <?php $today = date('M. d, Y');
    echo $today; ?>
</div>

    <?php include('includes/script.php') ?>
 
</body>



</html>