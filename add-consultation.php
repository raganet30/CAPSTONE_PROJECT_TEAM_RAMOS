<!DOCTYPE html>
<html lang="en">



<?php include('includes/head.php'); 
include('authentication.php'); 
include('currentdate.php'); 
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




                        <h4 class="page-title">Add Consultation</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="add-consultation-process.php" method="POST">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        
                                    <label>Consultation no. </label>

                                        <input class="form-control" type="text" name="conid" value="<?php 
                                            $query = "select max(consultation_id) as id from consultation  ";
                                            $query_run = mysqli_query($con,$query);
                                             if ($query_run) 
                                             {
                                                 while ($row=mysqli_fetch_array($query_run)) 
                                                 {
                                                      
                                                         echo $row['id']+1;
                                               
                                                 }
                                             }  

                                         ?>" 
                                        readonly>
                                      

                                    </div>
                                </div>
                                


                              


                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="search" id="search"placeholder="Search..."autocomplete="off" required >
                                        <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                        </div>

                                        


                                    </div>
                                </div>

                                   

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Complaints<span class="text-danger">*</span></label>
                                        

                                        <textarea class="form-control" type="text" name="complaints"></textarea>
                                      

                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Pressure (SYSTOLIC-upper number)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="upperbp" min="40" max="250" >

                                        <label>Blood Pressure (DIASTOLIC-lower number)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="lowerbp"min="40" max="200" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Respiratory Rate</label>
                                        <input class="form-control" type="text" name="resp_rate" >
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Capilarry Refill</label>
                                        <input class="form-control" type="text" name="cap_refill">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Temperature (Celcius)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="temp"step=".01" >
                                    </div>
                                </div>

                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Weight(kg)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="weigth"step=".01">
                                    </div>
                                </div>


                                 

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pulse Rate</label>
                                        <input class="form-control" type="text" name="pulse_rate">
                                    </div>
                                </div>

                              
                                <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label>Doctor</label>
                                                <select name="doctor" class="form-control select" required="">
                                                    <?php 
                                                         $query = "select hw_fname as fname, hw_mi as mi, hw_lname as lname from healthworker where hw_designation='Doctor' and hw_status='Active' ";
                                                        $query_run = mysqli_query($con,$query);
                                                        if (mysqli_num_rows($query_run)>0) 
                                                        {
                                                             while ($row=mysqli_fetch_array($query_run))
                                                             {
                                                            ?>
                                                            <option><?php echo $row['fname']." ".$row['mi']." ".$row['lname'] ?></option>

                                                            <?php
                                                          }  
                                                        }

                                                     ?>
                                                    
                                                </select>
                                            </div>
                                </div>










                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Diagnosis</label><span class="text-danger">*</span>
                                       

                                        <textarea class="form-control" type="text" name="diagnosis"required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Treatment</label><span class="text-danger">*</span>
                                       
                                        <textarea class="form-control" type="text" name="treatment"required></textarea>
                                    </div>
                                </div>

                                
                                <!--
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Consultation Group</label>
                                                <select name="con_group" class="form-control select">
                                                    <option>Common Illness</option>
                                                    <option>Diabetic</option>
                                                    <option>BP MOnitoring</option>
                                                    <option>Post partum</option> 
                                                </select>
                                            </div>
                                    </div>
                                -->
                               

                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultation Date </label><span class="text-danger">*</span>
                                        <div class="cal-icon">
                                            <!---
                                            <input class="form-control datetimepicker" type="datetimepicker" name="joindate"  >
                                            -->

                                             <input type="date" name="consult_date" value="<?php echo (isset($_GET['consult_date']))?$_GET['consult_date']:'';?>" max="<?= date('Y-m-d');
                                             ?>"required>

                                        </div>
                                    </div>
                                </div>
                             

                               
                           
                        
                    </div>
                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">SAVE</button>


                            <a href="consultation.php" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>

                             <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--used to get the user id-->

                              
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