<?php
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	require_once 'koneksi.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
if (isset($_POST['submit_email'])) {
	
	$toEmail = $_POST['email'];
	$query = "Select level from akun where email='$toEmail'";
	$role= mysqli_query($koneksi, $query);
	$row = mysqli_fetch_array($role);
	//token
	$code = uniqid(true);
	$token = mysqli_query($koneksi,"insert into resetPasswords(code,email) values('$code','$toEmail')");
	if(!$token){
		exit("Error");
	}
	
	session_start();
  if($_SESSION['status'] == "login"){  
		/Create instance of PHPMailer
		$mail = new PHPMailer();
		//Set mailer to use smtp
		$mail->isSMTP();
		//Define smtp host
		$mail->Host = "smtp.gmail.com";
		//Enable smtp authentication
		$mail->SMTPAuth = true;
		//Set smtp encryption type (ssl/tls)
		$mail->SMTPSecure = "tls";
		//Port to connect smtp
		$mail->Port = "587";
		//Set gmail username
		$mail->Username = "infobbppt@gmail.com";
		//Set gmail password
		$mail->Password = "emailtesting";
		//Email subject
		$mail->Subject = "KMS BBPPT Reset Password";
		$mail->setFrom('infobbppt@gmail.com');
		//Enable HTML
		$mail->isHTML(true);
		//Attachment
		
		
		//$url= "https://".$SERVER["HTTPS_HOST"].dirname[$_SERVER["PHP_SELF"])."/new%20password.php?code=$code";
		
		//Email body
		$mail->Body = "<h3>Reset Password Akun KMS</h3><p>Akun Anda:</p><p>Email: $toEmail</p><p>Silahkan klik tautan di bawah ini</p> <a href='https://kms-bbppt.herokuapp.com/new%20password.php?code=$code'>Reset Password</a>";
		
		//Add recipient
		$mail->addAddress($toEmail);
		
		$mail->addReplyTo('no-reply@gmail.com','No reply');
		//Finally send email
		if ( $mail->send() ) {
			echo "<script> alert('Email telah terkirim. Silahkan lihat kotak masuk anda!'); window.location = 'login.php'; </script>";
		}else{
			echo "<script> alert('Email tidak dapat dikirim. Terjadi kesalahan.'); window.location = 'login.php'; </script>";
		}
		//Closing smtp connection
		$mail->smtpClose();
	}elseif (mysqli_num_rows($role)>0 and $row['level'] == "Admin" ){
		//Create instance of PHPMailer
		$mail = new PHPMailer();
		//Set mailer to use smtp
		$mail->isSMTP();
		//Define smtp host
		$mail->Host = "smtp.gmail.com";
		//Enable smtp authentication
		$mail->SMTPAuth = true;
		//Set smtp encryption type (ssl/tls)
		$mail->SMTPSecure = "tls";
		//Port to connect smtp
		$mail->Port = "587";
		//Set gmail username
		$mail->Username = "infobbppt@gmail.com";
		//Set gmail password
		$mail->Password = "emailtesting";
		//Email subject
		$mail->Subject = "KMS BBPPT Reset Password";
		$mail->setFrom('infobbppt@gmail.com');
		//Enable HTML
		$mail->isHTML(true);
		//Attachment
		
		
		//$url= "https://".$SERVER["HTTPS_HOST"].dirname[$_SERVER["PHP_SELF"])."/new%20password.php?code=$code";
		
		//Email body
		$mail->Body = "<h3>Reset Password </h3><p>Akun Anda:</p><p>Email: $toEmail</p><p>Silahkan klik tautan di bawah ini</p> <a href='https://kms-bbppt.herokuapp.com/new%20password.php?code=$code'>Reset Password</a>";
		
		//Add recipient
		$mail->addAddress($toEmail);
		
		$mail->addReplyTo('no-reply@gmail.com','No reply');
		//Finally send email
		if ( $mail->send() ) {
			echo "<script> alert('Email telah terkirim. Silahkan lihat kotak masuk anda!'); window.location = 'login.php'; </script>";
		}else{
			echo "<script> alert('Email tidak dapat dikirim. Terjadi kesalahan.'); window.location = 'login.php'; </script>";
		}
	//Closing smtp connection
	$mail->smtpClose();
	}elseif (mysqli_num_rows($role)>0 and $row['level'] != "admin" ){
			echo "<script> alert('Untuk Mereset password anda, silahkan hubungi admin'); window.location = 'login.php'; </script>";
			
	}else{
		echo "<script> alert('Email anda tidak terdaftar di sistem'); window.location = 'login.php'; </script>";//jika pesan terkirim
	} 
	
}


