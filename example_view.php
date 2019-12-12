<?php
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="database icon"></i> CONTOH DATA</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<h4></h4>
								<!-- BEGIN DATATABLE -->
								<div class="ui stacked segment">
									<div class="">
										<a href="#" class="ui blue right floated button">
											<i class="plus icon"></i>TAMBAH DATA
										</a>
										<div class="ui blue ribbon icon label">TABEL CONTOH DATA</div>
										<br><br><br>
									</div>
									<table id="example" class="ui celled table responsive nowrap unstackable" style="width:100%">
									    <thead>
									        <tr>
									            <th>First name</th>
									            <th>Last name</th>
									            <th>Position</th>
									            <th>Office</th>
									            <th>Age</th>
									            <th style="text-align: center;">Action</th>
									        </tr>
									    </thead>
									    <tbody>
									        <tr>
									            <td>Tiger</td>
									            <td>Nixon</td>
									            <td>System Architect</td>
									            <td>Edinburgh</td>
									            <td>61</td>
									            <td style="text-align: center;">
									            	<div class="ui buttons">
									            	  <a href="#" class="ui green button"><i class="pen icon"></i></a>
									            	  <div class="or" data-text="/"></div>
									            	  <a href="#" class="ui red button"><i class="trash alternate icon"></i></a>
									            	</div>
									            </td>
									        </tr>
									        <tr>
									            <td>Garrett</td>
									            <td>Winters</td>
									            <td>Accountant</td>
									            <td>Tokyo</td>
									            <td>63</td>
									            <td style="text-align: center;">
									            	<div class="ui buttons">
									            	  <a href="#" class="ui green button"><i class="pen icon"></i></a>
									            	  <div class="or" data-text="/"></div>
									            	  <a href="#" class="ui red button"><i class="trash alternate icon"></i></a>
									            	</div>
									            </td>
									        </tr>
									        <tr>
									            <td>Ashton</td>
									            <td>Cox</td>
									            <td>Junior Technical Author</td>
									            <td>San Francisco</td>
									            <td>66</td>
									            <td style="text-align: center;">
									            	<div class="ui buttons">
									            	  <a href="#" class="ui green button"><i class="pen icon"></i></a>
									            	  <div class="or" data-text="/"></div>
									            	  <a href="#" class="ui red button"><i class="trash alternate icon"></i></a>
									            	</div>
									            </td>
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