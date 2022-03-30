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
                        <h4 class="page-title">Logs</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="activity">
                            <div class="activity-box">
                                <ul class="activity-list">


  <?php
                         $username=$_SESSION['auth_user']['username'];
                         $query = "select  * from admin_user where username='$username' limit 1 ";//query to get the role of username

                         $userid="";

                         $query_run =mysqli_query($con,$query);
                         if (mysqli_num_rows($query_run)>0) 
                        {
                            $row = mysqli_fetch_array($query_run);
                            $userid.=$row['id'];
                            if($row['role']=='Admin')
                            {

    $query="select log.log_id as id,admin_user.username as username, log.log_activity as activity, log.log_date as logdate from log inner join  admin_user on log.log_user=admin_user.id order by log_id desc ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>                                    

                                    <li>
                                        
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name"><?php echo $row['username'] 
                                            ?></a> <?php echo $row['activity'] ?> <a href="#" class="name"></a>  <a href="#" class="name"></a>  <a href="#"></a>
                                                <span class="time"><?php echo $row['logdate']; ?></span>
                                            </div>
                                        </div>




                                        <a class="activity-delete" href="delete-notif.php?id=<?php echo $row['id']?>" title="Delete">&times;</a>




                                    </li>

<?php 
    }

}
 ?>

<?php

                         }
                         else
                         {

    $query="select log.log_id as id,admin_user.username as username, log.log_activity as activity, log.log_date as logdate from log inner join  admin_user on log.log_user=admin_user.id order by log_id desc ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>                                    

                                    <li>
                                        
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name"><?php echo $row['username'] 
                                            ?></a> <?php echo $row['activity'] ?> <a href="#" class="name"></a>  <a href="#" class="name"></a>  <a href="#"></a>
                                                <span class="time"><?php echo $row['logdate']; ?></span>
                                            </div>
                                        </div>




                                       




                                    </li>

<?php 
    }

}

                         } 
                           }
                            ?>




                                    

                                    
                                    <!--
                                        <li>
                                        
                                        <div class="activity-content">
                                            <div class="timeline-content">
                                                <a href="#" class="name">Jeffery Lalor</a> added <a href="#" class="name">Loren Gatlin</a> and <a href="profile.html" class="name">Tarah Shropshire</a> to project <a href="#">Patient appointment booking</a>
                                                <span class="time">6 mins ago</span>
                                            </div>
                                        </div>
                                        <a class="activity-delete" href="#" title="Delete">&times;</a>
                                    </li>
                                    -->
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