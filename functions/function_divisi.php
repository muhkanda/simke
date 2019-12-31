<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT * FROM tb_divisi";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData($nama_divisi, $keterangan) {
		global $conn;
		$sql 	= "INSERT INTO tb_divisi (nama_divisi, keterangan) VALUES ('$nama_divisi','$keterangan')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function showData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "SELECT * FROM tb_divisi WHERE id_divisi='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_close($conn);
	}

	function editData($id, $nama_divisi, $keterangan) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "UPDATE tb_divisi SET nama_divisi='$nama_divisi', keterangan='$keterangan' WHERE id_divisi='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "DELETE FROM tb_divisi WHERE id_divisi='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$nama_divisi = mysqli_real_escape_string($conn, $_POST['nama_divisi']);
		$keterangan	  = mysqli_real_escape_string($conn, $_POST['keterangan']);
		$add 		  = addData($nama_divisi, $keterangan);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_divisi.php");
	}elseif (isset($_POST['edit'])) {
		$id			  = mysqli_real_escape_string($conn, $_POST['id']);
		$nama_divisi = mysqli_real_escape_string($conn, $_POST['nama_divisi']);
		$keterangan	  = mysqli_real_escape_string($conn, $_POST['keterangan']);		
		$edit 		  = editData($id ,$nama_divisi, $keterangan);
		session_start();
		unset ($_SESSION["message"]);
		if ($edit) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_divisi.php");
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
		header("location:../kelola_divisi.php");
	}

?>