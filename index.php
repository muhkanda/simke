<?php
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
								<div class="ui centered card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor1">
			                                            	<i class="chart bar outline icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Page Views</h4></span>
								        			7120 Views
								        			<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Page Views -->
							<!-- Begin Messages -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor2">
			                                            	<i class="inbox icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Messages</h4></span>
								        			2341 Messages
								        			<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Messages -->
							<!-- Begin Downloads -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor3">
			                                            	<i class="download icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Downloads</h4></span>
								        			5541 Downloads
								        			<a class="ui tiny label simplelable"><i class="eye icon"></i> Details</a>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Downloads -->
							<!-- Begin Users -->
							<div class="four wide computer sixteen wide phone centered column">
								<div class="ui centered card">
								    <div class="content">
								        <div class="ui centered grid">
								        	<div class="row">
								        		<div class="six wide computer column">
								        			<div class="ui small image simpleimage itemcolor4">
			                                            	<i class="user icon simpleicon"></i>
			                                        </div>
								        		</div>
								        		<div class="ten wide computer column">
								        			<span><h4>Users</h4></span>
								        			9578 Users
								        			<a class="ui tiny label simplelable"><i class="eye icon"></i> Detailsa</a>
								        		</div>
								        	</div>
								        </div>
								    </div>
								</div>
							</div>
							<!-- End Users -->
							<!-- END STATISTIC ITEM -->
							<div class="eight wide computer sixteen wide phone column justifed">
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<script src="assets/vendors/chart.js/Chart.min.js"></script>
		<script src="assets/vendors/chart.js/Chart.utils.js"></script>
		<script src="assets/vendors/chart.js/Chart.example.js"></script>
<?php
	include_once 'layout/footer.php';
?>	