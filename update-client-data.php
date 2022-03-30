<?php 
    include("dbcon.php");
    include("currentdate.php");
    session_start();

    if (isset($_POST['btn_save'])) 
    {
        
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $mi = $_POST['mi'];
        $lastname = $_POST['lastname'];
        //$email = $_POST['email'];
        
        $bday = new DateTime($_POST['dob']);
        $dob=date("Y-m-d",strtotime($_POST['dob']));
       

        //$age = $_POST['age'];
        $gender = $_POST['gender'];
        $barangay = $_POST['brgy'];
        $street=$_POST['street'];
        $purok=$_POST['purok'];
        $mother=$_POST['mother'];
        $father=$_POST['father'];
        $phone = $_POST['phone'];
        $status = $_POST['status'];

        $joindate=date("Y-m-d",strtotime($_POST['joindate']));

        if ($_POST['dob']==null && $_POST['joindate']==null) 
        {
             $query ="update client set client_fname='$fname',client_mi='$mi',client_lname='$lastname',client_gender='$gender',client_brgy='$barangay',client_street='$street',client_purok='$purok',client_mother='$mother',client_father='$father',client_phone='$phone',client_status='$status' where client_id='$id' ";
             $query_run= mysqli_query($con,$query);

            

        }

        elseif ($_POST['dob']==null&&$_POST['joindate']!=null) 
        {
             $query ="update client set client_fname='$fname',client_mi='$mi',client_lname='$lastname',client_gender='$gender',client_brgy='$barangay',client_street='$street',client_purok='$purok',client_mother='$mother',client_father='$father',client_phone='$phone',client_status='$status',client_joindate='$joindate' where client_id='$id' ";
             $query_run= mysqli_query($con,$query);
        }

        elseif ($_POST['joindate']==null&&$_POST['dob']!=null) 
        {
             $query ="update client set client_fname='$fname',client_mi='$mi',client_lname='$lastname',client_bdate='$dob',client_gender='$gender',client_brgy='$barangay',client_street='$street',client_purok='$purok',client_mother='$mother',client_father='$father',client_phone='$phone',client_status='$status' where client_id='$id' ";
             $query_run= mysqli_query($con,$query);
        }



        else
        {
            $query ="update client set client_fname='$fname',client_mi='$mi',client_lname='$lastname',client_bdate='$dob',client_gender='$gender',client_brgy='$barangay',client_street='$street',client_purok='$purok',client_mother='$mother',client_father='$father',client_phone='$phone',client_status='$status',client_joindate='$joindate' where client_id='$id' ";

        $query_run= mysqli_query($con,$query);

        }
        
          
       
        if ($query_run) 
        {
            ?>
            
            <?php

            $_SESSION['status'] = "Data saved successfully!";
            header("location:clients.php");


           

            $userid=$_POST['userid'];
            $activity="updated client details ID no.".$id;
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);
           
        }
        else
        {
            $_SESSION['status'] = "Data saving failed!";
            header("location:clients.php");
        }





    }

?>