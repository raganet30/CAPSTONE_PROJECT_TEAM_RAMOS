<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php') ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>

        <div class="page-wrapper">
        <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                         
                        <h4 class="page-title">Edit Prenatal Check-up</h4>
                        <br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
    <?php 
   

    $id = $_POST['id'];

     $query="SELECT
*
FROM prenatal
JOIN maternity
  ON prenatal.client_id = maternity.client_id
JOIN client
  ON client.client_id = maternity.client_id  where prenatal_id='$id' " ;

  $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>

                        <form action="edit-prenatal-process.php" method="POST">
                            <div class="row">

                                <input type="hidden" name="prenatal_id"value="<?php echo $row['prenatal_id'] ?>">

                           <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Name </label>

                                        <input class="form-control" type="text" name="search" id="search_pregnant"placeholder="Search..."autocomplete="off" value="<?php echo $row['client_fname']." ".$row['client_mi']." ".$row['client_lname']  ?>" >
                                        <div class="list-group" id="show-list-pregnant">
                                        <!-- Here autocomplete list will be display -->
                                        </div>


                                    </div>
                                </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Check-up Type</label>
                                        <select class="select" name="type">
                                            <option selected="selected"><?php echo $row['prenatal_type'] ?></option>
                                            <option>1st Trimester</option>
                                            <option>2nd Trimester</option>
                                            <option>3rd Trimester</option>

                                        </select>
                                    </div>
                                </div>

                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Check-up Number</label>
                                        <select class="select" name="check_up_num">
                                            <option selected="selected"><?php echo $row['prenatal_checknum'] ?></option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>

                                        </select>
                                    </div>
                                </div>


                             


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date: <?php echo $row['prenatal_date'] ?> </label>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="date" value="<?php echo (isset($_GET['date']))?$_GET['date']:'';?>" max="<?= date('Y-m-d');
                                             ?>">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Weight(kg)</label>
                                        <input class="form-control" type="number" name="weigth" value="<?php echo $row['prenatal_weight'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Height(cm)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number"name="height"value="<?php echo $row['prenatal_height'] ?>">
                                    </div>
                                </div>

                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age of Gestation </label>
                                        <input class="form-control" type="text"name="age_gest" value="<?php echo $row['prenatal_age_gest'] ?>">
                                    </div>
                                </div>

                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Pressure (SYSTOLIC-upper number)</label>
                                        <input class="form-control" type="number" name="upperbp" min="40" max="250" value="<?php echo $row['prenatal_upperbp'] ?>">

                                        <label>Blood Pressure (DIASTOLIC-lower number)</label>
                                        <input class="form-control" type="number" name="lowerbp"min="40" max="200"value="<?php echo $row['prenatal_lowerbp'] ?>" >
                                    </div>
                                </div>




                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nutritional Status</label>
                                        <select class="select" name="nutri_stat">
                                            <option selected="selected"><?php echo $row['prenatal_nutristat'] ?></option>
                                            <option>Normal</option>
                                            <option>Underweight</option>
                                            <option>Overweight</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pregnancy Status </label>
                                        <input class="form-control" type="text"name="preg_stat"value="<?php echo $row['prenatal_pregstat'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Creation of Birth Plan </label>
                                        <input class="form-control" type="text"name="creation_bplan" value="<?php echo $row['prenatal_creationbplan'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Changes of Birth Plan </label>
                                        <input class="form-control" type="text"name="changes_bplan"value="<?php echo $row['prenatal_bplanchanges'] ?>">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Advice Given </label>
                                        <input class="form-control" type="text"name="advice"value="<?php echo $row['prenatal_advice'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Dental Check-up </label>
                                        <input class="form-control" type="text"name="dental"value="<?php echo $row['prenatal_dental'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Laboratory Test Done: </label>
                                        <input class="form-control" type="text"name="lab"value="<?php echo $row['prenatal_labtest'] ?>">
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hemoglobin count: </label>
                                        <input class="form-control" type="text"name="hemog"value="<?php echo $row['prenatal_hemog'] ?>">
                                    </div>
                                </div>

                                 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Urinalysis: </label>
                                        <input class="form-control" type="text"name="urinalysis"value="<?php echo $row['prenatal_urinalysis'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Complete Blood Count(CBC) </label>
                                        <input class="form-control" type="text"name="cbc"value="<?php echo $row['prenatal_cbc'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood/RH group </label>
                                        <input class="form-control" type="text"name="blood_group"value="<?php echo $row['prenatal_bloodrh'] ?>">
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Etiological Test </label>
                                        <input class="form-control" type="text"name="etio"value="<?php echo $row['prenatal_etiotest'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pap Smear </label>
                                        <input class="form-control" type="text"name="pap_smear"value="<?php echo $row['prenatal_papsmear'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gestational Diabetes </label>
                                        <input class="form-control" type="text"name="gest_diab"value="<?php echo $row['prenatal_gestdiab'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bacteriuria </label>
                                        <input class="form-control" type="text"name="bacte"value="<?php echo $row['prenatal_bacteriuria'] ?>">
                                    </div>
                                </div>






                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>STIs using syndromic approach </label>
                                        <input class="form-control" type="text"name="sti"value="<?php echo $row['prenatal_STI'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Stool examination </label>
                                        <input class="form-control" type="text"name="stool"value="<?php echo $row['prenatal_stool'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Acetic Acid Wash: </label>
                                        <input class="form-control" type="text"name="acetic"value="<?php echo $row['prenatal_acetic'] ?>">
                                    </div>
                                </div>

                                


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tetanus-containing Vaccine Date Given: <?php echo $row['prenatal_tetanus'] ?></label>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="tetanus_date" value="<?php echo (isset($_GET['tetanus_date']))?$_GET['tetanus_date']:'';?>" max="<?= date('Y-m-d');
                                             ?>">

                                        </div>
                                    </div>
                                </div>



                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Return Date(Check-up): <?php echo $row['prenatal_datereturn'] ?>  </label>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="return_date" value="<?php echo (isset($_GET['return_date']))?$_GET['return_date']:'';?>" >

                                        </div>
                                    </div>
                                </div>



                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Health Service Provider Name </label>
                                        <input class="form-control" type="text"name="hsp_name"value="<?php echo $row['prenatal_provname'] ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Referral: </label>
                                        <input class="form-control" type="text" name="hospital_ref"value="<?php echo $row['prenatal_hospref'] ?>">
                                    </div>
                                </div>


                            </div>
                            
                           <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">SAVE</button>


                            <a href="prenatal1.php" class="btn btn-danger btn-lg">CANCEL</a>
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