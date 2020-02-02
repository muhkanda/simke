<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT * FROM tb_akun";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData($kode_akun, $nama_akun, $jenis, $grup) {
		global $conn;
		$sql 	= "INSERT INTO tb_akun (kode_akun, nama_akun, jenis, grup) VALUES ('$kode_akun', '$nama_akun',' $jenis', '$grup')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function showData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "SELECT * FROM tb_akun WHERE id_akun='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_close($conn);
	}

	function editData($id, $kode_akun, $nama_akun, $jenis, $grup) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "UPDATE tb_akun SET kode_akun='$kode_akun', nama_akun='$nama_akun', jenis='$jenis', grup='$grup' WHERE id_akun='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "DELETE FROM tb_akun WHERE id_akun='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$kode_akun = mysqli_real_escape_string($conn, $_POST['kode_akun']);
		$nama_akun	  = mysqli_real_escape_string($conn, $_POST['nama_akun']);
		$jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
		$grup = mysqli_real_escape_string($conn, $_POST['grup']);
		$add 		  = addData($kode_akun, $nama_akun, $jenis, $grup);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_akun.php");
	}elseif (isset($_POST['edit'])) {
		$id			  = mysqli_real_escape_string($conn, $_POST['id_akun']);
		$kode_akun = mysqli_real_escape_string($conn, $_POST['kode_akun']);
		$nama_akun	  = mysqli_real_escape_string($conn, $_POST['nama_akun']);
		$jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
		$grup = mysqli_real_escape_string($conn, $_POST['grup']);	
		$edit 		  = editData($id ,$kode_akun, $nama_akun, $jenis, $grup);
		session_start();
		unset ($_SESSION["message"]);
		if ($edit) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_akun.php");
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
		header("location:../kelola_akun.php");
	}

?>