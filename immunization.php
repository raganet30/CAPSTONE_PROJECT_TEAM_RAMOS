<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php');

 ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>

        <div class="page-wrapper">
         <div class="content">

            <div class="row">
                    <div class="col-lg-8 offset-lg-2">

            <?php include('alert.php') ?>
                   </div>
            </div>




                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Immunization</h4>

                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-immunization.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Immunization</a>
                    </div>
                </div>

                 <!--SEARCH OPTION--->     <!--SEARCH OPTION--->
                <form action="" method="GET">
                <div class="row filter-row">

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Search</label>

                             
                            <input type="text" class="form-control floating" name="search"   >

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
                                        <th>Immunization ID</th>
                                        <th>Client Name</th>
                                        <th>Age</th>
                                        <th>Vaccine</th>
                                        <th>Vaccinator</th>
                                        <th>Date Given</th>
                                        <th>Remarks</th>
                                        <th class="text-right">Action</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                       if(isset($_GET['search']))
                                        {
                                            $values = $_GET['search'];
                                            $query=" 
SELECT CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_immunization.client_immu_id as client_immu_id ,client.client_id as client_id,client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, client_immunization.client_immu_id as client_immu_id,vaccine.vaccine_name, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where concat(client.client_fname,client.client_mi,client.client_lname)  like '%$values%' " ;

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
                        

                                         <form action="edit-immunization.php" method="POST">

                                            <input type="hidden" name="client_immu_id" value="<?= $items['client_immu_id'] ?>"> 



                                            <td class="text-right">

                                            <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT">
                                                               
                                            </td>
                                        </form>
                                    </tr>
                                       <?php

                                            }
                                        }
                                    }


                                    else
                                    {
                                        $query=" 
SELECT CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_immunization.client_immu_id as client_immu_id ,client.client_id as client_id,client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, client_immunization.client_immu_id as client_immu_id,vaccine.vaccine_name, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id  " ;

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
                        

                                         <form action="edit-immunization.php" method="POST">

                                            <input type="hidden" name="client_immu_id" value="<?= $items['client_immu_id'] ?>"> 



                                            <td class="text-right">
                                            <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT">                   
                                            </td>
                                        </form>
                                    </tr>
                                       <?php

                                            }
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