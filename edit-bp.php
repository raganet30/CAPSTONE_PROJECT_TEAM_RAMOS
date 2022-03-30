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
                        <h4 class="page-title">Edit BP Monitoring</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                        <?php 
                        $id = $_POST['id'];
                          $query="SELECT *
FROM bp_monitoring
INNER JOIN client
ON bp_monitoring.client_id = client.client_id where id='$id' ";

                                             $query_run = mysqli_query($con,$query);
                                            if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {


                        ?>
                        <form action="edit-bp-process.php" method="POST">
                             <div class="row">
                               
                                
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Client Name </label>

                                        <input class="form-control" type="text" name="search" id="search"placeholder="Search..."autocomplete="off" value="<?php echo $row['client_fname']." ".$row['client_mi']." ".$row['client_lname']  ?>" required >
                                        <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                        </div>

                                        


                                    </div>
                                </div>

                               
                                 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Pressure (SYSTOLIC-upper number)</label>
                                        <input class="form-control" type="number" name="upperbp" min="40" max="250" value="<?php echo $row['upperbp'] ?>">

                                        <label>Blood Pressure (DIASTOLIC-lower number)</label>
                                        <input class="form-control" type="number" name="lowerbp"min="40" max="200" value="<?php echo $row['lowerbp'] ?>" >
                                    </div>
                                </div>
                           

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date: <?php echo " ".$row['date'] ?> </label>
                                        <div class="cal-icon">
                                            <input type="date" name="date" value="<?php echo (isset($_GET['date']))?$_GET['date']:'';?>"  max="<?= date('Y-m-d');
                                             ?>">


                                        </div>
                                    </div>
                                    </div>

                                 <div class="col-sm-6 ">   
                                 <div class="form-group">
                                                <label>Level</label>
                                                <select name="level" class="form-control select" required="">
                                                   <option selected="selected"><?php echo $row['level'] ?></option>
                                                   <option>Low</option>
                                                   <option>Optimal</option>
                                                   <option>Normal</option>
                                                   <option>High Normal</option>
                                                   <option>Grade 1- Hypertension (mild)</option>
                                                   <option>Grade 2- Hypertension (moderate)</option>
                                                   <option>Grade 3- Hypertension (severe)</option>
                                                    
                                                </select>
                                            </div> 
                                        </div>  

                                 
                              
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                 
                            </div>

                            <div class="m-t-20 text-center">
                            <input type="submit" name="btn_save" class="btn btn-primary btn-lg "value="SAVE">

                            <a href="bp-monitoring.php" class="btn btn-danger btn-lg">CANCEL</a>
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