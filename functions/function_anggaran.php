<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getPeriode() {
		global $conn;
		$sql 	= "SELECT * FROM tb_anggaran_periode ORDER BY id_periode DESC";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getRencana() {
		global $conn;
		$dateNow = date("Y-m-d");
		$beforeMonth = date('Y-m-d', strtotime('-1 month', strtotime($dateNow)));
		$dateFormat = date_create($beforeMonth);
		$beforePeriode = date_format($dateFormat, "Y-m");
		$dateFormat2 = date_create($dateNow);
		$nowPeriode = date_format($dateFormat2, "Y-m");


		$sql 	= "SELECT tb_transaksi.id_transaksi AS id_transaksi, tb_transaksi.keterangan AS keterangan, tb_transaksi.periode AS periode,
						IF((SUM(tb_transaksi_detail.debit) IS NULL),0, SUM(tb_transaksi_detail.debit)) AS debit,
						IF((SUM(tb_transaksi_detail.kredit) IS NULL),0, SUM(tb_transaksi_detail.kredit)) AS kredit,
						IF((SUM(tb_transaksi_detail.debit) - SUM(tb_transaksi_detail.kredit) IS NULL),0, SUM(tb_transaksi_detail.debit) - SUM(tb_transaksi_detail.kredit)) AS total_trans
					FROM tb_transaksi
					LEFT JOIN tb_transaksi_detail ON tb_transaksi.id_transaksi = tb_transaksi_detail.id_transaksi
					WHERE tb_transaksi.periode LIKE '%$beforePeriode%'
					GROUP BY tb_transaksi.id_transaksi
					ORDER BY tb_transaksi.id_transaksi DESC
					LIMIT 1";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getPeriodeDetail($id_periode) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_periode);
        $sql    = "SELECT * FROM tb_anggaran_periode WHERE id_periode='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

	function addPeriode($periode, $keterangan, $tgl_update) {
		global $conn;
		$sql 	= "INSERT INTO tb_anggaran_periode (periode, keterangan, tgl_update) VALUES ('$periode','$keterangan','$tgl_update')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	// END PERIODE

    function getDataag($id_periode) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_periode);
        $sql    = "SELECT * FROM tb_anggaran_data AS a INNER JOIN tb_jenis_anggaran AS b ON a.id_jenis_anggaran = b.id_jenis_anggaran WHERE id_periode='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getJenis() {
		global $conn;
		$sql 	= "SELECT * FROM tb_jenis_anggaran";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

    function getdetailag($id_anggaran_data) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_anggaran_data);
        $sql    = "SELECT * FROM tb_anggaran_data WHERE id_anggaran_data='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

	function addag($id_periode, $id_jenis_anggaran, $rencana_anggaran, $realisasi_anggaran, $status) {
		global $conn;
		$sql 	= "INSERT INTO tb_anggaran_data (id_periode, id_jenis_anggaran, rencana_anggaran, realisasi_anggaran, status) VALUES ('$id_periode', '$id_jenis_anggaran', '$rencana_anggaran', '$realisasi_anggaran', '$status')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function UpdateData($id_anggaran_data, $id_jenis_anggaran, $rencana_anggaran, $realisasi_anggaran, $status) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_anggaran_data);
		$sql 	= "UPDATE tb_anggaran_data SET id_jenis_anggaran='$id_jenis_anggaran', rencana_anggaran='$rencana_anggaran', realisasi_anggaran='$realisasi_anggaran', status='$status'WHERE id_anggaran_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id_anggaran_data) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_anggaran_data);
		$sql 	= "DELETE FROM tb_anggaran_data WHERE id_anggaran_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function getSelected($id_anggaran_data) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_anggaran_data);
		$sql 	= "SELECT a.id_jenis_anggaran, a.pos_anggaran, b.status FROM tb_jenis_anggaran AS a INNER JOIN tb_anggaran_data AS b ON a.id_jenis_anggaran = b.id_jenis_anggaran WHERE b.id_anggaran_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	if (isset($_POST['addag'])) {
        $id_periode         = mysqli_real_escape_string($conn, $_POST['id_periode']);
        $id_jenis_anggaran	= mysqli_real_escape_string($conn, $_POST['id_jenis_anggaran']);
        $rencana_anggaran  	= mysqli_real_escape_string($conn, $_POST['rencana_anggaran']);
        $realisasi_anggaran	= mysqli_real_escape_string($conn, $_POST['realisasi_anggaran']);
        $status		    	= mysqli_real_escape_string($conn, $_POST['status']);
        $add            	= addag($id_periode, $id_jenis_anggaran, $rencana_anggaran, $realisasi_anggaran, $status);
        session_start();
        unset ($_SESSION["message"]);
        if ($add) {
            $_SESSION['message'] = $added;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_periode_anggaran.php?data=".$id_periode);
    }

    if (isset($_POST['editag'])) {
    	$id_anggaran_data	= mysqli_real_escape_string($conn, $_POST['id_anggaran_data']);
		$id_periode         = mysqli_real_escape_string($conn, $_POST['id_periode']);
        $id_jenis_anggaran	= mysqli_real_escape_string($conn, $_POST['id_jenis_anggaran']);
        $rencana_anggaran  	= mysqli_real_escape_string($conn, $_POST['rencana_anggaran']);
        $realisasi_anggaran	= mysqli_real_escape_string($conn, $_POST['realisasi_anggaran']);
        $status		    	= mysqli_real_escape_string($conn, $_POST['status']);
        $update            	= UpdateData($id_anggaran_data, $id_jenis_anggaran, $rencana_anggaran, $realisasi_anggaran, $status);
		session_start();
		unset ($_SESSION["message"]);
		if ($update) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../detail_periode_anggaran.php?data=".$id_periode);
	}


	if (isset($_POST['tambah_periode'])) {
		$periode			= mysqli_real_escape_string($conn, $_POST['periode']);
		$keterangan			= mysqli_real_escape_string($conn, $_POST['keterangan']);
		$tgl_update			= date('Y-m-d');
        $add          		= addPeriode($periode, $keterangan, $tgl_update);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../kelola_anggaran.php");
	}

	if (isset($_GET['periode']) && isset($_GET['hapus'])) {
        $id_periode = $_GET['periode'];
        $id_anggaran_data = $_GET['hapus'];
        $del = deleteData($id_anggaran_data);
        session_start();
        unset ($_SESSION["message"]);
        if ($del) {         
            $_SESSION['message'] = $deleted;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_periode_anggaran.php?data=".$id_periode);
    }


?>