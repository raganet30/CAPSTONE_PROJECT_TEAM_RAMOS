<!DOCTYPE html>
<html lang="en">


<?php 
//include('dbcon.php');
include('includes/head.php');
include('authentication.php');
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


                    <br>
                <div class="row">
                    <div class="col-sm-4 col-3">
                     
                        <h4 class="page-title">Health Workers</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-hw.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add HW</a>
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

                     
                        <button type="submit" class="btn btn-light " name="btn_search" >
                             <i class="fas fa-search fa-2x"></i>
                        </button>



                       
                    </div>
                </div>

                </form>

                <!--SEARCH OPTION--->    <!--SEARCH OPTION--->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="datatableID" class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  

                                     <?php //filters-use to search names 
                                        if (isset($_GET['name'])) 
                                        {
                                            $values = $_GET['name'];
                                            $query = "select * from healthworker where concat(hw_fname,hw_mi,hw_lname)  like '%$values%'  ";
                                            $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>

                                                    <td><?= $items['hw_id'] ?></td>
                                                    <td><?= $items['hw_fname']." ".$items['hw_mi']."."." ".$items['hw_lname'] ?></td>

                                                    

                                                    <td><?= $items['hw_designation'] ?></td>
                                                    <td><?= $items['hw_brgy'].", ".$items['hw_city'] ?></td>
                                                    <td><?= $items['hw_phone'] ?></td>
                                                    <td><?= $items['hw_status'] ?></td>




                                                    <form action="edit-client.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['hw_id']

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

                                        else
                                        {
                                             $query="select * from healthworker ";
                                        $query_run=mysqli_query($con,$query);

                                        if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                            {?>

                                                  <tr>
                                        <td><?php echo $row['hw_id'] ?></td>
                                        <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php echo $row['hw_fname']." ".$row['hw_mi']."."." ".$row['hw_lname'] ?></td>
                                        <td><?php echo $row['hw_designation'] ?></td>
                                        <td><?php echo $row['hw_brgy'].", ".$row['hw_city'] ?></td>
                                        <td><?php echo $row['hw_phone'] ?></td>
                                        <td><?php echo $row['hw_status'] ?></td>




                                        <form action="edit-hw.php" method="POST">

                                            <input type="hidden" name="id" value="<?php echo  $row['hw_id']

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
                                            echo "No record found.";
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

 <script >
            $(document).ready(function() {
    $('#datatableID').DataTable();
} );

    </script>

</html>