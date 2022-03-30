<!DOCTYPE html>
<html lang="en">


<?php 
session_start();
include('includes/head.php');
include('dbcon.php');

?>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">




                    <form class="form-signin" action="reset-password.php" method="POST">
                        <div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">


                            <center>
                                <?php      
                        if(isset($_SESSION['status']))
                        {
                            echo "<h4>".$_SESSION["status"]."</h4>";
                            unset($_SESSION['status']);
                        }

                         ?>
                            </center>

                            <h4>Change Password</h4>

                           
                        </div>

                        <div class="form-group">
                            <label>Token</label>
                            <input type="text" name="token"
                            value=" <?php 
                                        if(isset($_GET['token']))
                                        {
                                            echo trim($_GET['token']);
                                        }
                                ?> "
                             class="form-control" readonly="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" 
                            value=" <?php 
                                        if(isset($_GET['email']))
                                        {
                                            echo $_GET['email'];
                                        }
                                ?> "
                            class="form-control"readonly>
                        </div>




                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control"required="">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_password" class="form-control"required="">
                        </div>




                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit" name="save_pass"> Save</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="login.php">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>