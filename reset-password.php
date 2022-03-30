<?php 
	session_start();
	include('dbcon.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader 
	require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
	function	send_password_reset($get_name,$get_email,$token)
	{
		$email=$_POST['email'];

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

		$mail->Subject = 'Password Recovery';
		
		$email_template = "
		<h2>You are receiving this email because our system received a password recovery request for your account.</h2>
       <h5>You can now change your password by clicking the link given below.</h5>
       <br><br>
       <a href='http://localhost/baranggayE-HealthCare/password-change.php?token=$token&email=$get_email'>Click Here.</a>
		";

		$mail->Body = $email_template;
		$mail->send();
		

	}







	if (isset($_POST['btn_reset'])) 
	{
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$token = md5(rand());

		$check_email="select email from admin_user where email = '$email' limit 1 ";
		$check_email_run = mysqli_query($con,$check_email);

		if (mysqli_num_rows($check_email_run)>0) 
		{
			$row = mysqli_fetch_array($check_email_run);
			$get_name = $row['username'];
			$get_email= $row['email'];


			$update_token = "update admin_user set verify_token='$token' where email='$get_email' limit 1 ";

			$update_token_run = mysqli_query($con,$update_token);


			if ($update_token_run) 
			{
				send_password_reset($get_name,$get_email,$token);
				$_SESSION['status']= "Password recovery link was sent to your e-mail.";
				header("location:forgot-password.php");
				exit(0);

			}
			else
			{	
				$_SESSION['status']= "Something went wrong###!.";
				header("location:forgot-password.php");
				exit(0);

			}



		}
		else
		{
			$_SESSION['status']= "No email found!.";
			header("location:forgot-password.php");
			exit(0);


		}



	}



	if (isset($_POST['save_pass'])) 
	{
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password = mysqli_real_escape_string($con,md5($_POST['password']));
		$con_password = mysqli_real_escape_string($con,md5($_POST['con_password']));
		$token = mysqli_real_escape_string($con,$_POST['token']);

		if (!empty($token)) 
		{
			if (!empty($token) && !empty($password) && !empty($con_password) ) 
			{
				 //checking token validity

				$check_token = "select email from admin_user where email='$email' limit 1 ";
				$check_token_run = mysqli_query($con, $check_token);

				if (mysqli_num_rows($check_token_run)>0) 
				{
							if ($password==$con_password) 
							{
								$update_password="update admin_user set password ='$password' where email='$email' ";
								$update_password_run = mysqli_query($con,$update_password);

								$_SESSION['status']= "Password changed successfuly.";
									header("location:login.php");
									exit(0);
									
									/*
									if ($update_token_run) 
									{
										$_SESSION['status']= "Password changed successfuly.";
									header("location:login.php");
									exit(0);
									}

									else
									{
									$_SESSION['status']= "Failed to change password!";
									header("location:password-change.php?token=$token&email=$email");
									exit(0);
									} 
									*/

							}

							else
							{
							$_SESSION['status']= "Password did not match";
							header("location:forgot-password.php?token=$token&email=$email");
							exit(0);
							}
				}

				else
				{
					$_SESSION['status']= "Invalid token!";
			header("location:password-change.php?token=$token&email=$email");
			exit(0);
				}


			}

			else
			{
			$_SESSION['status']= "Please fill out form.";
			header("location:forgot-password.php?token=$token&email=$email");
			exit(0);

			}
			
		}
		else
		{
			$_SESSION['status']= "No token available!.";
			header("location:forgot-password.php");
			exit(0);
		}


	}






 ?>