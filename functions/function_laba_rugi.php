<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getPeriode() {
		global $conn;
		$sql 	= "SELECT * FROM tb_laba_rugi_periode ORDER BY id_periode DESC";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getPeriodeDetail($id_periode) {
        global $conn;
        $sql    = "SELECT * FROM tb_laba_rugi_periode WHERE id_periode='$id_periode'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getDatalr($id_periode) {
        global $conn;
        $sql    = "SELECT * FROM tb_laba_rugi_data WHERE id_periode='$id_periode'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getdetaillr($id_lr_data) {
        global $conn;
        $sql    = "SELECT * FROM tb_laba_rugi_data WHERE id_lr_data='$id_lr_data'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

	function addPeriode($periode, $keterangan, $tgl_update) {
		global $conn;
		$sql 	= "INSERT INTO tb_laba_rugi_periode (periode, keterangan, tgl_update) VALUES ('$periode','$keterangan','$tgl_update')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function addlabarugi($id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir) {
		global $conn;
		$sql 	= "INSERT INTO tb_laba_rugi_data (id_periode, ket_biaya, tgl_masuk, saldo_awal, bulan_berjalan, saldo_akhir) VALUES ('$id_periode', '$ket_biaya', '$tgl_masuk', '$saldo_awal', '$bulan_berjalan', '$saldo_akhir')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function UpdateData($id_lr_data, $id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir) {
		global $conn;
		$sql 	= "UPDATE tb_laba_rugi_data SET id_periode='$id_periode', ket_biaya='$ket_biaya', tgl_masuk='$tgl_masuk', saldo_awal='$saldo_awal', bulan_berjalan='$bulan_berjalan', saldo_akhir='$saldo_akhir' WHERE id_lr_data='$id_lr_data'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deleteData($id_lr_data) {
		global $conn;
		$sql 	= "DELETE FROM tb_laba_rugi_data WHERE id_lr_data='$id_lr_data'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	if (isset($_POST['addlbr'])) {
        $id_periode         = mysqli_real_escape_string($conn, $_POST['id_periode']);
        $ket_biaya         	= mysqli_real_escape_string($conn, $_POST['ket_biaya']);
        $tgl_masuk         	= mysqli_real_escape_string($conn, $_POST['tgl_masuk']);
        $saldo_awal        	= mysqli_real_escape_string($conn, $_POST['saldo_awal']);
        $bulan_berjalan    	= mysqli_real_escape_string($conn, $_POST['bulan_berjalan']);
        $saldo_akhir        = mysqli_real_escape_string($conn, $_POST['saldo_akhir']);
        $add_lbr            = addlabarugi($id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir);
        session_start();
        unset ($_SESSION["message"]);
        if ($add_lbr) {
            $_SESSION['message'] = $added;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_periode.php?data=".$id_periode);
    }

    if (isset($_POST['updatelbr'])) {
		$id_lr_data 		= mysqli_real_escape_string($conn, $_POST['id_lr_data']);
		$id_periode			= mysqli_real_escape_string($conn, $_POST['id_periode']);
		$ket_biaya			= mysqli_real_escape_string($conn, $_POST['ket_biaya']);
		$tgl_masuk			= mysqli_real_escape_string($conn, $_POST['tgl_masuk']);
		$saldo_awal			= mysqli_real_escape_string($conn, $_POST['saldo_awal']);
		$bulan_berjalan 	= mysqli_real_escape_string($conn, $_POST['bulan_berjalan']);
		$saldo_akhir 		= mysqli_real_escape_string($conn, $_POST['saldo_akhir']);
		$updatelbr 			= UpdateData($id_lr_data, $id_periode, $ket_biaya, $tgl_masuk, $saldo_awal, $bulan_berjalan, $saldo_akhir);
		session_start();
		unset ($_SESSION["message"]);
		if ($updatelbr) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../detail_periode.php?data=".$id_periode);
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
		header("location:../kelola_laba_rugi.php");
	}

	if (isset($_GET['periode']) && isset($_GET['hapus'])) {
        $id_periode = $_GET['periode'];
        $id_lr_data = $_GET['hapus'];
        $deleted = deleteData($id_lr_data);
        unset ($_SESSION["message"]);
        if ($deleted) {         
            $_SESSION['message'] = $deleted;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_periode.php?data=".$id_periode);
    }


?>