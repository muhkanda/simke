<?php
	require 'functions/function_jabatan.php';
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="briefcase icon"></i> FORM EDIT JABATAN</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_jabatan.php" method="POST">
					                <div class="ui stacked segment">
					                    <div class="ui form">
					                    	<?php
					                    		$id 	= $_GET['id'];
					                    		$get 	= showData($id);
					                    	?>
					                    	<?php foreach ($get as $data) { ?>
				                            <div class="field">
				                                <label>NAMA JABATAN</label>
				                                <input type="text" name="nama_jabatan" placeholder="" value="<?= $data['nama_jabatan'] ?>">
				                            </div>
				                            <div class="field">
				                                <label>KETERANGAN</label>
				                                <input type="text" name="keterangan" placeholder="" value="<?= $data['keterangan'] ?>">
				                            </div>
					                        <input type="hidden" name="id" value="<?= $data['id_jabatan'] ?>"> 
					                        <?php } ?>
					                    </div>
					                    <br>
					                    <input type="hidden" name="edit">
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="kelola_jabatan.php">
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