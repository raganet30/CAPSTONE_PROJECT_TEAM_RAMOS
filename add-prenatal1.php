<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php');
include('authentication.php'); ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>

        <div class="page-wrapper">
        <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                         
                        <h4 class="page-title">Add Prenatal Check-up</h4>
                        <br>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">

                        <form action="add-prenatal-process.php" method="POST">
                            <div class="row">

                           <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="search" id="search_pregnant"placeholder="Search..."autocomplete="off" required >
                                        <div class="list-group" id="show-list-pregnant">
                                        <!-- Here autocomplete list will be display -->
                                        </div>


                                    </div>
                                </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Check-up Type</label><span class="text-danger">*</span>
                                        <select class="select" name="type">
                                            <option>1st Trimester</option>
                                            <option>2nd Trimester</option>
                                            <option>3rd Trimester</option>

                                        </select>
                                    </div>
                                </div>

                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Check-up Number</label><span class="text-danger">*</span>
                                        <select class="select" name="check_up_num">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>

                                        </select>
                                    </div>
                                </div>


                             


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date </label><span class="text-danger">*</span>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="date" value="<?php echo (isset($_GET['date']))?$_GET['date']:'';?>" max="<?= date('Y-m-d');
                                             ?>"required>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Weight(kg)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number" name="weigth">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Height(cm)</label><span class="text-danger">*</span>
                                        <input class="form-control" type="number"name="height">
                                    </div>
                                </div>

                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age of Gestation </label>
                                        <input class="form-control" type="text"name="age_gest">
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
                                        <label>Nutritional Status</label>
                                        <select class="select" name="nutri_stat">
                                            <option>Normal</option>
                                            <option>Underweight</option>
                                            <option>Overweight</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pregnancy Status </label>
                                        <input class="form-control" type="text"name="preg_stat">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Creation of Birth Plan </label>
                                        <input class="form-control" type="text"name="creation_bplan" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Changes of Birth Plan </label>
                                        <input class="form-control" type="text"name="changes_bplan">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Advice Given </label>
                                        <input class="form-control" type="text"name="advice">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Dental Check-up </label>
                                        <input class="form-control" type="text"name="dental">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Laboratory Test Done: </label>
                                        <input class="form-control" type="text"name="lab">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hemoglobin count: </label>
                                        <input class="form-control" type="text"name="hemog">
                                    </div>
                                </div>

                                 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Urinalysis: </label>
                                        <input class="form-control" type="text"name="urinalysis">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Complete Blood Count(CBC) </label>
                                        <input class="form-control" type="text"name="cbc">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood/RH group </label>
                                        <input class="form-control" type="text"name="blood_group">
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Etiological Test </label>
                                        <input class="form-control" type="text"name="etio">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pap Smear </label>
                                        <input class="form-control" type="text"name="pap_smear">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Gestational Diabetes </label>
                                        <input class="form-control" type="text"name="gest_diab">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bacteriuria </label>
                                        <input class="form-control" type="text"name="bacte">
                                    </div>
                                </div>






                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>STIs using syndromic approach </label>
                                        <input class="form-control" type="text"name="sti">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Stool examination </label>
                                        <input class="form-control" type="text"name="stool">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Acetic Acid Wash: </label>
                                        <input class="form-control" type="text"name="acetic">
                                    </div>
                                </div>

                                


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tetanus-containing Vaccine Date Given: </label><span class="text-danger">*</span>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="tetanus_date" value="<?php echo (isset($_GET['tetanus_date']))?$_GET['tetanus_date']:'';?>" max="<?= date('Y-m-d');
                                             ?>">

                                        </div>
                                    </div>
                                </div>



                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Return Date(Check-up)  </label><span class="text-danger">*</span>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="return_date" value="<?php echo (isset($_GET['return_date']))?$_GET['return_date']:'';?>" required>

                                        </div>
                                    </div>
                                </div>



                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Health Service Provider Name </label>
                                        <input class="form-control" type="text"name="hsp_name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Hospital Referral: </label>
                                        <input class="form-control" type="text" name="hospital_ref">
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