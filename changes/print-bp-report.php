<?php 
	
	session_start();

	
	

 ?>


 <!DOCTYPE html>
<html lang="en">

<?php include('dbcon.php') ?>
<?php include('includes/head.php') ?>

<body onload="window.print()">
    <div class="main-wrapper">



<?php include('currentdate.php') ?>

      
                

               
 <?php

 		$from=$_SESSION['from'];
 		$to=$_SESSION['to'];
                                    
                                    ?>


                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
<?php 


                                     $query="select * from settings limit 1 ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>                              

                            <div class="card-header">
                                <center>
                                    <h4 ><?php echo $row['name'] ?> <br><?php echo $row['address'] ?><br><?php echo $row['phone']."|".$row['telephone'] ?><br><?php echo $row['email'] ?><br></h4>
                                    <i class="fas fa-table me-1"></i>
                                BP MONITORING REPORT from <?php echo $from ?> to <?php echo $to; ?>
                                </center>
 <?php 
    }
}
?>                               
                            </div>
                            <table class="table table-border">

                                <thead>

                                    <tr>
                                        <th>BP Monitoring No.</th>
                                        <th>Client Name</th>
                                        <th>BP</th>
                                        <th>BP Condition Level</th>
                                        <th>Date </th>
                              
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php

                                






           
                                            $query="SELECT *
FROM bp_monitoring
INNER JOIN client
ON bp_monitoring.client_id = client.client_id where date between '$from' and '$to' " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                    <td><?= $items['id'] ?></td>
                                                    <td><?= $items['client_fname']." ". $items['client_mi']." ". $items['client_lname'] ?></td>
                                                    <td><?= $items['upperbp']."/".$items['lowerbp'] ?></td>
                                                    <td><?= $items['level'] ?></td>
                                                    <td><?= $items['date'] ?></td>
                                                    
                                                   
                                                  


                                        
                                                </tr>


                                                    <?php
                                                }
                                            }

                                             else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="6">No record found</td>
                                                    </tr>
                                                

                                                <?php

                                            }

                                            ////////-ending////

                                            ?>
                                    
                                   
                                        





                                    
                                    



                                



                                </tbody>
                            </table>
                        </div>
                


            </div>   




        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>


<div style="text-align: right;
height: 20px;
position:fixed;
margin:0px;
bottom:0px;">
    printed by: <?=$_SESSION['auth_user']['username'];?>
    | print date: <?php $today = date('M. d, Y');
    echo $today; ?>
</div>
  
</body>



</html>