<?php
	require 'functions/function_pengguna.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="users cog icon"></i> PENGELOLAAN PENGGUNA</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<a href="add_pengguna.php" class="ui blue right floated button">
											<i class="plus icon"></i>TAMBAH DATA
										</a>
										<div class="ui blue ribbon icon label">TABEL PENGELOLAAN PENGGUNA</div>
										<br><br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
									    <thead>
									        <tr>
									            <th>No</th>
									            <th>Nama</th>
									            <th>Username</th>
									            <th>Role</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									    <?php $all = getData(); $no = 1; ?>
									    <?php foreach ($all as $data) { ?>
									    <!-- IF ROLE -->
									    <?php $role = ($data['role'] == 1) ? 'ADMIN' : (($data['role'] == 2) ? 'AKUNTAN' : (($data['role'] == 3) ? 'DIREKTUR' : 'MANAGER')) ?>
									    	<tr>
									    	    <td><?= $no++ ?></td>
									    	    <td><?= $data['nama_lengkap'] ?></td>
									    	    <td><?= $data['username'] ?></td>
									    	    <td><?= $role ?></td>
									    	    <td style="text-align: center;">
									    	    	<div class="ui buttons">
									    	    	  <a href="<?= 'edit_pengguna.php?id='.$data['id_pegawai']; ?>" class="ui green button"><i class="pen icon"></i></a>
									    	    	  <div class="or" data-text="/"></div>
									    	    	  <a href="<?= 'functions/function_pengguna.php?hapus='.$data['id_pegawai']; ?>" class="ui red button"><i class="trash alternate icon"></i></a>
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