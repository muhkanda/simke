<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT tb_pengguna.id_pegawai, username, password, role, email, nama_lengkap FROM tb_pengguna INNER JOIN tb_pegawai ON tb_pengguna.id_pegawai = tb_pegawai.id_pegawai";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getPengguna() {
		global $conn;
		$sql 	= "SELECT * FROM tb_pegawai";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData($id, $username, $password, $role, $email) {
		global $conn;
		$sql 	= "INSERT INTO tb_pengguna (id_pegawai, username, password, role, email) VALUES ('$id','$username','$password','$role','$email')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function showData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "SELECT * FROM tb_pengguna WHERE id_pegawai='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_close($conn);
	}

	function editData($id, $username, $password, $role, $email) {
		global $conn;
		$sql 	= "UPDATE tb_pengguna SET username='$username', password='$password', role='$role', email='$email' WHERE id_pegawai='$id'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id) {
		global $conn;
		$sql 	= "DELETE FROM tb_pengguna WHERE id_pegawai='$id'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$id		= mysqli_real_escape_string($conn, $_POST['id_pegawai']);
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$password	= mysqli_real_escape_string($conn, md5($_POST['password']));
		$role 		= mysqli_real_escape_string($conn, $_POST['role']);
		$email 		= mysqli_real_escape_string($conn, $_POST['email']);
		$add 		= addData($id, $username, $password, $role, $email);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_pengguna.php");
	}elseif (isset($_POST['edit'])) {
		$id			= mysqli_real_escape_string($conn, $_POST['id_pegawai']);
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$password	= mysqli_real_escape_string($conn, md5($_POST['password']));
		$role 		= mysqli_real_escape_string($conn, $_POST['role']);
		$email 		= mysqli_real_escape_string($conn, $_POST['email']);
		$edit 		= editData($id, $username, $password, $role, $email);
		session_start();
		unset ($_SESSION["message"]);
		if ($edit) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_pengguna.php");
	}elseif (isset($_GET['hapus'])) {
		$id		= mysqli_real_escape_string($conn, $_GET['hapus']);
		$delete = deleteData($id);
		session_start();
		unset ($_SESSION["message"]);
		if ($delete) {			
			$_SESSION['message'] = $deleted;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_pengguna.php");
	}

?>