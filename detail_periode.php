<?php
	require 'functions/function_laba_rugi.php';
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
						<h2><i class="balance scale icon"></i> LABA RUGI PERIODE <?= $data['periode'] ?></h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui stacked segment">
									<h4> DATA PERIODE LABA RUGI</h4>
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
										<a href="add_labarugi.php?periode=<?=$data['id_periode']?>" class="ui blue button">
											<i class="plus icon"></i>TAMBAH DATA
										</a>
										<br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
										<thead>
											<tr>
												<th width="5%">No</th>
												<th>Tanggal</th>
												<th>Keterangan</th>
												<th>Saldo Awal</th>
												<th>Bulan Berjalan</th>
												<th>Saldo Akhir</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $all = getDatalr($id_periode); $no = 1;?>
									    	<?php 
									    	$total_saldo_awal = 0;
									    	$total_bulan_berjalan = 0;
									    	$total_saldo_akhir = 0;
									    	foreach ($all as $dlr) { 
									    		$total_saldo_awal 		= $total_saldo_awal + $dlr['saldo_awal'];
									    		$total_bulan_berjalan 	= $total_bulan_berjalan + $dlr['bulan_berjalan'];
									    		$total_saldo_akhir 		= $total_saldo_akhir + $dlr['saldo_akhir'];
									    	?>
									    	<tr>
									    		<td><?= $no++ ?></td>
									    	    <td><?= $dlr['tgl_masuk'] ?></td>
									    	    <td><?= $dlr['ket_biaya'] ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($dlr['saldo_awal'], 0 , '' , '.' ) ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($dlr['bulan_berjalan'], 0 , '' , '.' ) ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($dlr['saldo_akhir'], 0 , '' , '.' ) ?></td>
									    	    <td style="text-align: center;">
									    	    	<div class="ui buttons">
									    	    	  <a href="<?= 'edit_labarugi.php?id='.$dlr['id_lr_data']; ?>" class="ui green button"><i class="pen icon"></i></a>
									    	    	  <div class="or" data-text="/"></div>
									    	    	  <a href="functions/function_laba_rugi.php?periode=<?php echo $dlr['id_periode']; ?>&hapus=<?php echo $dlr['id_lr_data']; ?>" class="ui red button"><i class="trash alternate icon"></i></a>
									    	    	</div>
									    	    </td>
									    	</tr>
									    	<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="3" style="text-align: right;">Total Saldo</th>
												<th style="text-align: right;">Rp<?= number_format($total_saldo_awal, 0 , '' , '.' ) ?></th>
												<th style="text-align: right;">Rp<?= number_format($total_bulan_berjalan, 0 , '' , '.' ) ?></th>
												<th style="text-align: right;">Rp<?= number_format($total_saldo_akhir, 0 , '' , '.' ) ?></th>
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