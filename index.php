<!DOCTYPE html>
<html lang="en">


<?php 
include("currentdate.php");
    include('includes/head.php'); 
    include('authentication.php');   //copy to all modules 
    //include('dbcon.php');
    $con  = mysqli_connect("localhost","root","","e-healthcare");
    $sql ="select count(*)as person_total,
  case
    when datediff(now(), client_bdate) / 365.25 >= 60 then '60 above'
    when datediff(now(), client_bdate) / 365.25 >= 18  then '18-59'
    when datediff(now(), client_bdate) / 365.25 >= 12 then '12-17'
    when datediff(now(), client_bdate) / 365.25 >= 1 then '1-11'
    else '1 below'
  end as age_group
from client group by age_group";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $age_group[]  = $row['age_group']  ;
            $person_total[] = $row['person_total'];
        }



?>

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
                                <h3>
                                    <?php 
                                    $rt = mysqli_query($con,"SELECT * FROM healthworker where hw_designation='Doctor' ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                                     ?>

                                </h3>
                                <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-wheelchair"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>
                                    <?php 
                                    $rt = mysqli_query($con,"SELECT * FROM client ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                                     ?>
                                </h3>
                                <span class="widget-title2">Clients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>
                                    <?php 
                                    $rt = mysqli_query($con,"SELECT * FROM healthworker where hw_designation='Nurse' ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                                     ?>
                                </h3>
                                <span class="widget-title3">Nurses <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>

                       <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>
                                    <?php 
                                    $rt = mysqli_query($con,"SELECT * FROM healthworker where hw_designation='BHW' ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                                     ?>
                                </h3>
                                <span class="widget-title3">BHW <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fas fa-user-nurse" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>
                                    <?php 
                                    $rt = mysqli_query($con,"SELECT * FROM healthworker where hw_designation='Midwife' ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                                     ?>
                                </h3>
                                <span class="widget-title3">Midwife <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>



                </div>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="piechart" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                 <div id="piechart2" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>


                </div>




                           



                <div class="row">

                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                 <div style="width: 100%;
    height: auto;
    text-align: center;">
            <h4 class="card-title d-inline-block">Clients` Age Statistical Data </h4>
            <div></div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12 col-md-6 col-lg-8 col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Today`s Complaints </h4> <a href="consultation.php" class="btn btn-primary float-right">View all</a>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table mb-0 new-patient-table">
                                        <tbody>
                                            <?php 

                                    $f1="00:00:00";
                                    $from=date('Y-m-d')." ".$f1;
                                    $t1="23:59:59";
                                    $to=date('Y-m-d')." ".$t1;


                                            $query="select *
FROM client
INNER JOIN consultation ON consultation.client_id = client.client_id
INNER JOIN healthworker ON consultation.hw_id = healthworker.hw_id where consultation_date between '$from' and '$to' ";
                                            $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>

                                             
                                            <tr>
                                                <td>
                                                    <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
                                                    <h2><?= $items['client_fname']." ". $items['client_mi']." ". $items['client_lname'] ?></h2>
                                                </td>
                                                <td><?php
                                                     echo "Purok #".$items['client_purok'].", Brgy.".$items['client_brgy'].",". $items['client_street']."St."  ;
                                                 ?></td>
                                              
                                                <td><button class="btn btn-primary btn-primary-one float-right"><?= $items['consultation_complaints'] ?></button></td>
                                            </tr>

                                            <?php 
                                                }
                                            }
                                           else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="2">No record found</td>
                                                    </tr>
                                                

                                                <?php

                                            }

                                             ?>
                                            
                                        </tbody>
                                    </table>
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
    <?php include('includes/footer.php') ?>

</body>

    <!---CHART For BP MONITORING STATISTICS-->

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "SELECT count(client.client_id)as total, bp_monitoring.level as level
FROM bp_monitoring
INNER JOIN client
ON bp_monitoring.client_id = client.client_id group by level";
         $query = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($query)) {
            echo"['".$result['level']."',".$result['total']."],";
          }

         ?>
        ]);

        var options = {
          title: 'BP Monitoring Chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <!---CHART For BP MONITORING STATISTICS-->





    <!---CHART For VACCINATION STATISTICS-->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
         <?php
         $sql = "select count(client_id) as total , client_immu_status as status from client group by client_immu_status ";
         $query = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($query)) {
            echo"['".$result['status']."',".$result['total']."],";
          }

         ?>
        ]);

        var options = {
          title: 'Immunization Chart'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
  <!---CHART For VACCINATION STATISTICS-->



<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($age_group); ?>,
                        datasets: [{
                            label: 'Total',
                            backgroundColor: '#49e2ff',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                             
                            data:<?php echo json_encode($person_total); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>






</html>