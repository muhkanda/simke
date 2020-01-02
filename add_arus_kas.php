<?php
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';

	$periode = $_GET['periode'];
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="briefcase icon"></i> FORM ARUS KAS</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_arus_kas.php" method="POST">
					                <div class="ui stacked segment">
					                	<input type="hidden" name="id_periode" value="<?=$periode?>">
					                    <div class="ui form">
				                            <div class="field">
				                                <label>Keterangan Biaya</label>
				                                <input type="text" name="ket_biaya" id="ket_biaya" placeholder="">
				                            </div>
				                            <div class="field">
				                                <label>Tanggal</label>
				                                <div class="ui calendar" id="standard_calendar">
				                                	<input type="text" name="tgl_masuk" placeholder="YYYY-MM-DD">
				                                </div>
				                            </div>
				                            <div class="field">
				                                <label>Saldo Awal</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="saldo_awal" id="awal_saldo" placeholder="3000000" maxlength="15" value="0" onkeyup="hitung_total()">
				                                </div>
				                            </div>
				                            <div class="field">
				                                <label>Saldo Bulan Berjalan</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="bulan_berjalan" id="bulan_berjalan" placeholder="3000000" maxlength="15" value="0" onkeyup="hitung_total()">
				                                </div>
				                            </div>
				                            <div class="field">
				                                <label>Saldo Akhir</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="saldo_akhir" id="saldo_akhir" readonly placeholder="3000000" maxlength="15" value="0">
				                                </div>
				                            </div>
					                    </div>
					                    <br>
					                    <input type="hidden" name="addak">
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="detail_periode_kas.php?data=<?=$periode?>">
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