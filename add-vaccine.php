<!DOCTYPE html>
<html lang="en">


<?php 
//session_start();
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
                    <br>

                        <h4 class="page-title">Add Vaccine</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">


                        <form action="add-vaccine-process.php" method="POST">
                             <div class="row">
                               
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Vaccine Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" placeholder="Enter vaccine name" required="" >
                                    </div>
                                </div>

                               <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Dosage </label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="dosage" placeholder="Enter Dosage"step=".01"required>
                                    </div>
                                </div>

                                <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Vaccine Brand </label><span class="text-danger">*</span>
                                        <input class="form-control" type="text" name="brand" placeholder="Enter Vaccine Brand" required="">
                                    </div>
                                </div>
                                
                               <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Dosage Type:<span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="dose-type" class="form-check-input" value="drops" checked>drops 
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="dose-type" class="form-check-input" value="ml" >ml
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                

                            </div>

                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">SAVE</button>


                            <a href="vaccine.php" class="btn btn-danger btn-lg">CANCEL</a>
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