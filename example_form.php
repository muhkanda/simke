<?php
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="keyboard icon"></i>CONTOH FORM</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<div class="sixteen wide computer sixteen wide phone centered column">
								<form action="" method="POST">
					                <div class="ui stacked segment">
					                    <div class="ui form">
					                        <div class="field">
					                            <label>DATA TEXT</label>
					                            <input name="" placeholder="" type="text">
					                        </div>
					                        <div class="field">
					                            <label>DATA NUMBER</label>
					                            <input name="" placeholder="" type="number">
					                        </div>
					                        <div class="field">
					                            <label>DATA CALENDAR</label>
					                            <div class="ui calendar" id="standard_calendar">
					                                <input type="text">
					                            </div>
					                        </div>
					                        <div class="two fields">
					                            <div class="field">
					                                <label>ONE</label>
					                                <input type="text" placeholder="">
					                            </div>
					                            <div class="field">
					                                <label>TWO</label>
					                                <input type="text" placeholder="">
					                            </div>
					                        </div> 
					                    </div>
					                    <br>
					                    <button class="ui blue button">
					                        <i class="save icon"></i>
					                        SIMPAN
					                    </button>
					                    <a class="ui button" href="#">
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
<script>
	$('#standard_calendar')
	  .calendar({
	  	type: 'date'
	  })
	;
</script>