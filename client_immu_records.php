<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php');
include('authentication.php');
 ?>


<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php') ?>







        <div class="page-wrapper">


 <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">IMMUNIZATION DETAILS</h4>
                    </div>

                    
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                    </div>
                                </div>

<?php 
   

     $id =intval($_GET['id']); 

    $query="select CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_id,client_fname,client_mi,client_lname,client_bdate,client_gender,client_brgy,client_street,client_purok,client_mother,client_father,client_phone,client_status,client_joindate from client where client_id ='$id' ";

    $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>


                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php
                                                 echo $row['client_fname']." ".$row['client_mi']."."." ".$row['client_lname']
                                                ?>
                                                    
                                                </h3>
                                                <ul class="personal-info">
                                                
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text"><?php echo $row['client_bdate'] ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Age:</span>
                                                    <span class="text"><?php echo $row['age'] ?></span>
                                                </li>



                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php
                                                     echo "Purok #".$row['client_purok'].", Brgy.".$row['client_brgy'].",". $row['client_street']."St."  ;
                                                 ?></span>
                                                </li>

                                               
                                            </ul>

                                                
                                                <div class="staff-msg"><a href="clients.php" class="btn btn-primary">More Details</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Mother`s Name:</span>
                                                    <span class="text"><?php echo $row['client_mother'] ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Father`s Name:</span>
                                                    <span class="text"><?php echo $row['client_father'] ?></span>
                                                </li>
                                                

                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"><?php echo $row['client_gender'] ?></span>
                                                </li>
                                            </ul>


                                        </div>
                                        <?php 
                                    }
                                }

                                         ?>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
                <div class="profile-tabs">
                    
                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">



                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Immunization Details</h3>
                            <div class="experience-box">
                                <ul class="experience-list">


<?php 
         $query=" 
SELECT vaccine.vaccine_name as vacname, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where client_immunization.client_id='$id' order by client_immunization.client_immu_date   " ;

    $query_run =mysqli_query($con,$query);

    if ($query_run) 
    {
            while ($row =mysqli_fetch_array($query_run)) 
            {
               ?>



                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="immunization.php" class="name"><?php echo $row['vacname'] ?></a>
                                                <div>Status: Given</div>
                                                <span class="time">Date Given: <?php echo $row['date_given'] ?></span>
                                                <div>Vaccinator: <?php echo $row['hw_name']." ".$row['hw_mi']." ".$row['hw_lname'] ?></div>
                                                <div>Remarks: <?php echo $row['remarks'] ?></div>


                                            </div>
                                        </div>
                                    </li>

                <?php 
            }
        }
                 ?>

                                    
                                </ul>




                                <div class="staff-msg">
                                    <a href="print_immu_records.php?id=<?php echo $id  ?>" target="_blank" class="btn btn-info"><i class="fas fa-print"></i>PRINT</a>
                                </div>


                            </div>
                        </div>

                        



                        </div>
                        
                    </div>
                </div>
            </div>





        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>


</body>
    <?php include('includes/footer.php') ?>


</html>