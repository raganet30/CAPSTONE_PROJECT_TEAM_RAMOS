        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index.php"><i class="fas fa-chart-line"></i> <span>Dashboard</span></a>
                        </li>
						
                        <li>
                            <a href="clients.php"><i class="fa fa-wheelchair"></i> <span>Clients</span></a>
                        </li>
<!--
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>


                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
                        </li>
                        
-->
                        <li>
                            <a href="vaccine.php"><i class="fas fa-notes-medical"></i> <span>Vaccine </span></a>
                        </li>

                        <!--
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar-check-o"></i> <span>Apppointments</span></a>
                        </li>

                       -->

                        <li class="submenu">
                            <a href="#"><i class="fa fa-hospital-o"></i> <span> Medical Services </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <!--<li><a href="sections.php">Services List</a></li> -->


                                <li><a href="consultation.php">Consultation/Individual Treatment</a></li>
                                <li><a href="bp-monitoring.php">BP Monitoring</a></li>

                                <li><a href="maternity.php">Maternal Record</a></li>
                                <li><a href="prenatal1.php">Prenatal Checkup</a></li>
                               
                                <li><a href="immunization.php"> Immunization</a></li>

                                
                            </ul>
                        </li>

                        <li>
                            <a href="sms.php"><i class="fas fa-sms"></i> <span>SMS Sender</span></a>
                        </li>



						<li class="submenu">
							<a href="#"><i class="fa fa-user-md"></i> <span> Health Workers </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="healthworkers.php">Health Workers List</a></li>
								
							</ul>
						</li>

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
                            

                        <li class="submenu">
                            <a href="#"><i class="fas fa-user-tie"></i> <span> Users </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="manage-users.php">Manage Users</a></li>
                                
                            </ul>
                        </li>
						
                         <?php
                         } 
                           }
                            ?>
						
                       
						<li>
							<a href="activities.php"><i class="far fa-clipboard"></i> <span>Logs</span></a>
						</li>

						<li class="submenu">
							<a href="#"><i class="fas fa-file-alt"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
                                <li><a href="consultation-report.php"> Consultation Report </a></li>
                                <li><a href="bp-report.php"> BP Monitoring Report </a></li>

                                <li><a href="vaccination-report.php"> Immunization Report </a></li>

                                
                            </ul>

                          
						</li>


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

                              <li>
                            <a href="settings.php"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
 <?php

                         } 
                           }
                            ?>
                       
                       
                        
                    </ul>
                </div>
            </div>
        </div>

