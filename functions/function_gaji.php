<?php

    require_once 'database.php';
    include_once 'helper.php';

    function getData() {
        global $conn;
        $sql    = "SELECT tb_pegawai.*, tb_jabatan.*, tb_gaji.*, tb_tunjangan.* 
                    FROM tb_pegawai
                    JOIN tb_jabatan ON tb_pegawai.id_jabatan = tb_jabatan.id_jabatan
                    JOIN tb_gaji ON tb_pegawai.nik = tb_gaji.nik
                    JOIN tb_tunjangan ON tb_pegawai.nik = tb_tunjangan.nik";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getTotalPotongan($nik){
       global $conn;
       $fixnik = mysqli_real_escape_string($conn, $nik);
        $sql    = "SELECT SUM(potongan) as total_potongan FROM tb_potongan WHERE nik='$fixnik'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function getPotongan($nik) {
        global $conn;
        $fixnik = mysqli_real_escape_string($conn, $nik);
        $sql    = "SELECT * FROM tb_potongan WHERE nik='$fixnik'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function addPotongan($nik, $keterangan, $tanggal, $potongan) {
        global $conn;
        $sql    = "INSERT INTO tb_potongan (nik, keterangan, tanggal, potongan) VALUES ('$nik','$keterangan','$tanggal','$potongan')";
        $result = mysqli_query($conn, $sql);
        return ($result) ? true : false;
        mysqli_close($conn);
    }

    function getPegawai($nik) {
        global $conn;
        $fixnik = mysqli_real_escape_string($conn, $nik);
        $sql    = "SELECT tb_pegawai.*, tb_jabatan.*, tb_gaji.*, tb_tunjangan.* 
                    FROM tb_pegawai
                    JOIN tb_jabatan ON tb_pegawai.id_jabatan = tb_jabatan.id_jabatan
                    JOIN tb_gaji ON tb_pegawai.nik = tb_gaji.nik
                    JOIN tb_tunjangan ON tb_pegawai.nik = tb_tunjangan.nik 
                    WHERE tb_pegawai.nik='$fixnik'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function UpdateGaji($nik, $gaji) {
        global $conn;
        $fixnik = mysqli_real_escape_string($conn, $nik);
        $sql    = "UPDATE tb_gaji SET gaji='$gaji' WHERE nik='$fixnik'";
        $result = mysqli_query($conn, $sql);
        return ($result) ? true : false;
        mysqli_close($conn);
    }

    function UpdateTunjangan($nik, $tunjangan) {
        global $conn;
        $fixnik = mysqli_real_escape_string($conn, $nik);
        $sql    = "UPDATE tb_tunjangan SET tunjangan='$tunjangan' WHERE nik='$fixnik'";
        $result = mysqli_query($conn, $sql);
        return ($result) ? true : false;
        mysqli_close($conn);
    }

    function deletePotongan($id) {
        global $conn;
        $sql    = "DELETE FROM tb_potongan WHERE id_potongan='$id'";
        $result = mysqli_query($conn, $sql);
        return ($result) ? true : false;
        mysqli_close($conn);
    }

    if (isset($_POST['update_gaji'])) {
        $nik                = mysqli_real_escape_string($conn, $_POST['nik']);
        $gaji               = mysqli_real_escape_string($conn, $_POST['gaji']);
        $tunjangan          = mysqli_real_escape_string($conn, $_POST['tunjangan']);
        $update_gaji        = UpdateGaji($nik, $gaji);
        $update_tunjangan   = UpdateTunjangan($nik, $tunjangan);
        session_start();
        unset ($_SESSION["message"]);
        if ($update_gaji && $update_tunjangan) {          
            $_SESSION['message'] = $edited;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_gaji.php?nik=".$nik);
    }

    if (isset($_POST['tambah_potongan'])) {
        $nik                = mysqli_real_escape_string($conn, $_POST['nik']);
        $keterangan         = mysqli_real_escape_string($conn, $_POST['keterangan']);
        $tanggal            = date('Y-m-d');
        $potongan           = mysqli_real_escape_string($conn, $_POST['potongan']);
        $add                = addPotongan($nik, $keterangan, $tanggal, $potongan);
        session_start();
        unset ($_SESSION["message"]);
        if ($add) {
            $_SESSION['message'] = $added;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_gaji.php?nik=".$nik);
    }

    if (isset($_GET['nik']) && isset($_GET['hapus'])) {
        $nik = $_GET['nik'];
        $id = $_GET['hapus'];
        $deleted = deletePotongan($id);
        unset ($_SESSION["message"]);
        if ($deleted) {         
            $_SESSION['message'] = $deleted;
        }else {
            $_SESSION['message'] = $failed;
        }
        header("location:../detail_gaji.php?nik=".$nik);
    }


?>
