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
                        <h4 class="page-title">Weekly BP Monitoring Report</h4>
                    </div>
                   
                </div>






                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            

                            <div class="card-header">
                                <center>
                                    <i class="fas fa-table me-1"></i>
                                MONTHLY BP MONITORING REPORT <?php 
                               $dayofweek = 'Week'.' '.date('w M Y');
                               echo $dayofweek;
                                ?>
                                </center>
                                
                            </div>
                            <table class="table table-border table-striped custom-table datatable mb-0">

                                <thead>

                                    <tr>
                                        <th>BP Monitoring No.</th>
                                        <th>Client Name</th>
                                        <th>BP</th>
                                        <th>BP Condition Level</th>
                                        <th>Date </th>
                              
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php

$cnt=0;


                                            $query="SELECT *
FROM bp_monitoring
INNER JOIN client
ON bp_monitoring.client_id = client.client_id where YEARWEEK(date) = YEARWEEK(NOW()) " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {
                                                
                                                foreach($query_run as $items)
                                                {
                                                  
                                                    $cnt++;
                                                    ?>
                                                    <tr>
                                                    <td><?= $items['id'] ?></td>
                                                    <td><?= $items['client_fname']." ". $items['client_mi']." ". $items['client_lname'] ?></td>
                                                    <td><?= $items['upperbp']."/".$items['lowerbp'] ?></td>
                                                    <td><?= $items['level'] ?></td>
                                                    <td><?= $items['date'] ?></td>
                                                    
                                                   
                                                  


                                        
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

                                            ////////-ending////
                                     
                                        ?>
                                        





                                    
                                    



                                



                                </tbody>
                            </table>
                          


                        </div>
                    </div>
                </div>



            </div>   

                         <?php
                            if($cnt>0)
                            {
                                ?>
                                    <div class="col-sm-6 col-md-3">
                                    <a href="print-bp-weekly-report.php"  target="_blank" class="btn btn-secondary btn-block"  ><i class="fas fa-print"></i> PRINT REPORT</a> 
                                    </div>
                                <?php
                            }
                        ?>

        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>