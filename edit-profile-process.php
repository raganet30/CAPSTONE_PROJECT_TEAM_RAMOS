<?php 
   include("dbcon.php");
   include("currentdate.php");
   session_start();
  


   $id=$_POST['id'];
   $oldpass=$_POST['oldpass'];
   $username=$_POST['username'];
   
   $password=md5($_POST['password']);
   $new_password=md5($_POST['new_password']);
   $con_password=md5($_POST['con_password']);

      if (isset($_POST['save'])) 
      {
        

         if($oldpass==$password)
         {
            if ($new_password==$con_password) 
            {
               $query ="update admin_user set username='$username', password='$new_password' where id='$id'  ";
               $query_run= mysqli_query($con,$query);


                   if ($query_run) 
                 {
                   
                     $_SESSION['status'] = "Data saved successfully!";
                     header("location:edit-profile.php?id=$id");
                    
                    unset($_SESSION['username']);

                    $_SESSION['username']=$username;





            $userid=$_POST['userid'];
            $activity="updated profile information.";
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);



                    
                 }
                 else
                 {
                     $_SESSION['status'] = "Data saving failed!";
                     header("location:edit-profile.php?id=$id");
                 }
            }

            else
            {
                     $_SESSION['status'] = "New Password did not match!";
                     header("location:edit-profile.php?id=$id");
            }

         }

         else
            {
                     $_SESSION['status'] = "Old Password did not match!";
                     header("location:edit-profile.php?id=$id");
            }

            


                                   
              
      
        
      }

      
     

 ?>