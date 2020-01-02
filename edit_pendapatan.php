<?php
	require 'functions/function_pendapatan.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';

	if (isset($_POST['submit'])) {
		echo "SUBMITED";
	}

	$id_p_data = $_GET['id'];
	$periode = $_GET['periode'];
	$getDetailPdp = getDetailPdp($id_p_data); $no = 1;
	foreach ($getDetailPdp as $data) {
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="briefcase icon"></i> EDIT PENDAPATAN</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_pendapatan.php" method="POST">
					                <div class="ui stacked segment">
					                	<input type="hidden" name="id_p_data" value="<?= $id_p_data ?>">
					                	<input type="hidden" name="id_pendapatan_ket" value="<?= $data['id_pendapatan_ket'] ?>">
					                    <div class="ui form">
				                            <div class="field">
				                                <label>Keterangan Pendapatan</label>
				                                <input type="text" name="keterangan" id="keterangan" placeholder="" value="<?= $data['keterangan'] ?>">
				                            </div>
				                            <div class="field">
				                                <label>Pendapatan</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="pendapatan" id="pendapatan" placeholder="3000000" maxlength="25" value="<?= $data['pendapatan'] ?>">
				                                </div>
				                            </div>
				                            <div class="field">
				                                <label>Biaya</label>
				                                <div class="ui right labeled input">
				                                	<label for="amount" class="ui label">Rp</label>
													<input type="number" name="biaya" id="biaya" placeholder="3000000" maxlength="25" value="<?= $data['biaya'] ?>">
				                                </div>
				                            </div>
					                    </div>
					                    <br>
					                    <input type="hidden" name="updatepdp">
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="detail_pendapatan.php?data=<?=$periode?>">
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
	};
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

	$(document).ready(function() {
		
	});
</script>