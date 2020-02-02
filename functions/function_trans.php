<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getData() {
		global $conn;
		$sql 	= "SELECT tb_transaksi.id_transaksi AS id_transaksi, tb_transaksi.keterangan AS keterangan,
					IF((SUM(tb_transaksi_detail.debit) IS NULL),0, SUM(tb_transaksi_detail.debit)) AS debit,
					IF((SUM(tb_transaksi_detail.kredit) IS NULL),0, SUM(tb_transaksi_detail.kredit)) AS kredit,
					IF((SUM(tb_transaksi_detail.debit) - SUM(tb_transaksi_detail.kredit) IS NULL),0, SUM(tb_transaksi_detail.debit) - SUM(tb_transaksi_detail.kredit)) AS total_trans
				FROM tb_transaksi
				LEFT JOIN tb_transaksi_detail ON tb_transaksi.id_transaksi = tb_transaksi_detail.id_transaksi
				GROUP BY tb_transaksi.id_transaksi";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getDataDetail($id) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id);
        $sql    = "SELECT * FROM tb_transaksi_detail WHERE id_transaksi='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

	function addDataTrans($keterangan) {
		global $conn;
		$sql 	= "INSERT INTO tb_transaksi (keterangan) VALUES ('$keterangan')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function addDetTrans($id_transaksi, $debit, $kredit) {
		global $conn;
		$sql 	= "INSERT INTO tb_transaksi_detail (id_transaksi, debit, kredit) VALUES ('$id_transaksi', '$debit', '$kredit')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function showDataTrans($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "SELECT * FROM tb_transaksi WHERE id_transaksi='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_close($conn);
	}

	function editDataTrans($id, $keterangan) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "UPDATE tb_transaksi SET keterangan='$keterangan' WHERE id_transaksi='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteDataTrans($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "DELETE FROM tb_transaksi WHERE id_transaksi='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteDetTrans($id) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id);
		$sql 	= "DELETE FROM tb_transaksi_detail WHERE id_trans_det='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['add'])) {
		$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
		$add 		  = addDataTrans($keterangan);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {			
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_transaksi.php");
	}elseif (isset($_POST['edit'])) {
		$id			  = mysqli_real_escape_string($conn, $_POST['id_transaksi']);
		$keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);	
		$edit 		  = editDataTrans($id ,$keterangan);
		session_start();
		unset ($_SESSION["message"]);
		if ($edit) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_transaksi.php");
	}elseif (isset($_GET['hapus'])) {
		$id		= mysqli_real_escape_string($conn, $_GET['hapus']);
		$delete = deleteDataTrans($id);
		session_start();
		unset ($_SESSION["message"]);
		if ($delete) {			
			$_SESSION['message'] = $deleted;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_transaksi.php");
	}elseif (isset($_POST['editTrans'])) {
		$id			  	= mysqli_real_escape_string($conn, $_POST['id_transaksi']);
		$debit 			= mysqli_real_escape_string($conn, $_POST['debit']);
		$kredit 		= mysqli_real_escape_string($conn, $_POST['kredit']);	
		$addTrans 		= addDetTrans($id, $debit, $kredit);
		session_start();
		unset ($_SESSION["message"]);
		if ($addTrans) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../edit_transaksi.php?id=".$id);
	}elseif (isset($_GET['hapusTrans'])) {
		$id		= mysqli_real_escape_string($conn, $_GET['hapusTrans']);
		$delete = deleteDetTrans($id);
		session_start();
		unset ($_SESSION["message"]);
		if ($delete) {			
			$_SESSION['message'] = $deleted;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_transaksi.php");
	}

?>