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

	function showData($id) {
		global $conn;
		$sql 	= "SELECT * FROM tb_user WHERE id_user='$id'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_close($conn);
	}

	function editData($id, $nama, $username, $password, $role) {
		global $conn;
		$sql 	= "UPDATE tb_user SET nama='$nama', username='$username', password='$password', role='$role' WHERE id_user='$id'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id) {
		global $conn;
		$sql 	= "DELETE FROM tb_user WHERE id_user='$id'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$nama		= mysqli_real_escape_string($conn, $_POST['nama']);
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$password	= mysqli_real_escape_string($conn, md5($_POST['password']));
		$role 		= mysqli_real_escape_string($conn, $_POST['role']);
		$add 		= addData($nama, $username, $password, $role);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = '<script>$("body").toast({title:"Proses Tambah Berhasil!",message:"Data Berhasil Ditambahkan!",showProgress:"bottom",classProgress:"green"});</script>';
		}else {
			$_SESSION['message'] = '<script>$("body").toast({title:"Proses Tambah Gagal!",message:"Data Gagal Ditambahkan!",showProgress:"bottom",classProgress:"red"});</script>';
		}
		header("location:../kelola_pengguna.php");
	}elseif (isset($_POST['edit'])) {
		$id			= mysqli_real_escape_string($conn, $_POST['id']);
		$nama		= mysqli_real_escape_string($conn, $_POST['nama']);
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$password	= mysqli_real_escape_string($conn, md5($_POST['password']));
		$role 		= mysqli_real_escape_string($conn, $_POST['role']);
		$edit 		= editData($id ,$nama, $username, $password, $role);
		session_start();
		unset ($_SESSION["message"]);
		if ($edit) {			
			$_SESSION['message'] = '<script>$("body").toast({title:"Proses Edit Berhasil!",message:"Data Berhasil Diubah!",showProgress:"bottom",classProgress:"green"});</script>';
		}else {
			$_SESSION['message'] = '<script>$("body").toast({title:"Proses Edit Gagal!",message:"Data Gagal Diubah!",showProgress:"bottom",classProgress:"red"});</script>';
		}
		header("location:../kelola_pengguna.php");
	}elseif (isset($_GET['hapus'])) {
		$id		= mysqli_real_escape_string($conn, $_GET['hapus']);
		$delete = deleteData($id);
		session_start();
		unset ($_SESSION["message"]);
		if ($delete) {			
			$_SESSION['message'] = '<script>$("body").toast({title:"Proses Hapus Berhasil!",message:"Data Berhasil Dihapus!",showProgress:"bottom",classProgress:"green"});</script>';
		}else {
			$_SESSION['message'] = '<script>$("body").toast({title:"Proses Hapus Gagal!",message:"Data Gagal Dihapus!",showProgress:"bottom",classProgress:"red"});</script>';
		}
		header("location:../kelola_pengguna.php");
	}

?>