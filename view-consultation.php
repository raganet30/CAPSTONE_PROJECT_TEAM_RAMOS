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
                        <h4 class="page-title"> Consultation Data</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Consultaion No. <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="C01"readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" value="Charles Ortega" readonly >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Complaints</label>
                                        <input class="form-control" type="text" readonly>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Blood Pressure</label>
                                        <input class="form-control" type="text" value="BP" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Respiratory Rate</label>
                                        <input class="form-control" type="text" value="RR" readonly>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Capilarry Refill</label>
                                        <input class="form-control" type="text" value="CR" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Temperature (Celcius)</label>
                                        <input class="form-control" type="number" value="37" readonly>
                                    </div>
                                </div>

                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Weight(kg)</label>
                                        <input class="form-control" type="number" value="55" readonly>
                                    </div>
                                </div>


                                 

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pulse Rate</label>
                                        <input class="form-control" type="text" value="PR" readonly>
                                    </div>
                                </div>

                              
                                     <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Physician</label>
                                                 <input class="form-control" type="text" value="Dr. Ken Go" readonly>
                                            </div>
                                    </div>









                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Diagnosis</label>
                                        <input class="form-control" type="text" value="Fever" readonly="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Treatment</label>
                                        <input class="form-control" type="text" value="Tanduay" readonly="">
                                    </div>
                                </div>

                                

                                <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label>Services</label>
                                              <input class="form-control" type="text" value="Common Illness" readonly="">
                                            </div>
                                    </div>

                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Consultation</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" readonly="">
                                        </div>
                                    </div>
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