<?php
	require 'functions/function_pendapatan.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="chart line icon"></i> PENGELOLAAN PENDAPATAN PER DIVISI</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<div class="ui blue ribbon icon label">TABEL PENDAPATAN DIVISI</div>
										<br><br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
									    <thead>
									        <tr>
									            <th>No</th>
									            <th>Nama Divisi</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									    <?php $all = getDivisi(); $no = 1; ?>
									    <?php foreach ($all as $data) { ?>
									    	<tr>
									    	    <td><?= $no++ ?></td>
									    	    <td><?= $data['nama_divisi'] ?></td>
									    	    <td style="text-align: center;">
									    	    	<div class="ui buttons">
									    	    	  <a href="<?= 'periode_pendapatan.php?data='.$data['id_divisi']; ?>" class="ui blue button"><i class="list icon"></i> Data Periode</a>
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