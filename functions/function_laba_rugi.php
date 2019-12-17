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

	function addPeriode($periode, $keterangan, $tgl_update) {
		global $conn;
		$sql 	= "INSERT INTO tb_laba_rugi_periode (periode, keterangan, tgl_update) VALUES ('$periode','$keterangan','$tgl_update')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
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


?>