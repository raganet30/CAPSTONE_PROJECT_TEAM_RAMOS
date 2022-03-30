<!DOCTYPE html>
<html lang="en">


<?php 

    include('includes/head.php');
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
                   </div>
            </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Immunization</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

<?php 
                if(isset($_POST['client_immu_id']))
                {
                   $id = $_POST['client_immu_id']; 
                }
                else
                {

                    $id=intval($_GET['id']);
                }

                $query="SELECT client_immunization.client_immu_id as client_immu_id ,client.client_id as client_id,client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, vaccine.vaccine_name, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where client_immunization.client_immu_id='$id' ";

                $query_run =mysqli_query($con,$query);

     $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>



                        <form action="edit-immunization-process.php" method="POST">
                             <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Immunization No. </label>

                                       <input class="form-control" type="text" name="client_immu_id"  value="<?php echo $row['client_immu_id'] ?>"readonly>
                                       

                                    </div>
                                </div>




                               
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Client Name </label>

                                       <input class="form-control" type="text" name="search" id="search"placeholder="Search..."autocomplete="off" value="<?php echo $row['client_name']." ".$row['client_mi']." ".$row['client_lastname']  ?>"  >
                                        <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                        </div>

                                        


                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date Given: <?php echo $row['date_given'] ?></label>
                                        <div class="cal-icon">
                                            <input type="date" name="date_given" value="<?php echo (isset($_GET['date_given']))?$_GET['date_given']:'';?>"  max="<?= date('Y-m-d');
                                             ?>">


                                        </div>
                                    </div>
                                    </div>


                                     <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" type="text" name="remarks"><?php echo $row['remarks'] ?></textarea>
                                    </div>
                                </div>

                                <?php 
                                    $vacname=$row['vaccine_name']; 
                                ?>

                               
                                 <div class="col-sm-6 ">   
                                            <div class="form-group">
                                                <label>Vaccine: <?php echo " ".$row['vaccine_name']; ?> </label>
                                                <select class="form-control select "name="vaccine_name">

                                                <option selected="selected"value="none">Select Vaccine</option>
                                                  
                                                    
                                 <?php 
                                 $query="select * from vaccine where vaccine_name!='$vacname' order by vaccine_name asc";
                                
                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                 while ($row=mysqli_fetch_array($query_run))
                                                             {

                                                
                                            
                                 ?> 
                                                    
                                                    <option><?php echo $row['vaccine_name']?></option>
                                    <?php 
                                                }
                                            }
                              ?>                 
                                                   
                                                </select>
                                            </div>
                                 </div>
                           
                                 <div class="col-sm-6 ">   
                                 <div class="form-group">
                                                <label>Vaccinator</label>
                                                <select name="vaccinator" class="form-control select" >
                                                   
                                                    <?php 

                                                        
                                                         $query = "select hw_fname as fname, hw_mi as mi, hw_lname as lname from healthworker where  hw_status='Active' ";
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

                                    



                                
                              
                                 <input type="hidden" name="vaccine_id"value="<?php echo $vaccine_id; ?>">
                                 
                            </div>

                            <div class="m-t-20 text-center">
                            <input type="submit" name="btn_save" class="btn btn-primary btn-lg "value="SAVE">

                            <a href="immunization.php" class="btn btn-danger btn-lg">CANCEL</a>
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
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>