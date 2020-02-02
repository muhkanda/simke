<?php

require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';
require '../lib/PHPMailer/src/Exception.php';
require_once 'database.php';
include_once 'helper.php';

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function reset_password($email, $random) {
	global $conn;
	$password =  md5($random);
	$sql 	= "UPDATE tb_pengguna SET password='$password' WHERE email='$email'";
	$result	= mysqli_query($conn, $sql);
	return ($result) ? true : false;
	mysqli_close($conn);
}

if (isset($_POST['submit'])) {
	$random = generateRandomString();
	$email	= $_POST['email'];
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->Username = "help.simke@gmail.com";
	$mail->Password = "lorem0909";
	$mail->SetFrom("help.simke@gmail.com");
	$mail->Subject = "Request Password Baru";
	$mail->Body = "Halo, Ini Password Baru Anda : ".$random;
	$mail->AddAddress($email);
	$mail->Send();
	$aksi = reset_password($email, $random);
	session_start();
	unset ($_SESSION["message"]);
	if ($aksi) {			
		$_SESSION['message'] = $reseted;
	}else {
		$_SESSION['message'] = $failed;
	}
	header('Location: /simke/login.php');
}


?>