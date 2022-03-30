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
                     
                        <h4 class="page-title">Clients</h4>
                    
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-client.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Client</a>
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
                            <table id="datatableID" class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Baranggay</th>
                                    
                                        <th>Status</th>
                                        <th>Total Visits</th>
                                        <th>Last Visit</th>
                                     
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  

                                     <?php //filters-use to search names 
                                        if (isset($_GET['name'])) 
                                        {
                                            $values = $_GET['name'];
                                            $query = "select CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_id,client_fname,client_mi,client_lname,client_brgy,client_phone,client_status   from client where concat(client_fname,client_mi,client_lname)  like '%$values%'  ";
                                            $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>

                                                    <td><?= $items['client_id'] ?></td>
                                                    <td><?= $items['client_fname']." ".$items['client_mi']." ".$items['client_lname'] ?></td>

                                                    

                                                    <td><?= 

                                                    $items['age']

                                                     ?></td>
                                                    <td><?= $items['client_brgy'] ?></td>
                                                    <td><?= $items['client_status'] ?></td>

                                                    <td>
                                                         <?php
                                $id =$items['client_id'];  
                                    $rt = mysqli_query($con," select * from visit   where client_id='$id'  ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                        ?>
                                                    </td>

                                                 <td>
                                                     
                                                     <?php
  
 
    $query="select max(visit_date) as maxdate from visit  where client_id='$id' ";
                                        $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                            {
                                               echo $row['maxdate']; 
                                            }
                                        }
   

 ?> 
                                                 </td>


                                                    




                                                    <form action="edit-client.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['client_id']

                                             ?>">  



                                             

                                                    <td class="text-right">

                                            
                                                        <?php
                                             $clientid=$items['client_id']; 
                                             $query = " select * from history where client_id='$clientid'  ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)>=1) 
         {
            ?>
                                                         <a href="history.php?id=<?php echo $items['client_id'] ?>"><button type="button" class="btn btn-secondary btn-sm">VIEW HISTORY</button></a>

                                                          <?php

         }
                                              ?>




                                                <?php
                                             $clientid=$items['client_id']; 
                                             $query = " select * from client_immunization where client_id='$clientid'  ";
                                                $count_query_run=mysqli_query($con,$query);

                                                if (mysqli_num_rows($count_query_run)>=1) 
                                                {
                                                    ?>
                                                         <a href="client_immu_records.php?id=<?php echo $items['client_id'] ?>"><button type="button" class="btn btn-success btn-sm">VIEW IMMUNIZATION</button></a>

                                                          <?php

                                                }
                                              ?>











                                                         
                                                        <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT CLIENT">


   
   
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
                                            
                                            $query = "select CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_id,client_fname,client_mi,client_lname,client_brgy,client_phone,client_status   from client    ";
                                            $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>

                                                    <td><?= $items['client_id'] ?></td>
                                                    <td><?= $items['client_fname']." ".$items['client_mi']." ".$items['client_lname'] ?></td>

                                                    

                                                    <td><?= 

                                                    $items['age']

                                                     ?></td>
                                                    <td><?= $items['client_brgy'] ?></td>
                                                    <td><?= $items['client_status'] ?></td>

                                                    <td>
                                                         <?php
                                $id =$items['client_id'];  
                                    $rt = mysqli_query($con," select * from visit   where client_id='$id'  ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                        ?>
                                                    </td>

                                                 <td>
                                                     
                                                     <?php
  
 
    $query="select max(visit_date) as maxdate from visit  where client_id='$id' ";
                                        $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                            {
                                               echo $row['maxdate']; 
                                            }
                                        }
   

 ?> 
                                                 </td>


                                                    




                                                    <form action="edit-client.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['client_id']

                                             ?>">  



                                             

                                                    <td class="text-right">

                                                        <?php
                                             $clientid=$items['client_id']; 
                                             $query = " select * from history where client_id='$clientid'  ";
         $count_query_run=mysqli_query($con,$query);

         if (mysqli_num_rows($count_query_run)>=1) 
         {
            ?>
                                                         <a href="history.php?id=<?php echo $items['client_id'] ?>"><button type="button" class="btn btn-secondary btn-sm">VIEW HISTORY</button></a>

                                                          <?php

         }
                                              ?>


                                                    <?php
                                             $clientid=$items['client_id']; 
                                             $query = " select * from client_immunization where client_id='$clientid'  ";
                                                $count_query_run=mysqli_query($con,$query);

                                                if (mysqli_num_rows($count_query_run)>=1) 
                                                {
                                                    ?>
                                                         <a href="client_immu_records.php?id=<?php echo $items['client_id'] ?>"><button type="button" class="btn btn-success btn-sm">VIEW IMMUNIZATION</button></a>

                                                          <?php

                                                }
                                              ?>






                                                         
                                                        <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT CLIENT">
   
   
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

 <script >
            $(document).ready(function() {
    $('#datatableID').DataTable();
} );

    </script>

</html>