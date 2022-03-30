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
                        <h4 class="page-title">Add BP Monitoring</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                        <form action="add-bp-process.php" method="POST">
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

                               
                                 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Pressure (SYSTOLIC-upper number)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="upperbp" min="40" max="250" >

                                        <label>Blood Pressure (DIASTOLIC-lower number)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="lowerbp"min="40" max="200" >
                                    </div>
                                </div>
                           

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="date" name="date" value="<?php echo (isset($_GET['date']))?$_GET['date']:'';?>"  max="<?= date('Y-m-d');
                                             ?>">


                                        </div>
                                    </div>
                                    </div>

                                 <div class="col-sm-6 ">   
                                 <div class="form-group">
                                                <label>BP Level</label>
                                                <select name="level" class="form-control select" required="">
                                                   <option selected="selected">Select</option>
                                                   <option>Low</option>
                                                   <option>Optimal</option>
                                                   <option>Normal</option>
                                                   <option>High Normal</option>
                                                   <option>Grade 1- Hypertension (mild)</option>
                                                   <option>Grade 2- Hypertension (moderate)</option>
                                                   <option>Grade 3- Hypertension (severe)</option>
                                                    
                                                </select>
                                            </div> 
                                        </div>  

                                 
                              
                                
                                 
                            </div>

                            <div class="m-t-20 text-center">
                            <input type="submit" name="btn_save" class="btn btn-primary btn-lg "value="SAVE">

                            <a href="bp-monitoring.php" class="btn btn-danger btn-lg">CANCEL</a>
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