<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getPeriode() {
		global $conn;
		$sql 	= "SELECT * FROM tb_arus_kas_periode ORDER BY id_periode DESC";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getPeriodeDetail($id_periode) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_periode);
        $sql    = "SELECT * FROM tb_arus_kas_periode WHERE id_periode='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getDataak($id_periode) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_periode);
        $sql    = "SELECT * FROM tb_arus_kas_data WHERE id_periode='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getdetailak($id_ak_data) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_ak_data);
        $sql    = "SELECT * FROM tb_arus_kas_data WHERE id_ak_data='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

	function addPeriode($periode, $keterangan, $tgl_update) {
		global $conn;
		$sql 	= "INSERT INTO tb_arus_kas_periode (periode, keterangan, tgl_update) VALUES ('$periode','$keterangan','$tgl_update')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function addaruskas($id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir) {
		global $conn;
		$sql 	= "INSERT INTO tb_arus_kas_data (id_periode, ket_biaya, tgl_masuk, saldo_awal, bulan_berjalan, saldo_akhir) VALUES ('$id_periode', '$ket_biaya', '$tgl_masuk', '$saldo_awal', '$bulan_berjalan', '$saldo_akhir')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function UpdateData($id_ak_data, $id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_ak_data);
		$sql 	= "UPDATE tb_arus_kas_data SET id_periode='$id_periode', ket_biaya='$ket_biaya', tgl_masuk='$tgl_masuk', saldo_awal='$saldo_awal', bulan_berjalan='$bulan_berjalan', saldo_akhir='$saldo_akhir' WHERE id_ak_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id_ak_data) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_ak_data);
		$sql 	= "DELETE FROM tb_arus_kas_data WHERE id_ak_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['addak'])) {
        $id_periode         = mysqli_real_escape_string($conn, $_POST['id_periode']);
        $ket_biaya         	= mysqli_real_escape_string($conn, $_POST['ket_biaya']);
        $tgl_masuk         	= mysqli_real_escape_string($conn, $_POST['tgl_masuk']);
        $saldo_awal        	= mysqli_real_escape_string($conn, $_POST['saldo_awal']);
        $bulan_berjalan    	= mysqli_real_escape_string($conn, $_POST['bulan_berjalan']);
        $saldo_akhir        = mysqli_real_escape_string($conn, $_POST['saldo_akhir']);
        $add_ak            = addaruskas($id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir);
        session_start();
        unset ($_SESSION["message"]);
        if ($add_ak) {
            $_SESSION['message'] = $added;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_periode_kas.php?data=".$id_periode);
    }

    if (isset($_POST['updateak'])) {
		$id_ak_data 		= mysqli_real_escape_string($conn, $_POST['id_ak_data']);
		$id_periode			= mysqli_real_escape_string($conn, $_POST['id_periode']);
		$ket_biaya			= mysqli_real_escape_string($conn, $_POST['ket_biaya']);
		$tgl_masuk			= mysqli_real_escape_string($conn, $_POST['tgl_masuk']);
		$saldo_awal			= mysqli_real_escape_string($conn, $_POST['saldo_awal']);
		$bulan_berjalan 	= mysqli_real_escape_string($conn, $_POST['bulan_berjalan']);
		$saldo_akhir 		= mysqli_real_escape_string($conn, $_POST['saldo_akhir']);
		$updateak 			= UpdateData($id_ak_data, $id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir);
		session_start();
		unset ($_SESSION["message"]);
		if ($updateak) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../detail_periode_kas.php?data=".$id_periode);
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
		header("location:../kelola_arus_kas.php");
	}

	if (isset($_GET['periode']) && isset($_GET['hapus'])) {
        $id_periode = $_GET['periode'];
        $id_ak_data = $_GET['hapus'];
        $del = deleteData($id_ak_data);
        session_start();
        unset ($_SESSION["message"]);
        if ($del) {         
            $_SESSION['message'] = $deleted;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_periode_kas.php?data=".$id_periode);
    }


?>