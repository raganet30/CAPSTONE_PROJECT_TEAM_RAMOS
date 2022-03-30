<?php
	//session_start(); 
	//$today = date('M. d, Y');
	//echo $today;


	
	

	//$_SESSION['currdate']=$today;

	// $row['logdate'] = date('M. d, Y H:i:s A');
	// echo $row['logdate']; 
	//DATE_FORMAT(log.log_date, '%M %d, %Y %h:%i%p') as log_date


 ?>

 //$variable="The quick brown fox jumps over the lazy dog.";
//$stripped = str_replace(' ', '', $variable);
//echo $stripped;

//date_default_timezone_set('Asia/Manila');
 //echo date('Y-m-d ');

//echo $_POST['remarks'];

// or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);//error handling
?>

<!--
<div id="page">
  <form id="messageForm">
    <h2>Compose A Tweet</h2>
    <textarea id="tweet"></textarea>
    <div id="charactersRemaining">180 characters</div>
  </form>
</div>

<script type="text/javascript">
		var el;                                                    

function countCharacters(e) {                                    
  var textEntered, countRemaining, counter;          
  textEntered = document.getElementById('tweet').value;  
  counter = (140 - (textEntered.length));
  countRemaining = document.getElementById('charactersRemaining'); 
  countRemaining.textContent = counter;       
}
el = document.getElementById('tweet');                   
el.addEventListener('keyup', countCharacters, false);


</script>
-->
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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>1</h3>
                                <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>1</h3>
                                <span class="widget-title2">Clients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>3</h3>
                                <span class="widget-title3">Nurses <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>
                       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>3</h3>
                                <span class="widget-title3">BHW <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Clients Total</h4>
                                    <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
                                </div>  
                                <canvas id="linegraph"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Children</h4>
                                    <div class="float-right">
                                        <ul class="chat-user-total">


                                            <li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
                                        </ul>
                                    </div>
                                </div>  
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>


                </div>

<!----DOCTORS SECTION---->
                    












                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">New Complaints </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>John Doe</h2>
                                                </td>
                                                <td>Johndoe21@gmail.com</td>
                                                <td>+1-202-555-0125</td>
                                                <td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>Richard</h2>
                                                </td>
                                                <td>Richard123@yahoo.com</td>
                                                <td>202-555-0127</td>
                                                <td><button class="btn btn-primary btn-primary-two float-right">Cough</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>Villiam</h2>
                                                </td>
                                                <td>Richard123@yahoo.com</td>
                                                <td>+1-202-555-0106</td>
                                                <td><button class="btn btn-primary btn-primary-three float-right">Diabetec</button></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2>Martin</h2>
                                                </td>
                                                <td>Richard123@yahoo.com</td>
                                                <td>776-2323 89562015</td>
                                                <td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!---NURSES--->
                     <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Nurses</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                    
                                   
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Merly Uy</span>
                                                <span class="contact-date">RN</span>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Alarcon</span>
                                                <span class="contact-date">RN</span>
                                            </div>
                                        </div>
                                    </li>



                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Cristy Yu</span>
                                                <span class="contact-date">RN</span>
                                            </div>
                                        </div>
                                    </li>


                                   
                                    
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.html" class="text-muted">View all Nursess</a>
                            </div>
                        </div>
                    </div>


 <!--DOCTOR`s SECTION---->
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Doctors</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                    
                                   
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Richard Miles</span>
                                                <span class="contact-date">MS, MD</span>
                                            </div>
                                        </div>
                                    </li>
                                   
                                    
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.html" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>




<!----BHW section----->

 <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
                            <div class="card-header bg-white">
                                <h4 class="card-title mb-0">Baranggay Health Workers</h4>
                            </div>
                            <div class="card-body">
                                <ul class="contact-list">
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Merlinda Chavez</span>
                                                <span class="contact-date">BHW</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis">Loudy Gal</span>
                                                <span class="contact-date">BHW</span>
                                            </div>
                                        </div>
                                    </li>
                                
                                   
                                
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="nusers.html" class="text-muted">View all BHWs</a>
                            </div>
                        </div>
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