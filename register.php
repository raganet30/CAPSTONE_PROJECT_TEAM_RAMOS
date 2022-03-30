<!DOCTYPE html>
<html lang="en">



<?php include('includes/head.php'); 
include('authentication.php'); 

?>


<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php');
 
 ?>


        <div class="page-wrapper">
         <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <?php include('alert.php') ?>




                        <h4 class="page-title">Register User</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="code.php" class="form-signin" method="POST"> 
                       
                        <div class="form-group">

                          
                            
                             
                            <label>Username<span class="text-danger">*</span></label>
                            <input type="text" name="username" class="form-control" required="">
                        </div>

                        <div class="form-group">
                            <label>Role<span class="text-danger">*</span></label>
                            <select name="role" class="form-control select" required="">
                                <option>Encoder</option>
                                <option>Admin</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Email Address<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control"required="">
                        </div>

                        <div class="form-group">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control"required="">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="con_password" class="form-control"required="">
                        </div>

                       

                        

                        <div class="m-t-20 text-center">
                            <input type="submit" name="register_btn" class="btn btn-primary btn-lg"value="Register">


                            <a href="manage-users.php" class="btn btn-danger btn-lg">CANCEL</a>
                        </div>
                    </form>
                    </div>
            </div>   




        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>