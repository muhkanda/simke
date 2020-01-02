<?php
	require 'functions/function_anggaran.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
	$id_anggaran_data = $_GET['id'];
	$getdetailag = getdetailag($id_anggaran_data);
	foreach ($getdetailag as $data) {
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="handshake outline icon"></i> FORM ANGGARAN</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_anggaran.php" method="POST">
					                <div class="ui stacked segment">
					                	<input type="hidden" name="id_anggaran_data" value="<?= $data['id_anggaran_data']?>">
					                	<input type="hidden" name="id_periode" value="<?= $data['id_periode']?>">
					                    <div class="ui form">
				                            <div class="field">
				                                <label>Rencana Anggaran</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="rencana_anggaran" id="rencana_anggaran" value="<?= $data['rencana_anggaran']  ?>">
				                                </div>
				                            </div>
				                            <div class="field">
				                                <label>Realisasi Anggaran</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="realisasi_anggaran" id="realisasi_anggaran" value="<?= $data['realisasi_anggaran']  ?>">
				                                </div>
				                            </div>
				                            <div class="field">
				                                <label>Jenis Anggaran</label>
				                                <select name="id_jenis_anggaran" id="" class="ui dropdown">
				                                	<?php $selected = getSelected($data['id_anggaran_data']); foreach ($selected as $sel) { ?>
				                                		<option selected="selected" value="<?= $sel['id_jenis_anggaran'] ?>"><?= $sel['pos_anggaran']?></option>
				                                	<?php } ?>
					                            	<?php $jenis = getJenis(); foreach ($jenis as $jns) { ?>
					                            		<option value="<?= $jns['id_jenis_anggaran'] ?>"><?= $jns['pos_anggaran'] ?></option>
					                            	<?php } ?>
					                            </select>
				                            </div>
				                            <div class="field">
				                                <label>Status</label>
				                                <select name="status" id="status" class="ui dropdown">
				                                	<?php $selected = getSelected($data['id_anggaran_data']); foreach ($selected as $sel) { ?>
				                                		<option selected="selected" value="<?= $sel['status'] ?>"><?= $sel['status']?></option>
				                                	<?php } ?>
				                            		<option value="Disetujui">Disetujui</option>
				                            		<option value="Tidak Disetujui">Tidak Disetujui</option>
					                            </select>
				                            </div>
					                    </div>
					                    <br>
					                    <input type="hidden" name="editag">
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="detail_periode_anggaran.php?data=<?= $data['id_periode']?>">
					                        <i class="cancel icon"></i>
					                        BATAL
					                    </a>
					                </div>
					            </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
<?php
	}
	include_once 'layout/footer.php';
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

	function hitung_total() {
		var saldo_awal = parseInt(document.getElementById('awal_saldo').value);
		var saldo_berjalan = parseInt(document.getElementById('bulan_berjalan').value);
		var total_saldo = saldo_awal + saldo_berjalan;
		// console.log(total_saldo);
		document.getElementById("saldo_akhir").value = total_saldo;
	}

	$(document).ready(function() {
		
	});
</script>