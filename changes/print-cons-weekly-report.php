<?php 
	session_start();
 ?>


 <!DOCTYPE html>
<html lang="en">

<?php include('dbcon.php') ?>
<?php include('includes/head.php') ?>

<body onload="window.print()">
    <div class="main-wrapper">



<?php include('currentdate.php') ?>

      
                

               


                <!-- start -->
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
                        WEEKLY INDIVIDUAL TREATMENT/CONSULTATION REPORT  <?php 
                               $dayofweek = 'Week'.' '.date('w M Y');
                               echo $dayofweek;
                                ?>
                        </center>
                        <?php 
                        }
                        }
                        ?>                               
                        </div>
                            <table class="table table-border">

                                <thead>

                                    <tr>
                                        <th>Consultation No.</th>
                                        <th>Name</th>
                                        <th>Complaints</th>
                                        <th>BP</th>
                                        <th>Diagnosis</th>
                                        <th>Treatment</th>
                                        <th>Doctor</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php

                                
           
$query="select consultation.consultation_id as con_id, consultation.consultation_diag as diagnoses, consultation.consultation_treatment as treatment, client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, consultation.consultation_complaints as complaints, consultation.consultation_upperbp as upperbp, consultation.consultation_lowerbp as lowerbp, healthworker.hw_fname as docname, healthworker.hw_mi as docmi, healthworker.hw_lname as doclname
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id where MONTH(consultation_date) = MONTH(CURRENT_DATE()) AND YEAR(consultation_date) = YEAR(CURRENT_DATE()) order by consultation_id asc " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                    <td><?= $items['con_id'] ?></td>
                                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?= $items['client_name']." ". $items['client_mi']." ". $items['client_lastname'] ?></td>
                                                    <td><?= $items['complaints'] ?></td>
                                                    <td><?= $items['upperbp']."/".$items['lowerbp'] ?></td>
                                                    <td><?= $items['diagnoses'] ?></td>
                                                    <td><?= $items['treatment'] ?></td>
                                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?= $items['docname']." ". $items['docmi']." ". $items['doclname'].",M.D." ?></td>



                                        
                                                </tr>


                                                    <?php
                                                }
                                            }

                                             else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="6">No record found</td>
                                                    </tr>
                                                

                                                <?php

                                            }

                                            ////////-ending///

                                     
                                        ?>


                                </tbody>
                            </table>


                         
                        </div>
                    </div>
                </div>
                   
<!-- end -->
 
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>


<div style="text-align: right;
height: 20px;
position:fixed;
margin:0px;
bottom:0px;">
    printed by: <?=$_SESSION['auth_user']['username'];?>
    | print date: <?php $today = date('M. d, Y');
    echo $today; ?>
</div>
  
</body>



</html>