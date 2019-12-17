<?php
	require 'functions/function_laba_rugi.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="balance scale icon"></i> PENGELOLAAN LABA RUGI</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<div class="ui blue ribbon icon label">FORM PERIODE</div>
										<br><br><br>
									</div>
									<form action="functions/function_laba_rugi.php" method="POST">
										<div class="ui form">
											<div class="two fields">
												<input type="hidden" name="id_periode" value="">
												<div class="field">
													<label>Periode</label>
													<div class="ui calendar" id="standard_calendar">
														<input type="text" name="periode" maxlength="200" placeholder="YYYY-MM-DD">
													</div>
												</div>
												<div class="field">
													<label>Keterangan</label>
													<input type="text" name="keterangan" maxlength="200" placeholder="Keterangan">
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
									            <th>Periode</th>
									            <th>Keterangan</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									    <?php $all = getPeriode(); $no = 1; ?>
									    <?php foreach ($all as $data) { ?>
								    	<tr>
								    	    <td><?= $no++ ?></td>
								    	    <td><?= $data['periode'] ?></td>
								    	    <td><?= $data['keterangan'] ?></td>
								    	    <td style="text-align: center;">
								    	    	<div class="ui buttons">
								    	    	  <!-- <a href="" class="ui green button"><i class="pen icon"></i></a>
								    	    	  <div class="or" data-text="/"></div> -->
								    	    	  <a href="detail_periode.php?data=<?php echo $data['id_periode']; ?>" class="ui blue button"><i class="list icon"></i> Data Laba Rugi</a>
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
<script>
	var calendarOpts = {
	    type: 'date',
	    formatter: {
	        date: function (date, settings) {
	            if (!date) return '';
	            var day = date.getDate() + '';
	            if (day.length < 2) {
	                day = '0' + day;
	            }
	            var month = (date.getMonth() + 1) + '';
	            if (month.length < 2) {
	                month = '0' + month;
	            }
	            var year = date.getFullYear();
	            return year + '-' + month + '-' + day;
	        }
	    }
	};
	$('#standard_calendar').calendar(calendarOpts);

	// function edit(id) {
	// 	$.ajax({
	//           url : "<?php echo site_url('admin/karyawan/ajax_edit')?>/" + id,
	//           type: "GET",
	//           dataType: "JSON",
	//           success: function(data)
	//           {

	//               $('[name="id"]').val(data.id);
	//               $('[name="nip"]').val(data.nip);
	//               $('[name="nama"]').val(data.nama);
	//               $('[name="no_rek"]').val(data.no_rek);
	//               $('[name="unit"]').val(data.unit);
	//               $('[name="no_tlp"]').val(data.no_tlp);
	//               $('[name="tahun_masuk"]').val(data.tahun_masuk);
	//               $('[name="status_karyawan"]').val(data.status_karyawan);

	//           },
	//           error: function (jqXHR, textStatus, errorThrown)
	//           {
	//               alert('Error Pada Saat Mengambil Data');
	//           }
	//       });
	// }
</script>