<!DOCTYPE html>
<html lang="en">


<?php 

    include('includes/head.php');
    include('currentdate.php'); 

    
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Immunization</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                        <form action="add-immunization-process.php" method="POST">
                             <div class="row">
                               
                                
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Client Name <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="search" id="search"placeholder="Search..."autocomplete="off" required >
                                        <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                        </div>

                                        


                                    </div>
                                </div>

                               
                                 <div class="col-sm-6 ">   
                                            <div class="form-group">
                                                <label>Vaccine<span class="text-danger">*</span></label>
                                                <select class="form-control select "name="vaccine_name">
                                                    <option selected="selected">Select Vaccine</option>
                                 <?php 
                                 $query="select * from vaccine order by vaccine_name asc";
                                
                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                 while ($row=mysqli_fetch_array($query_run))
                                                             {

                                                
                                            
                                 ?> 
                                                    
                                                    <option><?php echo $row['vaccine_name']?></option>
                                    <?php 
                                                }
                                            }
                              ?>                 
                                                   
                                                </select>
                                            </div>
                                 </div>
                           

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date Given<span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="date" name="date_given" value="<?php echo (isset($_GET['date_given']))?$_GET['date_given']:'';?>"  max="<?= date('Y-m-d');
                                             ?>">


                                        </div>
                                    </div>
                                    </div>

                                 <div class="col-sm-6 ">   
                                 <div class="form-group">
                                                <label>Vaccinator</label>
                                                <select name="vaccinator" class="form-control select" required="">
                                                    <?php 

                                                        
                                                         $query = "select hw_fname as fname, hw_mi as mi, hw_lname as lname from healthworker where  hw_status='Active' ";
                                                        $query_run = mysqli_query($con,$query);
                                                        if (mysqli_num_rows($query_run)>0) 
                                                        {
                                                             while ($row=mysqli_fetch_array($query_run))
                                                             {
                                                                
                                                            ?>
                                                            <option><?php echo $row['fname']." ".$row['mi']." ".$row['lname'] ?></option>


                                                            <?php
                                                          }  
                                                        }

                                                     ?>
                                                    
                                                </select>
                                            </div> 
                                        </div>  

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Remarks</label><span class="text-danger">*</span>
                                        <textarea class="form-control" type="text" name="remarks"required></textarea>
                                    </div>
                                </div>
                              
                                 <input type="hidden" name="vaccine_id"value="<?php echo $vaccine_id; ?>">
                                 
                            </div>

                            <div class="m-t-20 text-center">
                            <input type="submit" name="btn_save" class="btn btn-primary btn-lg "value="SAVE">

                            <a href="immunization.php" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>

                            <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--used to get the user id-->
                            
                            </form>
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