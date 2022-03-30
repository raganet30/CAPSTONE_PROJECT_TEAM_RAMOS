<!DOCTYPE html>
<html lang="en">


<?php include('includes/head.php') ?>

<body>
    <div class="main-wrapper">

<?php include('includes/topnav.php') ?>
<?php include('includes/sidebar.php');
include('authentication.php');
 ?>

        <div class="page-wrapper">
         <div class="content">
            <?php include('alert.php') ?>
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Manage Users</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="register.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Register User </a>
                    </div>
                </div>

                <!--SEARCH OPTION--->     <!--SEARCH OPTION--->
                <form action="" method="GET">
                <div class="row filter-row">

                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <label class="focus-label">Name</label>

                             
                            <input type="text" class="form-control floating" name="name"   >

                        </div>
                    </div>
                  
             <div class="col-sm-6 col-md-3">

                     
                        <button type="submit" class="btn btn-light " name="btn_search">
                             <i class="fas fa-search fa-2x"></i>
                        </button>



                       
                    </div>
                </div>

                </form>

                <!--SEARCH OPTION--->    <!--SEARCH OPTION--->





                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                   <?php 
                                        if(isset($_GET['name']))
                                        {
                                            $username=$_SESSION['auth_user']['username'];
                                            $values = $_GET['name'];
                                            $query="select * from admin_user where concat(username,email)  like '%$values%' and username !='$username' " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                    <td><?= $items['id'] ?></td>
                                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?= $items['username'] ?></td>
                                                    <td><?= $items['email'] ?></td>
                                                    <td><?= $items['role'] ?></td>
                                                    <td><?php 
                                                        if ($items['verify_status']==1) {
                                                           echo "Active";
                                                            }
                                                            else
                                                                echo "Inactive";
                                                     ?></td>
                                                   

                                                    <form action="edit-user.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['id']

                                             ?>">   
                                                    <td class="text-right">
                                                        <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT">

                                                        
                                                    </td>
                                                    </form>



                                        
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
                                        }

                                        else
                                        {
                                            $username=$_SESSION['auth_user']['username'];
                                           // $values = $_GET['name'];
                                            $query="select * from admin_user where username !='$username' ";

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                    <td><?= $items['id'] ?></td>
                                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?= $items['username'] ?></td>
                                                    <td><?= $items['email'] ?></td>
                                                    <td><?= $items['role'] ?></td>
                                                    <td><?php 
                                                        if ($items['verify_status']==1) {
                                                           echo "Active";
                                                            }
                                                            else
                                                                echo "Inactive";
                                                     ?></td>
                                                    

                                                    <form action="edit-user.php" method="POST">

                                                      <input type="hidden" name="id" value="<?php echo  $items['id']

                                             ?>">   
                                                    <td class="text-right">
                                                        <input type="submit" name="edit" class="btn  btn-primary btn-sm" value="VIEW/EDIT">

                                                        
                                                    </td>
                                                    </form>



                                        
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
    <div class="sidebar-overlay" data-reff=""></div>

    <?php include('includes/script.php') ?>
    <?php include('includes/footer.php') ?>
</body>



</html>