<?php
	require 'functions/function_pegawai.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="users cog icon"></i> PENGELOLAAN PEGAWAI</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<a href="add_pegawai.php" class="ui blue right floated button">
											<i class="plus icon"></i>TAMBAH DATA
										</a>
										<div class="ui blue ribbon icon label">TABEL PENGELOLAAN PEGAWAI</div>
										<br><br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
									    <thead>
									        <tr>
									            <th>No</th>
									            <th>NIK</th>
									            <th>Nama Lengkap</th>
									            <th>No HP</th>
									            <th>Alamat</th>
									            <th>Status</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									    <?php $all = getData(); $no = 1; ?>
									    <?php foreach ($all as $data) { ?>
								    	<tr>
								    	    <td><?= $no++ ?></td>
								    	    <td><?= $data['nik'] ?></td>
								    	    <td><?= $data['nama_lengkap'] ?></td>
								    	    <td><?= $data['no_hp'] ?></td>
								    	    <td><?= $data['alamat'] ?></td>
								    	    <td><?= $data['status_pegawai'] ?></td>
								    	    <td style="text-align: center;">
								    	    	<div class="ui buttons">
								    	    	  <a href="edit_pegawai.php?edit=<?php echo $data['id_pegawai']; ?>" class="ui green button"><i class="pen icon"></i></a>
								    	    	  <div class="or" data-text="/"></div>
								    	    	  <a href="functions/function_pegawai.php?hapus=<?php echo $data['id_pegawai']; ?>" class="ui red button"><i class="trash alternate icon"></i></a>
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
?>
<?php 

if (isset($_SESSION['message']) == 'succesed') { 
    echo "
 		<script>
 		    $('body')
 		      .toast({
 		        title: 'Proses Berhasil!',
 		        message: 'Data Berhasil Diproses!',
 		        showProgress: 'bottom',
 		        classProgress: 'green'
 		    });
 		</script>
    ";
}elseif (isset($_SESSION['message']) == 'failed') { 
    echo "
 		<script>
 		    $('body')
 		      .toast({
 		        title: 'Proses Gagal!',
 		        message: 'Data Gagal Diproses!',
 		        showProgress: 'bottom',
 		        classProgress: 'red'
 		    });
 		</script>
    ";
}

unset($_SESSION['message']);
?>