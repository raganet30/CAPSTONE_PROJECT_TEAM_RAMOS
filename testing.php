<?php
$con  = mysqli_connect("localhost","root","","e-healthcare");
 if (!$con) {
     # code...
    echo "Connection failed" . mysqli_error();
 }else{
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
 
 
 }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <style type="text/css">

#chart-container {
    width: 50%;
    height: auto;
    text-align: center;
}
</style>


    <body>
        <div style="width: 50%;
    height: auto;
    text-align: center;">
            <h2 class="page-header" >Analytics Report </h2>
            <div>Clients </div>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>



  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($age_group); ?>,
                        datasets: [{
                            label: 'Age Categories',
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