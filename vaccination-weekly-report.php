<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php') ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>

        <div class="page-wrapper">
         <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Weekly Immunization Report</h4>
                    </div>
                    
                </div>

            


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">


                            <div class="card-header">
                                <center>
                                    <i class="fas fa-table me-1"></i>
                                WEEKLY IMMUNIZATION REPORT  <?php 
                               $dayofweek = 'Week'.' '.date('w M Y');
                               echo $dayofweek;
                                ?> 
                                </center>
                                
                            </div>

                            <table class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>Immunization ID</th>
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

                                  
$cnt=0;
                                           
$query=" SELECT CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_immunization.client_immu_id as client_immu_id ,client.client_id as client_id,client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, client_immunization.client_immu_id as client_immu_id,vaccine.vaccine_name, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where YEARWEEK(client_immu_date) = YEARWEEK(NOW()) " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {
                                               
                                                foreach($query_run as $items)
                                                {
                                                    $cnt++;
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
                            <?php 
                              
                                    if ($cnt>0) 
                                    {
                                        ?>
                                      <div class="col-sm-6 col-md-3">
                                    <a href="print-immu-weekly-report.php"  target="_blank" class="btn btn-secondary btn-block"  ><i class="fas fa-print"></i> PRINT REPORT</a> 
                                    </div>


                                    <?php
                                    }
                            
                             ?>


                        </div>
                    </div>
                </div>
            </div>   




        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>