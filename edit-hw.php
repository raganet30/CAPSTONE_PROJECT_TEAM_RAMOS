<!DOCTYPE html>
<html lang="en">


<?php 
//session_start();
include('includes/head.php');
include('authentication.php');
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

                    <br>

                        <h4 class="page-title">Edit Client</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
<?php 
   

    $id = $_POST['id'];

   $query="select truncate(datediff(NOW(),hw_bdate)/365.25,1) as age,hw_id,hw_fname,hw_mi,hw_lname,hw_email,hw_bdate,hw_gender,hw_brgy,hw_city,hw_province,hw_phone,hw_status,hw_joindate,hw_designation from healthworker where hw_id ='$id' ";





    $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>
                    <form action="update-hw-data.php" method="POST">
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
                                        <label>First Name </label>
                                        <input class="form-control" type="text" name="fname"  value="<?php echo $row['hw_fname'] ?>">
                                    </div>
                                </div>

                               <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Middle Initial </label>
                                        <input class="form-control" type="text" name="mi" value="<?php echo $row['hw_mi'] ?>" maxlength="1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="lastname" value="<?php echo $row['hw_lname'] ?>" >
                                    </div>
                                </div>


                               

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control" type="email" name="email" value="<?php echo $row['hw_email'] ?>">
                                    </div>
                                </div>
                                
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth: <?php echo  " ".$row['hw_bdate'] ?></label>
                                        <div class="cal-icon">
                                            
                                            <!--
                                            <input type="datetimepicker" class="form-control datetimepicker" name="dob" value="<?php echo $row['person_bdate'] ?>" >
                                            -->


                                            
                                            <input type="date" name="dob" value="<?php echo (isset($_GET['dob']))?$_GET['dob']:'';?>"max="<?= date('Y-m-d');
                                             ?>">
                                            





                                        </div>
                                    </div>
                                </div>




                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age </label>
                                        <input class="form-control" type="text" name="age" value="<?php echo $row['age'] ?>" readonly >
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>

                                        <?php 
                                            if ($row['hw_gender']=="Male") 
                                            {
                                                ?>
                                            <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="Male" checked="checked">Male 
                                            </label>
                                            </div>

                                            <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="Female" >Female
                                            </label>
                                            </div>

                                                <?php  
                                            }
                                            else
                                            {
                                                ?>
                                            <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="Male" >Male 
                                            </label>
                                            </div>

                                            <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="Female" checked="checked">Female
                                            </label>
                                            </div>
                                                

                                               <?php   
                                            }
                                         ?>
                                            

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Baranggay</label>
                                                <input type="text" class="form-control" name="barangay" value="<?php echo $row['hw_brgy'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" value="<?php echo $row['hw_city'] ?>" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Province</label>
                                                <input type="text" class="form-control" name="province" value="<?php echo $row['hw_province'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Joining Date: <?php echo  " ".$row['hw_joindate'] ?> </label>
                                        <div class="cal-icon">

                                            <!--
                                            <input class="form-control datetimepicker" type="datetimepicker" name="joindate" value="<?php echo $row['hw_joindate'] ?>" >
                                            -->

                                            <input type="date" name="joindate" value="<?php echo (isset($_GET['joindate']))?$_GET['joindate']:'';?>" max="<?= date('Y-m-d');
                                             ?>" >


                                        </div>
                                    </div>
                                </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number </label>
                                        <input class="form-control" type="number" name="phone" value="<?php echo $row['hw_phone'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" >
                                    </div>
                                </div>


                                  <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Role: <?php echo $row['hw_designation']; ?></label>
                                                <select name="role" class="form-control select">
                                                    <option>Nurse</option>
                                                    <option>BHW</option>
                                                    <option>Midwfe</option>
                                                    <option>Doctor</option>
                                                </select>
                                            </div>
                                </div>

                                
                            </div>







                            <?php 
                                if ($row['hw_status']=="Active") 
                                {
                                  ?>
                                <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked="checked">
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive">
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
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" >
                                    <label class="form-check-label" for="product_active">
                                    Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_inactive" value="Inactive"checked="checked">
                                    <label class="form-check-label" for="product_inactive">
                                    Inactive
                                    </label>
                                </div>
                            </div>


                                    <?php
                                }
                             ?>




                            







                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">UPDATE</button>


                            <a href="healthworkers.php" class="btn btn-danger btn-lg">CANCEL</a>
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