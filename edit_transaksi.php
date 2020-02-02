<?php
	require 'functions/function_trans.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
	$id 		= $_GET['id'];
	$get 		= showDataTrans($id);
	$getDetail 	= getDataDetail($id);
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="money bill alternate outline icon"></i> PENGELOLAAN TRANSAKSI</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<div class="ui blue ribbon icon label">FORM TRANSAKSI</div>
										<br><br><br>
									</div>
									<?php foreach ($get as $r) { ?>
									<form action="functions/function_trans.php" method="POST">
										<div class="ui form">
											<div class="two fields">
												<input type="hidden" name="id_transaksi" value="<?= $r['id_transaksi'] ?>">
												<div class="field">
													<label>Keterangan</label>
													<input type="text" name="keterangan" maxlength="200" placeholder="Keterangan" value="<?= $r['keterangan'] ?>">
												</div>
											</div>
										</div>
										<input type="hidden" name="edit">
					                    <button class="ui blue button">
					                        <i class="plus icon"></i>
					                        UBAH KETERANGAN
					                    </button>
									</form>
									<?php } ?>
								</div>
							</div>
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<div class="ui blue ribbon icon label">TAMBAH DETAIL TRANSAKSI</div>
										<br><br><br>
									</div>
									<form action="functions/function_trans.php" method="POST">
										<div class="ui form">
											<div class="two fields">
												<input type="hidden" name="id_transaksi" value="<?= $id ?>">
					                            <div class="field">
					                                <label>Debit</label>
					                                <div class="ui right labeled input">
					                                	<label for="amount" class="ui label">Rp</label>
														<input type="number" name="debit" id="debit" placeholder="300000">
					                                </div>
					                            </div>
					                            <div class="field">
					                                <label>Kredit</label>
					                                <div class="ui right labeled input">
					                                	<label for="amount" class="ui label">Rp</label>
														<input type="number" name="kredit" id="kredit" placeholder="300000">
					                                </div>
					                            </div>
											</div>
										</div>
										<input type="hidden" name="editTrans">
					                    <button class="ui blue button">
					                        <i class="plus icon"></i>
					                        TAMBAH TRANSAKSI
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
									            <th>Debit</th>
									            <th>Kredit</th>
									            <th>(Debit - Kredit)</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									    <?php $no = 1; $all_debit = 0; $all_credit = 0; $all_total = 0; ?>
									    <?php foreach ($getDetail as $det) { 
									    	$total_trans = $det['debit'] - $det['kredit'];
									    	$all_debit = $all_debit + $det['debit'];
									    	$all_credit = $all_credit + $det['kredit'];
									    	$all_total = $all_total + $total_trans;
									    ?>
								    	<tr>
								    	    <td><?= $no++ ?></td>
								    	    <td style="text-align: right;">Rp<?= number_format($det['debit'], 0 , '' , '.' ) ?></td>
								    	    <td style="text-align: right;">Rp<?= number_format($det['kredit'], 0 , '' , '.' ) ?></td>
								    	    <td style="text-align: right;">Rp<?= number_format($total_trans, 0 , '' , '.' ) ?></td>
								    	    <td style="text-align: center;">
								    	    	<div class="ui buttons">
								    	    	  <a href="<?= 'functions/function_trans.php?hapusTrans='.$det['id_trans_det']; ?>" class="ui red button"><i class="trash alternate icon"></i></a>
								    	    	</div>
								    	    </td>
								    	</tr>
									    <?php } ?>
									    </tbody>
									    <tfoot>
									    	<th></th>
									    	<th style="text-align: right;">Rp<?= number_format($all_debit, 0 , '' , '.' ) ?></th>
									    	<th style="text-align: right;">Rp<?= number_format($all_credit, 0 , '' , '.' ) ?></th>
									    	<th style="text-align: right;">Rp<?= number_format($all_total, 0 , '' , '.' ) ?></th>
									    	<th></th>
									    </tfoot>
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