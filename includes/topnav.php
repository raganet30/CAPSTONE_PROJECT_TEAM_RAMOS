 <?php 
        session_start();
        include('dbcon.php');
        

  ?>

        <div class="header">
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>
<?php 


                                     $query="select * from settings limit 1 ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                            {
                                                echo $row['name'];
                                            }
                                        }
?>    
                                             


                    </span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fas fa-bell"></i> <span class="badge badge-pill bg-danger float-right">
                        
                        <?php 
                                    $rt = mysqli_query($con,"SELECT * FROM log  ");
                                    $num1 = mysqli_num_rows($rt);
                                     echo htmlentities($num1); 
                        ?>
                    </span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                
<?php 


   

    $query="select log.log_id as id,admin_user.username as username, log.log_activity as activity, log.log_date as logdate from log inner join  admin_user on log.log_user=admin_user.id order by log_id desc ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>

                                <li class="notification-message">
                                    <a href="activities.php">
                                        <div class="media">
											<span class="avatar"><i class="fas fa-user-check"></i></span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title"><?php 
                                                if ($row['username']==$_SESSION['auth_user']['username']) 
                                                {
                                                    echo "You";
                                                }

                                                else
                                                {
                                                   echo $row['username']; 
                                                }
                                                 ?>
                                                    
                                                </span> <?php echo $row['activity'] ?> <span class="noti-title"></span></p>
												<p class="noti-time"><span class="notification-time"><?php 
                                                echo $row['logdate'];
                                                 ?></span></p>
											</div>
                                        </div>
                                    </a>
                                </li>


<?php 
    }

}
 ?>
                        <!--
                            <li class="notification-message">
                                    <a href="activities.php">
                                        <div class="media">
                                            <span class="avatar">V</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                        -->
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.php">View all Notifications</a>
                        </div>
                    </div>
                </li>
                
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>
          
                           <?php echo $_SESSION['username']; ?>
                           
                        </span>
                    </a>

					<div class="dropdown-menu">
    <?php 

    $username=$_SESSION['username'];

    $query="select * from admin_user  where username='$username' limit 1 ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>     
                                    <a class="dropdown-item" href="edit-profile.php?id=<?php echo $row['id'] ?>">Profile</a>
<?php 
    }

}
 ?>
   

						
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
                             ?>
                             <a class="dropdown-item" href="settings.php">Settings</a>
<?php
                            
                         } 
                           }
                            ?>

						




						<a class="dropdown-item" href="log-out.php">Logout</a>
					</div>

                </li>
            </ul>
            <!--
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-username.php">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.htm">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
            -->

        </div>
