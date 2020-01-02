<?php

	require_once 'database.php';
	include_once 'helper.php';

	function getDivisi() {
		global $conn;
		$sql 	= "SELECT * FROM tb_divisi ORDER BY id_divisi ASC";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getDivisiName($id_divisi) {
		global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_divisi);
		$sql 	= "SELECT nama_divisi FROM tb_divisi WHERE id_divisi = '$fixid'";
		$result	= mysqli_query($conn, $sql);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		mysqli_close($conn);
	}

	function getPeriodePdp($id_divisi) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_divisi);
        $sql    = "SELECT tb_pendapatan_ket.*, tb_divisi.*
        			FROM tb_pendapatan_ket 
        			JOIN tb_divisi ON tb_pendapatan_ket.id_divisi = tb_divisi.id_divisi
        			WHERE tb_pendapatan_ket.id_divisi = '$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getDetailPdp($id_p_data) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_p_data);
        $sql    = "SELECT * FROM tb_pendapatan_data WHERE id_p_data='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function UpdatePendapatan($id_p_data, $id_pendapatan_ket, $keterangan, $pendapatan, $biaya, $id_pengguna) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_p_data);
		$sql 	= "UPDATE tb_pendapatan_data SET id_pendapatan_ket='$id_pendapatan_ket', keterangan='$keterangan', pendapatan='$pendapatan', biaya='$biaya', id_pengguna='$id_pengguna' WHERE id_p_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

    function getPeriodeKet($id_pendapatan_ket) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_pendapatan_ket);
        $sql    = "SELECT tb_pendapatan_ket.*, tb_divisi.*, tb_pendapatan_ket.id_divisi AS divisi_id
        			FROM tb_pendapatan_ket 
        			JOIN tb_divisi ON tb_pendapatan_ket.id_divisi = tb_divisi.id_divisi
        			WHERE tb_pendapatan_ket.id_pendapatan_ket = '$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getPendapatan($id_pendapatan_ket) {
        global $conn;
        $fixid 	= mysqli_real_escape_string($conn, $id_pendapatan_ket);
        $sql    = "SELECT * FROM tb_pendapatan_data WHERE id_pendapatan_ket='$fixid'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function addPeriode($id_divisi, $keterangan, $bulan, $tahun) {
		global $conn;
		$sql 	= "INSERT INTO tb_pendapatan_ket (id_divisi, keterangan, bulan, tahun) VALUES ('$id_divisi','$keterangan','$bulan','$tahun')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deletePeriode($id_pendapatan_ket) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_pendapatan_ket);
		$sql 	= "DELETE FROM tb_pendapatan_ket WHERE id_pendapatan_ket='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function addpendapatan($id_pendapatan_ket, $keterangan, $pendapatan, $biaya, $id_pengguna) {
		global $conn;
		$sql 	= "INSERT INTO tb_pendapatan_data (id_pendapatan_ket, keterangan, pendapatan, biaya, id_pengguna) VALUES ('$id_pendapatan_ket', '$keterangan', '$pendapatan', '$biaya', '$id_pengguna')";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}

	function deletePendapatan($id_p_data) {
		global $conn;
		$fixid 	= mysqli_real_escape_string($conn, $id_p_data);
		$sql 	= "DELETE FROM tb_pendapatan_data WHERE id_p_data='$fixid'";
		$result	= mysqli_query($conn, $sql);
		return ($result) ? true : false;
		mysqli_close($conn);
	}



    if (isset($_POST['tambah_periode'])) {
		$id_divisi			= mysqli_real_escape_string($conn, $_POST['id_divisi']);
		$keterangan			= mysqli_real_escape_string($conn, $_POST['keterangan']);
		$bulan				= mysqli_real_escape_string($conn, $_POST['bulan']);
		$tahun				= mysqli_real_escape_string($conn, $_POST['tahun']);
        $add          		= addPeriode($id_divisi, $keterangan, $bulan, $tahun);
		session_start();
		unset ($_SESSION["message"]);
		if ($add) {
			$_SESSION['message'] = $added;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../periode_pendapatan.php?data=".$id_divisi);
	}

	if (isset($_GET['divisi']) && isset($_GET['hapus'])) {
        $id_divisi = $_GET['divisi'];
        $id_pendapatan_ket = $_GET['hapus'];
        $deleted = deletePeriode($id_pendapatan_ket);
        unset ($_SESSION["message"]);
        if ($deleted) {         
            $_SESSION['message'] = $deleted;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../periode_pendapatan.php?data=".$id_divisi);
    }

    if (isset($_GET['periode']) && isset($_GET['hapus'])) {
        $periode = $_GET['periode'];
        $id_p_data = $_GET['hapus'];
        $deleted = deletePendapatan($id_p_data);
        unset ($_SESSION["message"]);
        if ($deleted) {         
            $_SESSION['message'] = $deleted;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_pendapatan.php?data=".$periode);
    }

    if (isset($_POST['addpdp'])) {
        $id_pendapatan_ket      = mysqli_real_escape_string($conn, $_POST['id_pendapatan_ket']);
        $keterangan         	= mysqli_real_escape_string($conn, $_POST['keterangan']);
        $pendapatan         	= mysqli_real_escape_string($conn, $_POST['pendapatan']);
        $biaya        			= mysqli_real_escape_string($conn, $_POST['biaya']);
        $id_pengguna    		= 0;
        $add_pdp            	= addpendapatan($id_pendapatan_ket, $keterangan, $pendapatan, $biaya, $id_pengguna);
        session_start();
        unset ($_SESSION["message"]);
        if ($add_ak) {
            $_SESSION['message'] = $added;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_pendapatan.php?data=".$id_pendapatan_ket);
    }

    if (isset($_POST['updatepdp'])) {
		$id_p_data      		= mysqli_real_escape_string($conn, $_POST['id_p_data']);
		$id_pendapatan_ket      = mysqli_real_escape_string($conn, $_POST['id_pendapatan_ket']);
        $keterangan         	= mysqli_real_escape_string($conn, $_POST['keterangan']);
        $pendapatan         	= mysqli_real_escape_string($conn, $_POST['pendapatan']);
        $biaya        			= mysqli_real_escape_string($conn, $_POST['biaya']);
        $id_pengguna    		= 0;
		$updatepdp 				= UpdatePendapatan($id_p_data, $id_pendapatan_ket, $keterangan, $pendapatan, $biaya, $id_pengguna);
		session_start();
		unset ($_SESSION["message"]);
		if ($updatepdp) {			
			$_SESSION['message'] = $edited;
		}else {
			$_SESSION['message'] = $failed;
		}
		header("location:../detail_pendapatan.php?data=".$id_pendapatan_ket);
	}

?>