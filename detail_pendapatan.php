<?php
	require 'functions/function_pendapatan.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';

	if (isset($_POST['submit'])) {
		echo "SUBMITED";
	}

	$id_pendapatan_ket = $_GET['data'];
	$getPeriode = getPeriodeKet($id_pendapatan_ket);
	foreach ($getPeriode as $data) {
	$bulannya = $data['bulan'];
?>	
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2 style="text-transform: uppercase;"><i class="exchange alternate icon"></i> PENDAPATAN PERIODE <?= $months[$bulannya] ?>, <?= $data['tahun'] ?> DIVISI <?= $data['nama_divisi'] ?></h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui stacked segment">
									<h4> DATA PERIODE ARUS KAS</h4>
									<div class="ui divider"></div>
									<table width="100%" class="ui fixed table">
										<tr>
											<td width="28%">Data Periode</td>
											<td>: <?= $months[$bulannya] ?>, <?= $data['tahun'] ?></td>
										</tr>
										<tr>
											<td>Keterangan</td>
											<td>: <?= $data['keterangan'] ?></td>
										</tr>
									</table>
									<div class="ui divider"></div>
									<div class="">
										<a href="add_pendapatan.php?divisi=<?=$data['divisi_id']?>&periode=<?=$data['id_pendapatan_ket']?>" class="ui blue button">
											<i class="plus icon"></i>TAMBAH DATA
										</a>
										<br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
										<thead>
											<tr>
												<th width="5%">No</th>
												<th>Keterangan</th>
												<th>Pendapatan</th>
												<th>Biaya</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $all = getPendapatan($id_pendapatan_ket); $no = 1;?>
									    	<?php 
									    	$total_pendapatan = 0;
									    	$total_biaya = 0;
									    	$total_labarugi = 0;
									    	foreach ($all as $pdp) { 
									    		$total_pendapatan 		= $total_pendapatan + $pdp['pendapatan'];
									    		$total_biaya 			= $total_biaya + $pdp['biaya'];
									    		$total_labarugi 		= $total_labarugi + $total_pendapatan - $total_biaya;
									    	?>
									    	<tr>
									    		<td><?= $no++ ?></td>
									    	    <td><?= $pdp['keterangan'] ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($pdp['pendapatan'], 0 , '' , '.' ) ?></td>
									    	    <td style="text-align: right;">Rp<?= number_format($pdp['biaya'], 0 , '' , '.' ) ?></td>
									    	    <td style="text-align: center;">
									    	    	<div class="ui buttons">
									    	    	  <a href="<?= 'edit_pendapatan.php?id='.$pdp['id_p_data'].'&periode='.$pdp['id_pendapatan_ket'];; ?>" class="ui green button"><i class="pen icon"></i></a>
									    	    	  <div class="or" data-text="/"></div>
									    	    	  <a href="functions/function_pendapatan.php?periode=<?php echo $pdp['id_pendapatan_ket']; ?>&hapus=<?php echo $pdp['id_p_data']; ?>" class="ui red button"><i class="trash alternate icon"></i></a>
									    	    	</div>
									    	    </td>
									    	</tr>
									    	<?php } ?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="2" style="text-align: right;">Sub Total</th>
												<th style="text-align: right;">Rp<?= number_format($total_pendapatan, 0 , '' , '.' ) ?></th>
												<th style="text-align: right;">Rp<?= number_format($total_biaya, 0 , '' , '.' ) ?></th>
												<th></th>
											</tr>
											<tr>
												<th colspan="2" style="text-align: right;">Total Labarugi</th>
												<th colspan="2" style="text-align: right;">Rp<?= number_format($total_labarugi, 0 , '' , '.' ) ?></th>
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