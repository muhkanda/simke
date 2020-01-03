				<!-- BEGIN SIDEBAR -->
				<!-- computer only sidebar -->
				<div class="computer only row">
					<div class="left floated three wide computer column" id="computersidebar">
						<div class="ui vertical fluid menu scrollable" id="simplefluid">
							<div class="clearsidebar"></div>
							<div class="item">
								<img src="assets/images/user.png" id="sidebar-image">
							</div>
							<a class="item" href="index.php"><i class="table icon"></i> Dashboard</a>
							<?php 

							$role = $_SESSION['role'];

							$menuPegawai = '<a class="item" href="kelola_pegawai.php"><i class="users icon"></i> Pengelolaan Pegawai</a>';
							$menuGaji = '<a class="item" href="kelola_gaji.php"><i class="money bill alternate outline icon"></i> Pengelolaan Gaji Pegawai</a>';
							$menuArusKas = '<a class="item" href="kelola_arus_kas.php"><i class="exchange alternate icon"></i> Pengelolaan Arus Kas</a>';
							$menuAnggaran = '<a class="item" href="kelola_anggaran.php"><i class="handshake outline icon"></i> Pengelolaan Anggaran</a>';
							$menuPendapatan = '<a class="item" href="kelola_pendapatan.php"><i class="chart line icon"></i> Pengelolaan Pendapatan</a>';
							$menuPengguna = '<a class="item" href="kelola_pengguna.php"><i class="user cog icon"></i> Pengelolaan Pengguna</a>';
							$menuJenisAnggaran = '<a class="item" href="kelola_jenis_anggaran.php"><i class="money bill alternate icon"></i> Kelola Jenis Anggaran</a>';
							$menuJabatan = '<a class="item" href="kelola_jabatan.php"><i class="briefcase icon"></i> Kelola Jabatan</a>';
							$menuDivisi = '<a class="item" href="kelola_divisi.php"><i class="user friends icon"></i> Kelola Divisi</a>';
							$menuNeraca = '<a class="item" href="#"><i class="balance scale icon"></i> Neraca</a>';

							if ($role == 1) {
								echo $menuPegawai;
								echo $menuJabatan;
								echo $menuDivisi;
								echo $menuPengguna;
							}

							if ($role == 4) {
								echo $menuGaji;
								echo $menuPendapatan;
								echo $menuAnggaran;
								echo $menuJenisAnggaran;
								echo $menuNeraca;
							}

							if ($role == 3) {
								echo $menuGaji;
								echo $menuPendapatan;
								echo $menuNeraca;
								echo $menuAnggaran;
							}

							if ($role == 2) {
								echo $menuArusKas;
								echo $menuPendapatan;
								echo $menuNeraca;
								echo $menuAnggaran;
							}
							?>
							
                            
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