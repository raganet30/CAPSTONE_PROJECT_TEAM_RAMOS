<?php
session_start();
include('dbcon.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions


	function sendmail_verify($username,$email,$verify_token)
	{
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$mail = new PHPMailer(true);

		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);


		$mail->isSMTP();     //disable this line if use in live hosting                                 // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'olshopee1230@gmail.com';                 // SMTP username
		$mail->Password = 'olshopping1230';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('olshopee1230@gmail.com', 'Baranggay Health Center');
		$mail->addAddress($email);     // Add a recipient
		//$mail->addAddress($name);               // Name is optional
		//$mail->addReplyTo('neth3039@gmail.com', 'Information');
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Account Verification';
		
		$email_template = "
		<h2>You have registered to Baranggay E-Healthcare.</h2>
       <h5>Kindly verify your account by clicking the link given below.</h5>
       <br><br>
       <a href='http://localhost/baranggayE-HealthCare/verify-email.php?token=$verify_token'>Click Here.</a>
		";

		$mail->Body = $email_template;
		$mail->send();
		//echo "Message has been sent.";
	}





	if (isset($_POST['register_btn']))
	{
		$username= $_POST['username'];
		$email= $_POST['email'];
		$role=$_POST['role'];
		$password= md5($_POST['password']);
		$con_password= md5($_POST['con_password']);
		$verify_token = md5(rand());

		$today = date('Y-m-d');

		//sendmail_verify("$username","$email","$verify_token");
		//echo "sent";

		//check existing email
		$check_email_query ="select email from admin_user where email= '$email' LIMIT 1";
		$check_email_query_run = mysqli_query($con,$check_email_query);

		//check existing username
		$check_email_query2 ="select username from admin_user where username= '$username' LIMIT 1";
		$check_email_query_run2 = mysqli_query($con,$check_email_query2);






		if (mysqli_num_rows($check_email_query_run)>0) 
		{
			$_SESSION['status'] = "Email already exists.";
			header("location:register.php");
		}


		elseif (mysqli_num_rows($check_email_query_run2)>0) 
		{
			$_SESSION['status'] = "Username already exists.";
			header("location:register.php");
		}




		elseif ($password!=$con_password) 
		{
			$_SESSION['status'] = "Password did not match.";
			header("location:register.php");
		}


		else
		{
			//insert user data
			$query = "insert into admin_user (username,email,password,verify_token,role,date_created) values ('$username','$email','$password','$verify_token','$role','$today') ";
			$query_run= mysqli_query($con,$query);

			if ($query_run) 
			{
			sendmail_verify("$username","$email","$verify_token");
				
				
			$_SESSION['status'] = "Registration successful. Account Verification was sent to this email:"." ".$email;
			header("location:register.php");
			}
			else
			{
			$_SESSION['status'] = "Registration failed!";
			header("location:register.php");
			}

		}

		


	}



 ?>