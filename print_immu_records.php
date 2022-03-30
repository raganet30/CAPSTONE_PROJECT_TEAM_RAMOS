<!DOCTYPE html>
<html lang="en">

<?php include('dbcon.php') ?>
<?php include('includes/head.php');
include('authentication.php');

 ?>


<body onload="window.print()" >
    <div class="main-wrapper">










 


 <div class="content">
<?php 


                                     $query="select * from settings limit 1 ";
                                        $query_run= mysqli_query($con,$query);
                                         if ($query_run) 
                                        {
                                            while ($row=mysqli_fetch_array($query_run)) 
                                    {
    
 ?>  
                <div class="card-box profile-header">
                     <center><h4 class="page-title"><?php echo $row['name'] ?> <br><?php echo $row['address'] ?><br><?php echo $row['phone']."|".$row['telephone'] ?><br><?php echo $row['email'] ?><br>IMMUNIZATION RECORD</h4></center>
                     <br>
<?php 
    }
}
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                

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
                                                
                                                <ul class="personal-info">
                                                
                                                <li>
                                                    <span class="title">Name:</span>
                                                    <span class="text"> <?php
                                                 echo $row['client_fname']." ".$row['client_mi']."."." ".$row['client_lname']
                                                ?></span>
                                                </li>


                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php
                                                     echo "Purok #".$row['client_purok'].", Brgy.".$row['client_brgy'].",". $row['client_street']."St."  ;
                                                 ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"><?php echo $row['client_gender'] ?></span>
                                                </li>




                                            </ul>
                                                
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
                                                    <span class="title">Birthday:</span>
                                                    <span class="text"><?php echo $row['client_bdate'] ?></span>
                                                </li>

                                                <li>
                                                    <span class="title">Age:</span>
                                                    <span class="text"><?php echo $row['age'] ?></span>
                                                </li>



                                                


                                                <li>
                                                    <span class="title">Immunization Status:</span>
                                                    <span class="text">
                                                        <?php 
                                                            $rt = mysqli_query($con,"SELECT *  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where client_immunization.client_id ='$id' order by client_immunization.client_immu_date asc  ");
                                                            $num1 = mysqli_num_rows($rt);
                                                            if($num1>=10)
                                                            {
                                                                echo "FULLY IMMUNIZED";
                                                            }
                                                            else
                                                            {
                                                                echo "NOT FULLY IMMUNIZED";
                                                            }
                                                            //echo htmlentities($num1); 
                                                        ?>
                                                    </span>
                                                </li>

                                            </ul>


                                        </div>
                                        <?php 
                                    }
                                }

                                         ?>
                                    </div>


                                                    <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Immunization Details</h3>
                            
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>Vaccine</th>
                                        <th>Vaccinator</th>
                                        <th>Date Given</th>
                                        <th>Remarks</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>  


 <?php 

                                  
                               
                                           
                    $query=" 
SELECT CONCAT(TIMESTAMPDIFF(YEAR, client_bdate, now()), ' Years,',
   TIMESTAMPDIFF(MONTH, client_bdate, now()) % 12, ' Months,',
   FLOOR(TIMESTAMPDIFF(DAY, client_bdate, now()) % 30.4375), ' Days') as age,client_immunization.client_immu_id as client_immu_id ,client.client_id as client_id,client.client_fname as client_name, client.client_mi as client_mi, client.client_lname as client_lastname, client_immunization.client_immu_id as client_immu_id,vaccine.vaccine_name, healthworker.hw_fname as hw_name, healthworker.hw_mi as hw_mi, healthworker.hw_lname as hw_lname, client_immunization.client_immu_date as date_given,client_immunization.client_immu_remarks as remarks  FROM  client_immunization
INNER JOIN vaccine ON vaccine.vaccine_id = client_immunization.vaccine_id
INNER JOIN client ON client_immunization.client_id = client.client_id
INNER JOIN healthworker ON client_immunization.hw_id = healthworker.hw_id where client_immunization.client_id ='$id'  " ;

                                             $query_run = mysqli_query($con,$query);
                                            if (mysqli_num_rows($query_run)>0) 
                                            {

                                                foreach($query_run as $items)
                                                {
                                                    ?>    




                                    <tr>
                                        
                                        <td><?= $items['vaccine_name'] ?></td>
                                        <td><?= $items['hw_name']." ". $items['hw_mi']." ". $items['hw_lname'] ?></td>
                                        <td><?= $items['date_given'] ?></td>
                                        <td><?= $items['remarks'] ?></td>
                        

                                        
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
                    </div>
                </div>

                <div class="profile-tabs">
                    
                    <div class="tab-content">
                        <div class="tab-pane show active" id="about-cont">








                </div>
            </div>





 
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <div style="text-align: right;
height: 20px;
position:fixed;
margin:0px;
bottom:0px;">
    printed by: <?=$_SESSION['auth_user']['username'];?>
    | print date: <?php $today = date('M. d, Y');
    echo $today; ?>
</div>


    <?php include('includes/script.php') ?>


</body>
    

</html>