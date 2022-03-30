<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php') ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>
<?php include('currentdate.php') ?>

        <div class="page-wrapper">
         <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Monthly Consultation Report</h4>
                    </div>
                   
                   
                </div>

                <!-- start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            

                            <div class="card-header">
                                <center>
                                    <i class="fas fa-table me-1"></i>
                               MONTHLY INDIVIDUAL TREATMENT/CONSULTATION REPORT  <?php echo date('M Y'); ?> </center>
                                
                            </div>
                            <table class="table table-border table-striped custom-table datatable mb-0">

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

$cnt=0;                               
           
$query="select consultation.consultation_id as con_id, consultation.consultation_diag as diagnoses, consultation.consultation_treatment as treatment, client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, consultation.consultation_complaints as complaints, consultation.consultation_upperbp as upperbp, consultation.consultation_lowerbp as lowerbp, healthworker.hw_fname as docname, healthworker.hw_mi as docmi, healthworker.hw_lname as doclname
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id where MONTH(consultation_date) = MONTH(CURRENT_DATE()) AND YEAR(consultation_date) = YEAR(CURRENT_DATE()) order by consultation_id asc " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {
                                                
                                                foreach($query_run as $items)
                                                {
                                                    $cnt++;
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

                            <?php
                            if($cnt>0)
                            {
                                ?>                
                                    <div class="col-sm-6 col-md-3">    
                                    <a href="print-cons-monthly-report.php"  target="_blank" class="btn btn-secondary btn-block"  ><i class="fas fa-print"></i> PRINT REPORT</a> 
                                    </div>
                                <?php
                                }
                            ?>

                        </div>
                    </div>
                </div>
                   
<!-- end -->
 
        </div>
                    </div>
                </div>

  
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>