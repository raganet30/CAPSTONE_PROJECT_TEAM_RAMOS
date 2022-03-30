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
                            //echo "<h4>".$_SESSION["status"]."</h4>";
                            

                           /* echo "<div class='alert alert-success'>
  <strong>".$_SESSION["status"]."</strong>
</div>"; */                 if ($_SESSION['status']=="Data saved successfully!") 
                            {
   

                           ?>
                               <div class="alert alert-success alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong><?php echo $_SESSION["status"]; ?></strong> 
                                </div>

                           <?php 
                            unset($_SESSION['status']);
                            }

                            else
                            {
                            ?>
                               <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong><?php echo $_SESSION["status"]; ?></strong> 
                                </div>

                           <?php 
                            unset($_SESSION['status']);

                            }



                        }
                         ?>
                        </center>

                    <br>

                        <h4 class="page-title">Add Client</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">


                        <form action="add-client-process.php" method="POST">
                             <div class="row">
                               
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="fname" placeholder="Enter name" required="" >
                                    </div>
                                </div>

                               <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Middle Initial </label>
                                        <input class="form-control" type="text" name="mi" placeholder="Enter middle initial" maxlength="1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="lastname" required="" placeholder="Enter last name" >
                                    </div>
                                </div>


                               
                                <!--
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control" type="email" name="email" placeholder="Enter email">
                                    </div>
                                </div>
                                -->
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth<span class="text-danger">*</span></label>
                                        <div class="cal-icon">

                                            <!--

                                            <input type="date" class="form-control datetimepicker" name="dob" required="" >
                                            -->

                                            <input type="date" name="dob" value="<?php echo (isset($_GET['dob']))?$_GET['dob']:'';?>"  max="<?= date('Y-m-d');
                                             ?>">


                                        </div>
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="age" placeholder="Age is auto generated" readonly="" >
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:<span class="text-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="Male" checked>Male 
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" class="form-check-input" value="Female" >Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Baranggay</label><span class="text-danger">*</span></label>
                                                <select  name="brgy" class="form-control select">
                                                      <option selected="selected">Select Brgy.</option>
                                                   
                                                    
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
                                                <label>Street<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="street" required="" placeholder="Enter Street" >
                                            </div>
                                        </div>



                                         <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Purok</label><span class="text-danger">*</span></label>
                                                <select  name="purok" class="form-control select">
                                                    <option selected="selected">Select Purok</option>
                                                   
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
                                             <input class="form-control" type="text" name="mother" placeholder="Enter Mother`s name">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Father`s Name </label>
                                             <input class="form-control" type="text" name="father" placeholder="Enter Father`s name">
                                    </div>
                                </div>
                                        
                                  


                                 


                                        <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Joining Date </label>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="joindate" value="<?php echo (isset($_GET['joindate']))?$_GET['joindate']:'';?>" max="<?= date('Y-m-d');
                                             ?>">

            
                                        </div>
                                    </div>
                                </div>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" type="number" name="phone" required="" placeholder="Enter Phone Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="display-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="product_active" value="Active" checked>
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


                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">SAVE</button>


                            <a href="clients.php" class="btn btn-danger btn-lg">CANCEL</a>
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