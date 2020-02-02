<?php
	require 'functions/function_akun.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="briefcase icon"></i> FORM EDIT DIVISI</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_akun.php" method="POST">
					                <div class="ui stacked segment">
					                    <div class="ui form">
					                    	<?php
					                    		$id 	= $_GET['id'];
					                    		$get 	= showData($id);
					                    	?>
					                    	<?php foreach ($get as $data) { ?>
				                            <div class="field">
				                                <label>KODE AKUN</label>
				                                <input type="text" name="kode_akun" placeholder="" value="<?= $data['kode_akun'] ?>">
				                            </div>
				                            <div class="field">
				                                <label>NAMA AKUN</label>
				                                <input type="text" name="nama_akun" placeholder="" value="<?= $data['nama_akun'] ?>">
				                            </div>
				                            <div class="field">
				                                <label>JENIS</label>
				                                <input type="text" name="jenis" placeholder="" value="<?= $data['jenis'] ?>">
				                            </div>
				                            <div class="field">
				                                <label>GRUP</label>
				                                <input type="text" name="grup" placeholder="" value="<?= $data['grup'] ?>">
				                            </div>
					                        <input type="hidden" name="id_akun" value="<?= $data['id_akun'] ?>"> 
					                        <?php } ?>
					                    </div>
					                    <br>
					                    <input type="hidden" name="edit">
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="kelola_akun.php">
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