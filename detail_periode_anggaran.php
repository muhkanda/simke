<?php
	require 'functions/function_anggaran.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';

	if (isset($_POST['submit'])) {
		echo "SUBMITED";
	}

	$id_periode = $_GET['data'];
	$getPeriode = getPeriodeDetail($id_periode);
	foreach ($getPeriode as $data) {
?>	
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="handshake outline icon"></i> ANGGARAN PERIODE <?= $data['periode'] ?></h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui stacked segment">
									<h4> DATA PERIODE ANGGARAN</h4>
									<div class="ui divider"></div>
									<table width="100%" class="ui fixed table">
										<tr>
											<td width="28%">Data Periode</td>
											<td>: <?= $data['periode'] ?></td>
										</tr>
										<tr>
											<td>Keterangan</td>
											<td>: <?= $data['keterangan'] ?></td>
										</tr>
									</table>
									<div class="ui divider"></div>
									<div class="">
										<a href="add_anggaran.php?periode=<?=$data['id_periode']?>" class="ui blue button">
											<i class="plus icon"></i>TAMBAH DATA
										</a>
										<br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
										<thead>
											<tr>
												<th width="5%">No</th>

												<th>Jenis Anggaran</th>
												<th>Rencana Anggaran</th>
												<th>Realisasi Anggaran</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $all = getDataag($id_periode); $no = 1;?>
									    	<?php 
									    	$rencana_anggaran = 0;
									    	$realisasi_anggaran = 0;
									    	foreach ($all as $dag) { 
									    		$rencana_anggaran 		= $rencana_anggaran + $dag['rencana_anggaran'];
									    		$realisasi_anggaran 	= $realisasi_anggaran + $dag['realisasi_anggaran'];
									    	?>
									    	<tr>
									    		<td><?= $no++ ?></td>
									    	    <td><?= $dag['pos_anggaran'] ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($dag['rencana_anggaran'], 0 , '' , '.' ) ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($dag['realisasi_anggaran'], 0 , '' , '.' ) ?></td>
									    	    <td><?= $dag['status'] ?></td>
									    	    <td style="text-align: center;">
									    	    	<div class="ui buttons">
									    	    	  <a href="<?= 'edit_anggaran.php?id='.$dag['id_anggaran_data']; ?>" class="ui green button"><i class="pen icon"></i></a>
									    	    	  <div class="or" data-text="/"></div>
									    	    	  <a href="functions/function_anggaran.php?periode=<?php echo $dag['id_periode']; ?>&hapus=<?php echo $dag['id_anggaran_data']; ?>" class="ui red button"><i class="trash alternate icon"></i></a>
									    	    	</div>
									    	    </td>
									    	</tr>
									    	<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="2" style="text-align: right;"><strong>Total Anggaran</strong></th>
												<th style="text-align: right;">Rp<?= number_format($rencana_anggaran, 0 , '' , '.' ) ?></th>
												<th style="text-align: right;">Rp<?= number_format($realisasi_anggaran, 0 , '' , '.' ) ?></th>
												<th></th>
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
<?php
	};

	include_once 'layout/footer.php';
	if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
?>
<script>
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