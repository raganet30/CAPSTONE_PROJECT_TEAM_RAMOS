<!DOCTYPE html>
<html lang="en">


<?php 
session_start();

if(isset($_SESSION['authenticated']))
    {

        //$_SESSION['status'] ="You are already logged in!";
        header("location:index.php");
        exit(0);

    }







include('includes/head.php') 
?>

<body>
     <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">


                    <form action="logincode.php"  class="form-signin" method="POST">
                        <div class="account-logo">
                            <a href="index.php"><img src="assets/img/logo-dark.png" alt=""></a>
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


                            <label>Username</label>
                            <input type="text" autofocus="" name="username" required="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" required="" class="form-control">
                        </div>

                        <div class="form-group text-right">
                            <a href="forgot-password.php">Forgot your password?</a>
                        </div>

                        <div class="form-group text-center">
                             <a href="index.php">
                            <button type="submit" name="login_btn" class="btn btn-primary account-btn">Login</button>
                            </a>
                        </div>

                       <!--
                        <div class="text-center register-link">
                            Don’t have an account? <a href="register.php">Register Now</a>
                        </div>
                        -->

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>