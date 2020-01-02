<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT * FROM tb_jenis_anggaran";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function addData($pos_anggaran) {
		global $conn;
		$sql 	= "INSERT INTO tb_jenis_anggaran (pos_anggaran) VALUES ('$pos_anggaran')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function showData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "SELECT * FROM tb_jenis_anggaran WHERE id_jenis_anggaran='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_close($conn);
	}

	function editData($id, $pos_anggaran) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "UPDATE tb_jenis_anggaran SET pos_anggaran='$pos_anggaran' WHERE id_jenis_anggaran='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "DELETE FROM tb_jenis_anggaran WHERE id_jenis_anggaran='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$pos_anggaran = mysqli_real_escape_string($conn, $_POST['pos_anggaran']);
		$add 		  = addData($pos_anggaran);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_jenis_anggaran.php");
	}elseif (isset($_POST['edit'])) {
		$id			  = mysqli_real_escape_string($conn, $_POST['id']);
		$pos_anggaran = mysqli_real_escape_string($conn, $_POST['pos_anggaran']);	
		$edit 		  = editData($id ,$pos_anggaran);
		session_start();
		unset ($_SESSION["message"]);
		if ($edit) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_jenis_anggaran.php");
	}elseif (isset($_GET['hapus'])) {
		$id		= mysqli_real_escape_string($conn, $_GET['hapus']);
		$del = deleteData($id);
		session_start();
		unset ($_SESSION["message"]);
		if ($del) {			
			$_SESSION['message'] = $deleted;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_jenis_anggaran.php");
	}

?>