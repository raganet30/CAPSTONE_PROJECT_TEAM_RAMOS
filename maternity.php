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
                    <div class="col-lg-8 offset-lg-2">
                     <?php include('alert.php') ?>
                   </div>
                </div>



                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Maternal Care</h4>

                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-maternity.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add list</a>
                    </div>
                </div>

                <!--SEARCH OPTION--->     <!--SEARCH OPTION--->
                <form action="" method="GET">
                <div class="row filter-row">

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Search</label>

                             
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
                                        <th>Maternity No.</th>
                                        <th>Name</th>
                                        <th>Body Mass Index</th>
                                        <th>Last Menstrual Period </th>
                                        <th>Expected Date of Delivery</th>
                                        <th>Pregnancy Number</th>
                                     
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
 <?php 
                                        if(isset($_GET['name']))
                                        {
                                            $values = $_GET['name'];
                                            $query="SELECT *
FROM maternity
INNER JOIN client
ON maternity.client_id = client.client_id where concat(client_fname,client_mi,client_lname)  like '%$values%'  " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>


                                    <tr>
                                        <td><?= $items['maternity_id'] ?></td>
                                        <td><?= $items['client_fname']." ".$items['client_mi']." ".$items['client_lname'] ?></td>
                                        <td><?= $items['maternity_bmi'] ?></td>
                                        <td><?= $items['maternity_mensdate'] ?></td>
                                        <td><?= $items['maternity_expectdate'] ?></td>
                                        <td><?= $items['maternity_pregnum'] ?></td>

                                        <form action="edit-maternity.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['maternity_id']

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
                                                        <td colspan="5">No record found</td>
                                                    </tr>
                                                

                                                <?php

                                            }

                                            ////////-ending////
                                        }

                                           else
                                        {
                                             $query="SELECT *
FROM maternity
INNER JOIN client
ON maternity.client_id = client.client_id  " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>


                                    <tr>
                                        <td><?= $items['maternity_id'] ?></td>
                                        <td><?= $items['client_fname']." ".$items['client_mi']." ".$items['client_lname'] ?></td>
                                        <td><?= $items['maternity_bmi'] ?></td>
                                        <td><?= $items['maternity_mensdate'] ?></td>
                                        <td><?= $items['maternity_expectdate'] ?></td>
                                        <td><?= $items['maternity_pregnum'] ?></td>

                                        <form action="edit-maternity.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['maternity_id']

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
                                                        <td colspan="4">No record found</td>
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