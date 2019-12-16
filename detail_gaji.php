<?php
	require 'functions/function_gaji.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';

	if (isset($_POST['submit'])) {
		echo "SUBMITED";
	}

	$nik = $_GET['nik'];
	$getPegawai = getPegawai($nik);
	foreach ($getPegawai as $data) {
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
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="user icon"></i> PENGELOLAAN GAJI PEGAWAI <?= $data['nama_lengkap'] ?>(<?= $data['nik'] ?>)</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui stacked segment">
									<h4> DATA PEGAWAI</h4>
									<div class="ui divider"></div>
									<table width="100%" class="ui fixed table">
										<tr>
											<td width="28%">NIK</td>
											<td>: <?= $data['nik'] ?></td>
										</tr>
										<tr>
											<td>Nama Lengkap Pegawai</td>
											<td>: <?= $data['nama_lengkap'] ?></td>
										</tr>
										<tr>
											<td>No HP Pegawai</td>
											<td>: <?= $data['no_hp'] ?></td>
										</tr>
										<tr>
											<td>Alamat Pegawai</td>
											<td>: <?= $data['alamat'] ?></td>
										</tr>
										<tr>
											<td>Jabatan Pegawai</td>
											<td>: <?= $data['nama_jabatan'] ?></td>
										</tr>
										<tr>
											<td>Status Pegawai</td>
											<td>: <?= $data['status_pegawai'] ?></td>
										</tr>
										<tr>
											<td>Gaji Pegawai</td>
											<td>: Rp<?= number_format($jmlGaji, 0 , '' , '.' ) ?></td>
										</tr>
										<tr>
											<td>Tunjangan Pegawai</td>
											<td>: Rp<?= number_format($jmlTunjangan, 0 , '' , '.' ) ?></td>
										</tr>
										<tr>
											<td>Total Potogan Gaji Pegawai</td>
											<td>: Rp<?= number_format($jmlPotongan, 0 , '' , '.' ) ?></td>
										</tr>
										<tr>
											<td>Total Akhir Gaji Pegawai</td>
											<td>: Rp<?= number_format($totalGaji, 0 , '' , '.' ) ?></td>
										</tr>
									</table>
									<div class="ui styled fluid accordion">
										<div class="title active">
										    <i class="dropdown icon"></i>
										    PENGELOLAAN GAJI & TUNJANGAN PEGAWAI
										</div>
											<div class="content active">
											    <form action="functions/function_gaji.php" method="POST">
													<div class="ui form">
														<div class="two fields">
															<input type="hidden" name="nik" value="<?= $data['nik'] ?>">
								                            <div class="field">
								                                <label>Gaji Pegawai</label>
								                                <div class="ui right labeled input">
								                                	<label for="amount" class="ui label">Rp</label>
																	<input type="number" name="gaji" placeholder="3000000" maxlength="15" value="<?= $data['gaji'] ?>">
								                                </div>
								                            </div>
								                            <div class="field">
							                                <label>Tunjangan Pegawai</label>
							                                <div class="ui right labeled input">
							                                	<label for="amount" class="ui label">Rp</label>
							                               	 	<input type="number" name="tunjangan" placeholder="3000000" maxlength="15" value="<?= $data['tunjangan'] ?>">
							                                </div>
							                            </div>
								                        </div>
													</div>
													<input type="hidden" name="update_gaji">
								                    <button class="ui green button">
								                        <i class="save icon"></i>
								                        SIMPAN DATA
								                    </button>
												</form>
											</div>
										<div class="title active">
										    <i class="dropdown icon"></i>
										    PENGELOLAAN POTONGAN GAJI PEGAWAI
										</div>
											<div class="content active">
												<form action="functions/function_gaji.php" method="POST">
													<div class="ui form">
														<div class="two fields">
															<input type="hidden" name="nik" value="<?= $data['nik'] ?>">
															<div class="field">
																<label>Keterangan Potongan</label>
																<input type="text" name="keterangan" maxlength="200" placeholder="Keterangan Potongan">
															</div>
															<div class="field">
								                                <label>Potongan</label>
								                                <div class="ui right labeled input">
								                                	<label for="amount" class="ui label">Rp</label>
								                               	 	<input type="number" name="potongan" maxlength="15" value="0">
								                                </div>
								                            </div>
														</div>
													</div>
													<input type="hidden" name="tambah_potongan">
								                    <button class="ui green button">
								                        <i class="save icon"></i>
								                        SIMPAN POTONGAN
								                    </button>
												</form>
												<div class="ui divider"></div>
												<label>Data Potongan Gaji Pegawai</label>
												<table class="ui celled table responsive nowrap unstackable" style="width:100%">
													<thead>
														<tr>
															<th width="5%">No</th>
															<th>Tanggal</th>
															<th>Keterangan</th>
															<th>Potongan</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php $get_potongan = getPotongan($data['nik']); $no = 1; 
														$total_potongan = 0;
														if (count($get_potongan) > 0) {
														foreach ($get_potongan as $pt) { ?>
														<tr>
															<td style="text-align: center;"><?= $no++ ?></td>
															<td><?= $pt['tanggal'] ?></td>
															<td><?= $pt['keterangan'] ?></td>
															<td style="text-align: right;">Rp<?= number_format($pt['potongan'], 0 , '' , '.' ) ?></td>
															<td style="text-align: center;" width="20%">
																<a href="" class="ui red button small"><i class="trash alternate icon"></i> Hapus Potongan</a>
															</td>
														</tr>
														<?php 
														$total_potongan = $total_potongan + $pt['potongan'];
														} }else{  ?>
														<tr>
															<td colspan="6" style="text-align: center;"> Potongan Belum Ada</td>
														</tr>
														<?php } ?>
													</tbody>
													<tfoot>
														<tr>
															<th colspan="3" style="text-align: right;">Total Potongan</th>
															<th style="text-align: right;">Rp.<?= number_format($total_potongan, 0 , '' , '.' ) ?></th>
															<th></th>
														</tr>
													</tfoot>
												</table>
											</div>
									  
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	};

	include_once 'layout/footer.php';
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
?>