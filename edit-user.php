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
                        <center>
                                <?php      
                        if(isset($_SESSION['status']))
                        {
                            echo "<h4>".$_SESSION["status"]."</h4>";
                            unset($_SESSION['status']);
                        }

                         ?>
                        </center>

                    <br>

                        <h4 class="page-title">Edit User</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
<?php 
   
   
        $id = $_POST['id'];

    



    $query="select  * from admin_user where id ='$id' ";

    $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>
                    <form action="edit-user-process.php" method="POST">
                             <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ID </label>
                                        <input class="form-control" type="text" name="id"  value="<?php echo  $_POST['id']

                                             ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input class="form-control" type="text" name="username"  value="<?php echo $row['username'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input class="form-control" type="password" name="password" value="<?php 
                                        echo $row['password']
                                         ?>"readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>New Password </label>
                                        <input class="form-control" type="password" name="new_password">
                                    </div>
                                </div>


                             
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control" type="email" name="email" value="<?php echo $row['email'] ?>">
                                    </div>
                                </div>

                                

                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Role </label>
                                       <select name="role" class="form-control select" required="">
                                        <option>Encoder</option>
                                        <option>Admin</option>
                                       </select>
                                    </div>
                                </div>



                                <?php 
                                if ($row['verify_status']=='1') 
                                {
                                  ?>
                                <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" checked="checked">
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>

                                  <?php  
                                }
                                else
                                {
                                    ?>
                                    <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="1" >
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="0"checked="checked">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>


                                    <?php
                                }
                             ?>

                                
                               <!--used to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                                <!--used to get the user id-->

                                
                            
                                </div>
                               
                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">UPDATE</button>


                            <a href="manage-users.php" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>
                            </div>

                            

                        </form>    

               <?php
               



            }
    }
    else
    {
        $_SESSION['status'] = "No record found!";
        header("location:edit-client.php");
    }

 ?>
 
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