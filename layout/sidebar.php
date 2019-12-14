				<!-- BEGIN SIDEBAR -->
				<!-- computer only sidebar -->
				<div class="computer only row">
					<div class="left floated three wide computer column" id="computersidebar">
						<div class="ui vertical fluid menu scrollable" id="simplefluid">
							<div class="clearsidebar"></div>
							<div class="item">
								<img src="assets/images/user.png" id="sidebar-image">
							</div>
							<a class="item" href="index.php"><i class="chart line icon"></i> Dashboard</a>
							<a class="item" href="kelola_pengguna.php"><i class="users cog icon"></i> Pengelolaan Pengguna</a>
							<a class="item" href="example_view.php"><i class="database icon"></i> Contoh Data</a>
							<div class="ui horizontal accordion item">
						        <span class="title item">
						            <i class="dropdown icon"></i> Contoh Element
						        </span>
						        <div class="content">
					                <div class="simple field">
					                    <a class="item" href="example_form.php"><i class="keyboard icon"></i> Contoh Form</a>
					                </div>
					                <div class="simple field">
					                    <a class="item" href="example_message.php"><i class="envelope outline icon"></i> Contoh Pesan</a>
					                </div>
					                <div class="simple field">
					                    <a class="item" href="example_blank.php"><i class="file outline icon"></i> Halaman Blank</a>
					                </div>
						        </div>
							</div>		
							<a class="item" href="functions/logout.php"><i class="sign out alternate icon"></i> Logout</a>
							<a class="item"></a>
						</div>
					</div>
				</div>
				<!-- end computer only sidebar -->
				<!-- mobile and tablet only sidebar -->
				<div class="tablet mobile only row">
					<div id="mobiletabletsidebar" class="mobiletabletsidebar animate hidden">
						<div class="ui left fixed vertical menu scrollable">
							<div class="item">
								<table>
									<tr>
										<td>
											<img class="ui mini image" src="assets/images/logo.png">
										</td>
										<td>
											<span class="clear"><strong>PT JAKATIJAYA MEGAH</strong></span>
										</td>
									</tr>
								</table>
							</div>
							<a class="item" href="index.php"><i class="chart line icon"></i> Dashboard</a>
							<a class="item" href="kelola_pengguna.php"><i class="users cog icon"></i> Pengelolaan Pengguna</a>
							<a class="item" href="example_view.php"><i class="database icon"></i> Contoh Data</a>	
							<a class="item" href="functions/logout.php"><i class="sign out alternate icon"></i> Logout</a>
							<div class="item" id="hidemobiletabletsidebar">
								<button class="fluid ui button">
									Close
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end mobile and tablet only sidebar -->
				<!-- END SIDEBAR -->
			</div>
		</div>