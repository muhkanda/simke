<?php
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="briefcase icon"></i> FORM TAMBAH AKUN</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_akun.php" method="POST">
					                <div class="ui stacked segment">
					                    <div class="ui form">
				                            <div class="field">
				                                <label>KODE AKUN</label>
				                                <input type="text" name="kode_akun" placeholder="">
				                            </div>
				                            <div class="field">
				                                <label>NAMA AKUN</label>
				                                <input type="text" name="nama_akun" placeholder="">
				                            </div>
				                            <div class="field">
				                                <label>JENIS</label>
				                                <input type="text" name="jenis" placeholder="">
				                            </div>
				                            <div class="field">
				                                <label>GRUP</label>
				                                <input type="text" name="grup" placeholder="">
				                            </div>
					                    </div>
					                    <br>
					                    <input type="hidden" name="add">
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="kelola_divisi.php">
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