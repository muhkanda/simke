<?php
require 'functions/function_gaji.php';
include_once 'layout/header.php';
include_once 'layout/sidebar.php';
?>
    <!-- BEGIN CONTEN -->
    <div class="right floated thirteen wide computer sixteen wide phone column" id="content">
        <div class="ui container grid">
            <div class="row">
                <div class="fifteen wide computer sixteen wide phone centered column">
                    <h2><i class="users cog icon"></i> PENGELOLAAN GAJI PEGAWAI</h2>
                    <div class="ui divider"></div>
                    <div class="ui grid">
                        <div class="sixteen wide computer sixteen wide phone centered column">
                            <!-- BEGIN DATATABLE -->
                            <div class="ui stacked segment">
                                <div class="">
                                    <div class="ui blue ribbon icon label">TABEL DATA PEGAWAI</div>
                                    <br><br><br>
                                </div>
                                <table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Total Gaji</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $all = getData(); $no = 1; ?>
                                    <?php foreach ($all as $data) { 
                                        $getPotongan = getTotalPotongan($data['nik']);
                                        $jmlGaji = $data['gaji'];
                                        $jmlTunjangan = $data['tunjangan'];
                                        if ($getPotongan > 0) {
                                            $jmlPotongan = $getPotongan[0]['total_potongan'];
                                        }else{
                                            $jmlPotongan = 0;
                                        }
                                        $totalGaji = $jmlGaji + $jmlTunjangan - $jmlPotongan;
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['nik'] ?></td>
                                            <td><?= $data['nama_lengkap'] ?></td>
                                            <td><?= $data['nama_jabatan'] ?></td>
                                            <td><?= $data['status_pegawai'] ?></td>
                                            <td style="text-align: right;">Rp<?= number_format($totalGaji, 0 , '' , '.' ) ?></td>
                                            <td style="text-align: center;">
                                                <a href="detail_gaji.php?nik=<?php echo $data['nik']; ?>" class="ui blue button">Kelola Gaji</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATATABLE -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->

<?php
include_once 'layout/footer.php';
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>