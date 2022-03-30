<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php') ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>
<?php include('currentdate.php') ?>

        <div class="page-wrapper">
         <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Consultation Report</h4>
                    </div>
                   
                   
                </div>

              
                        <div class="row filter-row"> 
                            <div class="col-sm-6 col-md-3">
                            <a href="consult-weekly-report.php">     
                                <button class="btn btn-success btn-block" >WEEKLY REPORT</button>
                            </a>
                            </div>


                            <div class="col-sm-6 col-md-3">
                            <a href="consult-monthly-report.php">    
                                <button class="btn btn-info btn-block" >MONTHLY REPORT</button>
                            </a>
                            </div>

                            <div class="col-sm-6 col-md-3">    
                            <a href="consult-custom-report.php">
                                <button class="btn btn-secondary btn-block" >CUSTOM REPORT</button>
                            </a>     
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