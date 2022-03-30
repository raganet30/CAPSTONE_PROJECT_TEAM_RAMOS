<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php') ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php');
include('authentication.php');
 ?>

        <div class="page-wrapper">
         <div class="content">
            <div class="row">
                    
                    <div class="col-lg-8 offset-lg-2">
                     <?php include('alert.php') ?>
                    </div>


                   </div>

                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Consultation</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-consultation.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Consultation</a>
                    </div>
                </div>

                <!--SEARCH OPTION--->     <!--SEARCH OPTION--->
                <form action="" method="GET">
                <div class="row filter-row">

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Name</label>
                            <input type="text" class="form-control floating" name="name"   >

                        </div>
                    </div>
                  
             <div class="col-sm-6 col-md-3">

                     
                        <button type="submit" class="btn btn-light " name="btn_search">
                             <i class="fas fa-search fa-2x"></i>
                        </button>



                       
                    </div>
                </div>

                </form>

                <!--SEARCH OPTION--->    <!--SEARCH OPTION--->





                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>Consultation No.</th>
                                        <th>Name</th>
                                        <th>Complaints</th>
                                        <th>Diagnosis</th>
                                        <th>Treatment</th>
                                        <th>Doctor</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php 
                                        if(isset($_GET['name']))
                                        {
                                            $values = $_GET['name'];
                                            $query="select consultation.consultation_id as con_id, consultation.consultation_diag as diagnoses, consultation.consultation_treatment as treatment, client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, consultation.consultation_complaints as complaints, healthworker.hw_fname as docname, healthworker.hw_mi as docmi, healthworker.hw_lname as doclname
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id   where concat(client.client_fname,client.client_mi,client.client_lname)  like '%$values%'" ;

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
                                                    <td><?= $items['diagnoses'] ?></td>
                                                    <td><?= $items['treatment'] ?></td>
                                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?= $items['docname']." ". $items['docmi']." ". $items['doclname'].",M.D." ?></td>

                                                    <form action="edit-cons.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['con_id']

                                             ?>">   
                                                    <td class="text-right">
                                                        <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT">

                                                        
                                                    </td>
                                                    </form>



                                        
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
                                           // $values = $_GET['name'];
                                            $query="select consultation.consultation_id as con_id, consultation.consultation_diag as diagnoses, consultation.consultation_treatment as treatment, client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, consultation.consultation_complaints as complaints, healthworker.hw_fname as docname, healthworker.hw_mi as docmi, healthworker.hw_lname as doclname
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id";

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
                                                    <td><?= $items['diagnoses'] ?></td>
                                                    <td><?= $items['treatment'] ?></td>
                                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?= $items['docname']." ". $items['docmi']." ". $items['doclname'].",M.D." ?></td>

                                                    <form action="edit-cons.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['con_id']

                                             ?>">   
                                                    <td class="text-right">
                                                        <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT">

                                                        
                                                    </td>
                                                    </form>



                                        
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




                                        }        

                                    ?>






                                    
                                    



                                



                                </tbody>
                            </table>
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