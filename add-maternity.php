<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php');
    include('currentdate.php');
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
                        <h4 class="page-title">Add Maternity</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      
                            


                        <form action="add-maternity-process.php"method="POST">

                            <div class="row">


                              <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Client Name <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="search" id="search_women"placeholder="Search..."autocomplete="off" required >
                                        <div class="list-group" id="show-list-women">
                                        <!-- Here autocomplete list will be display -->
                                        </div>


                                    </div>
                                </div>   


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Body Mass Index <span class="text-danger">*</span></label>
                                        <input class="form-control" name="bmi" type="number" step=".01" required="">
                                    </div>
                                </div>




                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Last Menstraution </label><span class="text-danger">*</span>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="mens_date" value="<?php echo (isset($_GET['mens_date']))?$_GET['mens_date']:'';?>" max="<?= date('Y-m-d');
                                             ?>"required>

                                        </div>
                                    </div>
                                </div>





                              <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Expected Date of Delivery </label><span class="text-danger">*</span>
                                        <div class="cal-icon">
                                           

                                             <input type="date" name="expect_date" value="<?php echo (isset($_GET['expect_date']))?$_GET['expect_date']:'';?>"required>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pregnancy Number <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="preg_num"required >
                                    </div>
                                </div> 
                            </div>

                           <div class="m-t-20 text-center">
                            <button type="submit" name="btn_save" class="btn btn-primary btn-lg ">SAVE</button>


                            <a href="maternity.php" class="btn btn-danger btn-lg">CANCEL</a>
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