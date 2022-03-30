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
                        <?php include('alert.php') ?>
                    <br>

                        <h4 class="page-title">Edit Vaccine</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

<?php 
   

    $id = $_POST['id'];

   $query="select * from vaccine where vaccine_id ='$id' ";





    $query_run =mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>
                        <form action="edit-vaccine-process.php" method="POST">
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
                                        <label>Vaccine Name </label>
                                        <input class="form-control" type="text" name="name"  value="<?php echo $row['vaccine_name'] ?>" >
                                    </div>
                                </div>

                               <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Dosage </label>
                                        <input class="form-control" type="number" name="dosage" value="<?php echo $row['vaccine_dosage'] ?>"step=".01">
                                    </div>
                                </div>

                                <div class="col-sm-6">     
                                    <div class="form-group">
                                        <label> Vaccine Brand </label>
                                        <input class="form-control" type="text" name="brand" value="<?php echo $row['vaccine_brand'] ?>">
                                    </div>
                                </div>
                                
                               <?php 
                                    if ($row['vaccine_dose_type'] =='drops' ) 
                                    {
                                        ?>
                                        <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Dosage Type:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="dose-type" class="form-check-input" value="drops" checked>drops 
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="dose-type" class="form-check-input" value="ml" >ml
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Dosage Type:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="dose-type" class="form-check-input" value="ml" checked>ml 
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="dose-type" class="form-check-input" value="drops" >drops
                                            </label>
                                        </div>
                                    </div>


                               <!--use to get the user id-->
                                <input type="hidden" name="userid" value="<?php echo $GLOBALS['userid']; ?>">
                              <!--used to get the user id-->

                             
                                        <?php 
                                    }
 
            }
        }
?>

                            </div>
                        </div>
                            <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">SAVE</button>


                            <a href="vaccine.php" class="btn btn-danger btn-lg">CANCEL</a>
                            </div>

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