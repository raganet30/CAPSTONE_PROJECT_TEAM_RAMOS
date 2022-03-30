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
                    <div class="col-sm-12">
                        <?php include('alert.php') ?>
                        <h4 class="page-title">Medical History</h4>
                        
                        
                        
                    </div>



                </div>



                <div class="row">



                    <div class="col-md-12">
                        <div class="activity">
                            <div class="activity-box">
                                <ul class="activity-list">
                                    
<?php
  
    $id =intval($_GET['id']); 
    $query="select * from history inner join  client on history.client_id=client.client_id where history.client_id='$id' order by id desc ";
                                        $query_run= mysqli_query($con,$query)or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($con), E_USER_ERROR);

                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
   

 ?>                                    

                                    <li>
                                        
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name"><?php echo $row['client_fname']." ".$row['client_mi']." ".$row['client_lname']; 
                                            ?></a> <?php echo $row['activity']." "."on"." ".$row['date']."." ?> <a href="#" class="name"></a>  <a href="#" class="name"></a>  <a href="consultation.php">More details</a>
                                              
                                            </div>
                                        </div>
                                        
                                    </li>

<?php 
    }

}
 ?>
                                    
                                   
                                </ul>
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