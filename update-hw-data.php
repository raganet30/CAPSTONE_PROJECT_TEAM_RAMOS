<?php 
    include("dbcon.php");
    session_start();

    if (isset($_POST['btn_save'])) 
    {
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        
        $bday = new DateTime($_POST['dob']);
        $dob=date("Y-m-d",strtotime($_POST['dob']));
       

        //$age = $_POST['age'];
        $gender = $_POST['gender'];
        $barangay = $_POST['barangay'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];

        $joindate=date("Y-m-d",strtotime($_POST['joindate']));
        $role = $_POST['role'];
        


        if ($_POST['dob']==null && $_POST['joindate']==null) 
        {
             $query ="update healthworker set hw_fname='$fname',hw_mi='$mi',hw_lname='$lastname',hw_email='$email',hw_gender='$gender',hw_brgy='$barangay',hw_city='$city',hw_province='$province',hw_phone='$phone',hw_status='$status', hw_designation='$role' where hw_id='$id' ";
             $query_run= mysqli_query($con,$query);

            


        }

        elseif ($_POST['dob']==null&&$_POST['joindate']!=null) 
        {
             $query ="update healthworker set hw_fname='$fname',hw_mi='$mi',hw_lname='$lastname',hw_email='$email',hw_gender='$gender',hw_brgy='$barangay',hw_city='$city',hw_province='$province',hw_phone='$phone',hw_status='$status', hw_joindate='$joindate',hw_designation='$role' where hw_id='$id' ";
             $query_run= mysqli_query($con,$query);
        }

        elseif ($_POST['joindate']==null&&$_POST['dob']!=null) 
        {
             $query ="update healthworker set hw_fname='$fname',hw_mi='$mi',hw_lname='$lastname',hw_email='$email',hw_bdate='$dob',hw_gender='$gender',hw_brgy='$barangay',hw_city='$city',hw_province='$province',hw_phone='$phone',hw_status='$status',hw_designation='$role' where hw_id='$id' ";
             $query_run= mysqli_query($con,$query);
        }



        else
        {
            $query ="update healthworker set hw_fname='$fname',hw_mi='$mi',hw_lname='$lastname',hw_email='$email',hw_bdate='$dob',hw_gender='$gender',hw_brgy='$barangay',hw_city='$city',hw_province='$province',hw_phone='$phone',hw_status='$status',hw_joindate='$joindate',hw_designation='$role' where hw_id='$id' ";

        $query_run= mysqli_query($con,$query);

        }
        
          
       

        if ($query_run) 
        {
            ?>
            
            <?php

            $_SESSION['status'] = "Data saved successfully!";
            header("location:healthworkers.php");
           
        }
        else
        {
            $_SESSION['status'] = "Data saving failed!";
            header("location:healthworkers.php");
        }





    }

    

?>