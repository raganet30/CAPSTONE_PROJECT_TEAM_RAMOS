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

                        <h4 class="page-title">Edit Client</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
<?php 
   

    $id = $_POST['id'];

    $query="select truncate(datediff(NOW(),client_bdate)/365.25,1) as age,client_id,client_fname,client_mi,client_lname,client_bdate,client_gender,client_brgy,client_street,client_purok,client_mother,client_father,client_phone,client_status,client_joindate from client where client_id ='$id' ";

    $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>
                    <form action="update-client-data.php" method="POST">
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
                                        <input class="form-control" type="text" name="fname"  value="<?php echo $row['client_fname'] ?>">
                                    </div>
                                </div>

                               <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Middle Initial </label>
                                        <input class="form-control" type="text" name="mi" value="<?php echo $row['client_mi'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="lastname" value="<?php echo $row['client_lname'] ?>" >
                                    </div>
                                </div>


                               

                              
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth: <?php echo  " ".$row['client_bdate'] ?></label>
                                        <div class="cal-icon">
                                            
                                            <!--
                                            <input type="datetimepicker" class="form-control datetimepicker" name="dob" value="<?php echo $row['client_bdate'] ?>" >
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
                                            if ($row['client_gender']=="Male") 
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
                                        
                                         <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Baranggay</label></label>
                                                <select  name="brgy" class="form-control select">
                                                      <option selected="selected"><?php echo $row['client_brgy'] ?></option>
                                                   
                                                    
                                                 <?php
                                                    // A sample product array
                                                    include('brgy_list.php');
        
                                                    // Iterating through the product array
                                                    foreach($brgy as $item){
                                                    ?>
                                                        <option><?php
                                                         echo $item ?>  
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>   

                                                    
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input type="text" class="form-control" name="street" value="<?php echo $row['client_street'] ?>" >
                                            </div>
                                        </div>



                                         <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Purok</label></label>
                                                <select  name="purok" class="form-control select">
                                                    <option selected="selected"><?php echo $row['client_purok']; ?></option>
                                                   
                                                 <?php
                                                    // A sample product array
                                                    $purok = array("1", "2", "3", "4","5","6","7","8","9","10","11","12","","13","14","15","16","17","18","19","20");
        
                                                    // Iterating through the product array
                                                    foreach($purok as $item){
                                                    //echo "<option value='</option>";
                                                        ?>
                                                        <option><?php
                                                         echo $item ?>  
                                                        </option>
                                                        <?php

                                                    }
                                                    ?>   

                                                    
                                                </select>
                                            </div>
                                        </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mother`s Name </label>
                                             <input class="form-control" type="text" name="mother" value="<?php echo $row['client_mother'] ?>">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Father`s Name </label>
                                             <input class="form-control" type="text" name="father" value="<?php echo $row['client_father'] ?>" >
                                    </div>
                                </div>




                                        <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Joining Date: <?php echo  " ".$row['client_joindate'] ?> </label>
                                        <div class="cal-icon">

                                            <!--
                                            <input class="form-control datetimepicker" type="datetimepicker" name="joindate" value="<?php echo $row['client_joindate'] ?>" >
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
                                        <input class="form-control" type="number" name="phone" value="<?php echo $row['client_phone'] ?>"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" >
                                    </div>
                                </div>
                                
                            </div>

                            



                            <?php 
                                if ($row['client_status']=="Active") 
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


                            <a href="clients.php" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>



                             <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--used to get the user id-->

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