<?php
require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = "true";
	$mail->Port = "587";
	$mail->Username = "divyaprajapati180@gmail.com";
	$mail->Password = "Chaku@1998";
	$mail->Subject = "Testing";
	$mail->setFrom("bhavikapanchigar@gmail.com");
	$mail->isHTML(true);
	// $mail->addAttachment('image/1.png');
	$mail->Body = "Hello";
	$mail->addAddress("divyaprajapati180@gmail.com");
	if( $mail->Send() ){
		echo "Email Sent...";
	}else{
		echo "Email NOT Sent.";
	}
	$mail->smtpClose();

?>