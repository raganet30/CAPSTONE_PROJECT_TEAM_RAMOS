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
                        <h4 class="page-title">Custom BP Monitoring Report</h4>
                    </div>
                   
                </div>

                <!--SEARCH OPTION--->     <!--SEARCH OPTION--->
                <form method="POST">
                    
         
                        <div class="row filter-row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-focus">
                                    <label >From:</label>
                                    <div class="cal-icon">
                                       <input type="date" name="from" value="<?php echo (isset($_GET['from']))?$_GET['from']:'';?>" max="<?= date('Y-m-d');
                                                     ?>"required>

                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group form-focus">
                                    <label >To:</label>

                                    <div class="cal-icon">

                                       <input type="date" name="to" value="<?php echo (isset($_GET['to']))?$_GET['to']:'';?>" max="<?= date('Y-m-d');
                                                     ?>"required>

                                    </div>

                                </div>
                            </div>
                            

                           
                            <div class="col-sm-6 col-md-3">
                                <input type="submit" name="generate" class="btn btn-success btn-block" value="Generate Report " >
                            </div>


                         
                           





                        </div>
                </form>
                    <!--SEARCH OPTION--->    <!--SEARCH OPTION--->

 <?php
                                    
                                   if(isset($_POST['generate']))
                                   {


                                  

                                    ?>


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            

                            <div class="card-header">
                                <center>
                                    <i class="fas fa-table me-1"></i>
                                BP MONITORING REPORT from <?php echo $_POST['from'] ?> to <?php echo $_POST['to']; ?>
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
                                    $f1="00:00:00";
                                    $t1="23:59:59";
                                    $from=$_POST['from']." ".$f1;
                                    $to=$_POST['to']." ".$t1;
                                        


           
                                            $query="SELECT *
FROM bp_monitoring
INNER JOIN client
ON bp_monitoring.client_id = client.client_id where date between '$from' and '$to' " ;

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


                                    
                                   }

                                    else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="6">Please select dates to generate report.</td>
                                                    </tr>
                                                

                                                <?php

                                            }



                                     
                                        ?>
                                        





                                    
                                    



                                



                                </tbody>
                            </table>
                            <?php 
                                if(isset($_POST['generate']))
                                {
                                    if ($cnt>0) 
                                    {
                                        $_SESSION['from']= $_POST['from'];
                                        $_SESSION['to']=$_POST['to']; ?>
                                      <div class="col-sm-6 col-md-3">
                                    <a href="print-bp-report.php"  target="_blank" class="btn btn-secondary btn-block"  ><i class="fas fa-print"></i> PRINT REPORT</a> 
                                    </div>
                                    <?php
                                    }
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