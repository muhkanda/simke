<?php

	require_once 'database.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT * FROM tb_pegawai";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData($nik, $nama_lengkap, $no_hp, $alamat, $status_pegawai) {
		global $conn;
		$sql 	= "INSERT INTO tb_pegawai (nik, nama_lengkap, no_hp, alamat, status_pegawai) VALUES ('$nik','$nama_lengkap','$no_hp','$alamat','$status_pegawai')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function UpdateData($id_pegawai, $nik, $nama_lengkap, $no_hp, $alamat, $status_pegawai) {
		global $conn;
		$sql 	= "UPDATE tb_pegawai SET nik='$nik', nama_lengkap='$nama_lengkap', no_hp='$no_hp', alamat='$alamat', status_pegawai='$status_pegawai' WHERE id_pegawai='$id_pegawai'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function editData($id) {
		global $conn;
		$sql 	= "SELECT * FROM tb_pegawai where id_pegawai='$id'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function deleteData($id) {
		global $conn;
		$sql 	= "DELETE FROM tb_pegawai WHERE id_pegawai='$id'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$nik				= mysqli_real_escape_string($conn, $_POST['nik']);
		$nama_lengkap		= mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
		$no_hp				= mysqli_real_escape_string($conn, $_POST['no_hp']);
		$alamat 			= mysqli_real_escape_string($conn, $_POST['alamat']);
		$status_pegawai 	= mysqli_real_escape_string($conn, $_POST['status_pegawai']);
		$add 				= addData($nik, $nama_lengkap, $no_hp, $alamat, $status_pegawai);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = 'succesed';
		}else {
			$_SESSION['message'] = 'failed';
		}
		header("location:../kelola_pegawai.php");
	}

	if (isset($_GET['hapus'])) {
		$id = $_GET['hapus'];
		$deleted = deleteData($id);
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = 'succesed';
		}else {
			$_SESSION['message'] = 'failed';
		}
		header("location:../kelola_pegawai.php");
	}

	if (isset($_POST['update'])) {
		$id 				= mysqli_real_escape_string($conn, $_POST['id_pegawai']);
		$nik				= mysqli_real_escape_string($conn, $_POST['nik']);
		$nama_lengkap		= mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
		$no_hp				= mysqli_real_escape_string($conn, $_POST['no_hp']);
		$alamat 			= mysqli_real_escape_string($conn, $_POST['alamat']);
		$status_pegawai 	= mysqli_real_escape_string($conn, $_POST['status_pegawai']);
		$update 			= UpdateData($id, $nik, $nama_lengkap, $no_hp, $alamat, $status_pegawai);
		session_start();
		unset ($_SESSION["message"]);
		if ($update) {			
			$_SESSION['message'] = 'succesed';
		}else {
			$_SESSION['message'] = 'failed';
		}
		header("location:../kelola_pegawai.php");
	}

?>