<?php
	session_start();
	require_once 'database.php';
	$username	= mysqli_real_escape_string($conn, $_POST['username']);
	$password	= mysqli_real_escape_string($conn, $_POST['password']);
	$encrypted	= md5($password);
	$query		= mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$encrypted'");
	$data 		= mysqli_num_rows($query);
	if ($data > 0) {
		$_SESSION['login'] = "yes";
		while ($key = mysqli_fetch_array($query)) {
			$_SESSION['nama'] = $key['nama'];
			// $_SESSION['role'] = $key['role'];
		}
		header("location:../index.php?success");
	}else{
		header("location:../login.php?failed");
	}
?>