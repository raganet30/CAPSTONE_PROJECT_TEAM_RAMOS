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
                        <form action="edit-settings.php" method="POST">
<?php 


                                     $query="select * from settings limit 1 ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>  

                            <?php include('alert.php') ?>
                            <h3 class="page-title">Settings</h3>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Institution Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="<?php echo $row['name'] ?>"name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input class="form-control " value="<?php echo $row['contact_person'] ?>" type="text"name="contact_person">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control " value="<?php echo $row['address'] ?>" type="text"name="address">
                                    </div>
                                </div>
                                
                              
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="<?php echo $row['email'] ?>" type="email"name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" value="<?php echo $row['phone'] ?>" type="text"name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telephone Number</label>
                                        <input class="form-control" value="<?php echo $row['telephone'] ?>" type="text"name="telephone">
                                    </div>
                                </div>
                               
                            </div>
<?php 
    }

}
 ?>




                            <!---
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Website Url</label>
                                        <input class="form-control" value="https://www.cagsalaosaoE-HealthCare.com" type="text">
                                    </div>
                                </div>
                            </div>
                            -->


                              <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--use to get the user id-->




                            <div class="row">
                                <div class="col-sm-12 text-center m-t-20">
                                    <input type="submit" class="btn btn-primary submit-btn"name="save"value="Save">
                                </div>

                                <div class="col-sm-12 text-center m-t-20">
                                    <input type="submit" class="btn btn-danger submit-btn" name="cancel" value="Cancel">
                                </div>
                            </div>

                          
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