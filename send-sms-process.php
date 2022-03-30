<?php 
	include("dbcon.php");
    include("currentdate.php");
	session_start();

	if (isset($_POST['btn_send'])) 
	{


         //use the CURL method if you want to use this SMS API in live host while CURL-less method in localhost


//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
}
//##########################################################################


/**
 * 
 * 
 * //use the CURL method if you want to use this SMS API in live host while CURL-less method in localhost

//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
             curl_setopt($ch, CURLOPT_POSTFIELDS, 
                      http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
}
//##########################################################################

**/



        $message=$_POST['message']."-Cagsalaosao HC";

        $api="TR-KENNE713721_PEFGQ";
        $pass="e5h!af6x9f";


		$clientnum="";
        $values = $_POST['search'];

        $stripped = str_replace(' ', '', $values);


        $query = "select * from client where concat(client_fname,client_mi,client_lname)  like '%$stripped%'  ";
        $query_run = mysqli_query($con,$query);
         if ($query_run) 
         {
             while ($row=mysqli_fetch_array($query_run)) 
             {
                 $clientnum .= $row['client_phone'];
                 
             }
         }




        $result = itexmo($clientnum,$message,$api, $pass);
        if ($result == "")
        {
                echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
            Please CONTACT US for help. ";  
        }
        else if ($result == 0)
        {
            $_SESSION['status'] = "SMS Text Sent sucessfully!";
            header("location:sms.php");



            $userid=$_POST['userid'];
            $activity="sent SMS text message to"." ".$clientnum;
            $query2="insert into log(log_user,log_activity,log_date) values('$userid','$activity','$logdate2')";
            $query_run2= mysqli_query($con,$query2);


        }




        else
        {   
            //echo "Error Num ". $result . " was encountered!";

            $_SESSION['status'] = "SMS Text sending failed!"."Error Num ". $result . " was encountered!";
            header("location:sms.php");
        }












          




       
	}



 ?>