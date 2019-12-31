<?php

    require_once 'database.php';

    function countPegawai() {
        global $conn;
        $sql    = "SELECT COUNT(id_pegawai) FROM tb_pegawai";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function countPegawaiTetap() {
        global $conn;
        $sql    = "SELECT COUNT(id_pegawai) FROM tb_pegawai WHERE status_pegawai = 'TETAP'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function countPegawaiTidakTetap() {
        global $conn;
        $sql    = "SELECT COUNT(id_pegawai) FROM tb_pegawai WHERE status_pegawai = 'TIDAK TETAP'";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function sumGaji() {
        global $conn;
        $sql    = "SELECT (SUM(gaji) + (SELECT SUM(tunjangan) FROM tb_tunjangan) - (SELECT SUM(potongan) FROM tb_potongan)) 'total' FROM tb_gaji;";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }

?>
