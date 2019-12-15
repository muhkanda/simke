<?php

	require_once 'database.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT * FROM tb_user";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData($nama, $username, $password, $role) {
		global $conn;
		$sql 	= "INSERT INTO tb_user (nama, username, password, role) VALUES ('$nama','$username','$password','$role')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function editData() {
		global $conn;
	}

	function deleteData() {
		global $conn;
	}

	if (isset($_POST['add'])) {
		$nama		= mysqli_real_escape_string($conn, $_POST['nama']);
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$password	= mysqli_real_escape_string($conn, md5($_POST['password']));
		$role 		= mysqli_real_escape_string($conn, $_POST['role']);
		$add 		= addData($nama, $username, $password, $role);
		session_start();
		if ($add) {			
			$_SESSION['message'] = 'added';
		}else {
			$_SESSION['message'] = 'addfail';
		}
		header("location:../kelola_pengguna.php");
	}

?>