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
                        <h4 class="page-title">Custom Consultation Report</h4>
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
                                INDIVIDUAL TREATMENT/CONSULTATION REPORT from <?php echo $_POST['from'] ?> to <?php echo $_POST['to']; ?>
                                </center>
                                
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

                                    $f1="00:00:00";
                                    $t1="23:59:59";
                                    $from=$_POST['from']." ".$f1;
                                    $to=$_POST['to']." ".$t1;
                                        


           
                                            $query="select consultation.consultation_id as con_id, consultation.consultation_diag as diagnoses, consultation.consultation_treatment as treatment, client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, consultation.consultation_complaints as complaints, consultation.consultation_upperbp as upperbp, consultation.consultation_lowerbp as lowerbp, healthworker.hw_fname as docname, healthworker.hw_mi as docmi, healthworker.hw_lname as doclname
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id where consultation_date between '$from' and '$to' order by consultation_id asc " ;

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
                                        <a href="print-cons-report.php"  target="_blank" class="btn btn-secondary btn-block"  ><i class="fas fa-print"></i> PRINT REPORT</a> 
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