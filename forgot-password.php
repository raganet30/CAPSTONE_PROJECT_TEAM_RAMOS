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


                            <label>Enter Your Email</label>
                            <input type="text" name="email" class="form-control" autofocus>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit" name="btn_reset">Send Password Reset Link</button>
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