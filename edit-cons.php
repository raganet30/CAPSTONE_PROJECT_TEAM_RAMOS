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
            <div class="col-lg-8 offset-lg-2">
                         <div class="col-lg-8 offset-lg-2">
                     <?php include('alert.php') ?>
                   </div>
                   </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Consultation</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

<?php 
   

    $id = $_POST['id'];

    $query=" select  consultation.consultation_diag as diagnoses, consultation.consultation_treatment as treatment, client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, consultation.consultation_complaints as complaints, consultation.consultation_upperbp as upperbp, consultation.consultation_lowerbp as lowerbp,consultation.consultation_resprate as resprate, consultation.consultation_cr as cr, consultation.consultation_temp as temp, consultation.consultation_weight as weight, consultation.consultation_prate as prate,  consultation.consultation_date as cdate, healthworker.hw_id as docid, healthworker.hw_fname as docname, healthworker.hw_mi as docmi, healthworker.hw_lname as doclname
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id where consultation_id='$id' ";

    $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>

                        <form action="edit-consultation-process.php" method="POST">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        
                                    <label>Consultation no. </label>

                                        <input class="form-control" type="text" name="con_id" value="<?php 
                                           echo $_POST['id'];

                                         ?>" 
                                        readonly>
                                      

                                    </div>
                                </div>
                                


                              


                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Name </label>

                                        <input class="form-control" type="text" name="search" id="search"placeholder="Search..."autocomplete="off" value="<?php echo $row['client_name']." ".$row['client_mi']." ".$row['client_lastname']  ?>"  >
                                        <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                        </div>

                                        


                                    </div>
                                </div>

                                   

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Complaints<span class="text-danger">*</span></label>
                                        

                                        <textarea class="form-control" type="text" name="complaints" ><?php echo $row['complaints'] ?>
                                        </textarea>
                                      

                                    </div>
                                </div>


                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Pressure (SYSTOLIC-upper number)</label>
                                        <input class="form-control" type="number" name="upperbp" min="40" max="250" value="<?php echo $row['upperbp'] ?>" >

                                        <label>Blood Pressure (DIASTOLIC-lower number)</label>
                                        <input class="form-control" type="number" name="lowerbp"min="40" max="200"value="<?php echo $row['lowerbp'] ?>" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Respiratory Rate</label>
                                        <input class="form-control" type="text" name="resp_rate" value="<?php echo $row['resprate'] ?>">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Capilarry Refill</label>
                                        <input class="form-control" type="text" name="cap_refill"value="<?php echo $row['cr'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Temperature (Celcius)</label>
                                        <input class="form-control" type="number" name="temp"step=".01" value="<?php echo $row['temp'] ?>">
                                    </div>
                                </div>

                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Weight(kg)</label>
                                        <input class="form-control" type="number" name="weigth"step=".01"value="<?php echo $row['weight'] ?>">
                                    </div>
                                </div>


                                 

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pulse Rate</label>
                                        <input class="form-control" type="text" name="pulse_rate" value="<?php echo $row['prate'] ?>">
                                    </div>
                                </div>


                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Diagnosis</label>
                                       

                                        <textarea class="form-control" name="diagnosis"><?php echo $row['diagnoses'] ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Treatment</label>
                                       
                                        <textarea class="form-control"  name="treatment"><?php echo $row['treatment'] ?></textarea>
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Consultation Date: <?php echo " ". $row['cdate'] ?></label>
                                        <div class="cal-icon">
                                            <!---
                                            <input class="form-control datetimepicker" type="datetimepicker" name="joindate"  >
                                            -->

                                             <input type="date" name="consult_date" value="<?php echo (isset($_GET['consult_date']))?$_GET['consult_date']:'';?>"max="<?= date('Y-m-d');
                                             ?>">

                                        </div>
                                    </div>
                                </div>
                                


                               
                                


                              
                                <div class="col-sm-6 ">
                                            <div class="form-group">
                                                <label>Doctor</label>
                                                <select name="doctor" class="form-control select" >
                                                    <option selected="selected"><?php echo $row['docname']." ".$row['docmi']." ".$row['doclname']; ?></option>
                                                    <?php


                                                        //$docid=$row['docid'];
                                                         $query = "select hw_fname as fname, hw_mi as mi, hw_lname as lname from healthworker where hw_designation='Doctor'  ";
                                                        $query_run = mysqli_query($con,$query);
                                                        if (mysqli_num_rows($query_run)>0) 
                                                        {
                                                             while ($row=mysqli_fetch_array($query_run))
                                                             {
                                                            ?>
                                                            <option><?php echo $row['fname'].$row['mi'].$row['lname'] ?></option>

                                                            <?php
                                                          }  
                                                        }

                                                     ?>
                                                    
                                                </select>
                                            </div>
                                </div>

                                









                             

                               
                           
                        
                    </div>
                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">UPDATE</button>


                            <a href="consultation.php" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>


                             <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--used to get the user id-->

                              

                            </form>

<?php 
    }
}
 ?>

                </div>
            </div>   




        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>