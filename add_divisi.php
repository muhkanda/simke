<?php
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="briefcase icon"></i> FORM TAMBAH DIVISI</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="functions/function_divisi.php" method="POST">
					                <div class="ui stacked segment">
					                    <div class="ui form">
				                            <div class="field">
				                                <label>NAMA DIVISI</label>
				                                <input type="text" name="nama_divisi" placeholder="">
				                            </div>
				                            <div class="field">
				                                <label>KETERANGAN</label>
				                                <textarea name="keterangan" placeholder=""></textarea>
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