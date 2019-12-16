<?php
	require_once 'functions/function_index.php';
    include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="chart line icon"></i> DASHBOARD</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<!-- BEGIN STATISTIC ITEM -->
							<!-- Begin Page Views -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered fluid card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor1">
			                                            	<i class="users icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Jumlah Seluruh Pegawai</h4></span>
								        			<?php
								        				foreach (countPegawai() as $key) {
								        					echo $key[0].' Pegawai';
								        				}
								        			?>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Page Views -->
							<!-- Begin Messages -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered fluid card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor2">
			                                            	<i class="users icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Jumlah Pegawai Tetap</h4></span>
								        			<?php
								        				foreach (countPegawaiTetap() as $key) {
								        					echo $key[0].' Pegawai';
								        				}
								        			?>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Messages -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered fluid card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor3">
			                                            	<i class="users icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Jumlah Pegawai Non Tetap</h4></span>
								        			<?php
								        				foreach (countPegawaiTidakTetap() as $key) {
								        					echo $key[0].' Pegawai';
								        				}
								        			?>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Users -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered fluid card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor4">
			                                            	<i class="money icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Total Seluruh Gaji</h4></span>
								        			<?php
								        				foreach (sumGaji() as $key) {
								        					$formated = number_format($key[0],0,',','.');
								        					echo 'Rp. '.$formated;
								        				}
								        			?>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Users -->
							<!-- END STATISTIC ITEM -->
							<!-- <div class="eight wide computer sixteen wide phone column justifed">
								<h4>EXAMPLE TITLE</h4>
								<div class="ui divider"></div>
								<div class="ui tall stacked segment">
									<a class="ui blue ribbon label">Chart.js Bar Chart - Multi Axis</a>
									<canvas id="example-multiaxis"></canvas>
									<div class="ui divider"></div>
									<button id="rand-multi-axis" class="ui blue button simplelable">Randomize Data</button>
								</div>
							</div>
							<div class="eight wide computer sixteen wide phone column justifed">
								<h4>ANOTHER TITLE</h4>
								<div class="ui divider"></div>
								<div class="ui tall stacked segment">
									<a class="ui blue ribbon label">Chart.js Pie Chart - Examples</a>
									<canvas id="example-pie"></canvas>
									<div class="ui divider"></div>
									<button id="rand-pie" class="ui blue button simplelable">Randomize Data</button>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- <script src="assets/vendors/chart.js/Chart.min.js"></script>
		<script src="assets/vendors/chart.js/Chart.utils.js"></script>
		<script src="assets/vendors/chart.js/Chart.example.js"></script> -->
<?php
	include_once 'layout/footer.php';
	if (isset($_SESSION['message']) == 'logfail') { 
	    echo "
	        <script>
	            $('body')
                  .toast({
                    title: 'Login Berhasil!',
                    message: 'Proses Login Berhasil!',
                    class: 'green',
                    showProgress: 'top'
                });
	        </script>
	    ";
	}
	unset($_SESSION['message']);
?>	