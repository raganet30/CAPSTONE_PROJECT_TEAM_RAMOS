<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php');
    session_start();
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
                    <div class="col-sm-12">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                </div>


                <form action="edit-profile-process.php" method="POST">
                    <div class="card-box">
                        <h3 class="card-title">User Profile</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                    </div>
                                </div>
<?php 
$id= intval($_GET['id']);
                                    $query="select * from admin_user where id='$id' limit 1 ";
                                    $query_run=mysqli_query($con,$query);

                                    if ($query_run) 
                                    {
                                        while ($row=mysqli_fetch_array($query_run)) 
                                        {


 ?>                


                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Username</label>
                                                <input type="text" class="form-control floating" value="<?php echo $row['username'] ?>"  name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">ROLE</label>
                                                <input type="text" class="form-control floating" value="<?php echo $row['role'] ?>" readonly="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Old Password</label>
                                                <input type="password" class="form-control floating"  required="" name="password">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">New Password</label>
                                                <input type="password" class="form-control floating"  required=""name="new_password">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <label class="focus-label">Confirm New Password</label>
                                                <input type="password" class="form-control floating"  required="" name="con_password" >
                                            </div>
                                        </div>


                                        <input type="hidden" name="oldpass" value="<?php echo $row['password'] ?>">
                           <?php 
                                    }
                                }

                            ?>
                                        

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                    

                    <div class="text-center m-t-20">
                        <div class="col-sm-12 text-center m-t-20">
                                    <input type="submit" class="btn btn-primary submit-btn"name="save"value="Save">
                                </div>

                                <div class="col-sm-12 text-center m-t-20">


                                    <a href="index.php" class="btn btn-danger submit-btn" >CANCEL</a>

                                </div>
                    </div>


                    <input type="hidden" name="id" value="<?php echo $id; ?>">


                     <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                    <!--used to get the user id-->



                </form>
            </div>






        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>

</body>



</html>