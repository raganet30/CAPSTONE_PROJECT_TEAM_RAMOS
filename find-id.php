<?php 
    include('dbcon.php');
    session_start();
    


    $username=$_SESSION['username'];

    $login_query = "select  * from admin_user where username='$username'  limit 1 ";
    $login_query_run =mysqli_query($con,$login_query);
    $userid="";

        if (mysqli_num_rows($login_query_run)>0) 
        {
            $row = mysqli_fetch_array($login_query_run);
            $userid .= $row['id'];
        }

        

        $GLOBALS['userid'] = $userid;

      
 ?>