<?php
	require 'functions/function_pendapatan.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';

	if (isset($_POST['submit'])) {
		echo "SUBMITED";
	}

	$id_divisi = $_GET['data'];
	$nameDivisi = getDivisiName($id_divisi);
	// $getDivisi = getPeriodePdp($id_divisi);
	// print_r($getDivisi);
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2 style="text-transform: uppercase;"><i class="chart line icon"></i> PENGELOLAAN PERIODE PENDAPATAN DIVISI <?= $nameDivisi[0]['nama_divisi'] ?></h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<div class="ui blue ribbon icon label">FORM PERIODE PENDAPATAN</div>
										<br><br><br>
									</div>
									<form action="functions/function_pendapatan.php" method="POST">
										<div class="ui form">
											<div class="two fields">
												<input type="hidden" name="id_divisi" value="<?= $id_divisi ?>">
												<div class="field">
													<label>Keterangan</label>
													<input type="text" name="keterangan" maxlength="200" placeholder="Keterangan">
												</div>
												<div class="field">
													<div class="two fields">
														<div class="field">
															<label>Bulan</label>
															<select name="bulan">
																<option value="">-Pilih Bulan-</option>
																<option value="1">Januari</option>
																<option value="2">February</option>
																<option value="3">Maret</option>
																<option value="4">April</option>
																<option value="5">Mei</option>
																<option value="6">Juni</option>
																<option value="7">Juli</option>
																<option value="8">Agustus</option>
																<option value="9">September</option>
																<option value="10">Oktober</option>
																<option value="11">November</option>
																<option value="12">Desember</option>
															</select>
							                            </div>
							                            <div class="field">
							                            	<label>Tahun</label>
							                                <input type="number" name="tahun" maxlength="4" placeholder="YYYY">
							                           	</div>
						                            </div>
												</div>
											</div>
										</div>
										<input type="hidden" name="tambah_periode">
					                    <button class="ui blue button">
					                        <i class="plus icon"></i>
					                        TAMBAH PERIODE
					                    </button>
									</form>
								</div>
							</div>
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<div class="ui blue ribbon icon label">TABEL PERIODE</div>
										<br><br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
									    <thead>
									        <tr>
									            <th width="10%">No</th>
									            <th>Keterangan</th>
									            <th>Periode</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									    <?php $all = getPeriodePdp($id_divisi); $no = 1; 
									    foreach ($all as $data) { 
									    $bulannya = $data['bulan'];?>
								    	<tr>
								    	    <td><?= $no++ ?></td>
								    	    <td><?= $data['keterangan'] ?></td>
								    	    <td><strong><?= $months[$bulannya] ?></strong>, <?= $data['tahun'] ?></td>
								    	    <td style="text-align: center;">
								    	    	<div class="ui buttons">
								    	    	  	<div class="ui buttons">
									    	    		<!-- <a href="<?= 'functions/function_pendapatan.php?divisi='.$id_divisi.'&hapus='.$data['id_pendapatan_ket']; ?>" class="ui red button"><i class="trash alternate icon"></i> Hapus Pendapatan</a>
									    	    		<div class="or" data-text="/"></div> -->
								    	    	  		<a href="detail_pendapatan.php?data=<?php echo $data['id_pendapatan_ket']; ?>" class="ui blue button"><i class="list icon"></i> Data Pendapatan</a>
									    	    	</div>
								    	    	</div>
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
<script type="text/javascript">
	$('#standard_calendar')
	  .calendar({
	  	monthFirst: false,
	    type: 'date',
	    today: 'true',
	    formatter: {
	        date: function (date, settings) {
	          if (!date) return '';
	               return date.toLocaleString('en-us', {year: 'numeric', month: '2-digit', day: '2-digit'}).replace(/(\d+)\/(\d+)\/(\d+)/, '$3-$1-$2');
	        }
	    }
	  })
	;
</script>