<?php
	include_once 'layout/header.php';
	include_once 'layout/sidebar.php';
?>
	<script>
		$('body')
		  .toast({
		    title: 'Halo!',
		    message: 'Hei Kamu! Selamat Datang Di Halaman Pesan!',
		    showProgress: 'bottom'
		});
	</script>		
		<!-- BEGIN CONTEN -->
		<div class="right floated thirteen wide computer sixteen wide phone column" id="content">
			<div class="ui container grid">
				<div class="row">
					<div class="fifteen wide computer sixteen wide phone centered column">
						<h2><i class="keyboard icon"></i> CONTOH PESAN</h2>
						<div class="ui divider"></div>
						<div class="ui grid">
							<!-- SUCCESS -->
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui success message">
								    <i class="close icon"></i>
								    <div class="header">
								        Your user registration was successful.
								    </div>
								    <p>You may now log-in with the username you have chosen</p>
								</div>
							</div>							
							<!-- END SUCCESS -->
							<!-- WARNING -->
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui warning message">
								    <i class="close icon"></i>
								    <div class="header">
								        You must register before you can do that!
								    </div>
								    Visit our registration page, then try again
								</div>
							</div>			
							<!-- END WARNING -->
							<!-- ERROR -->
							<div class="sixteen wide computer sixteen wide phone centered column">
								<div class="ui error message">
								    <i class="close icon"></i>
								    <div class="header">
								        We're sorry we can't apply that discount
								    </div>
								    <p>That offer has expired</p>
								</div>
							</div>
							<!-- END ERROR -->
							<div class="sixteen wide computer sixteen wide phone centered column">
								<button id="berhasil" class="ui green button">SUCCES TOAST</button>
								<button id="gagal" class="ui red button">FAILED TOAST</button>
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
    $("#berhasil").click(function(){
        $('body')
          .toast({
            title: 'Berhasil!',
            message: 'Lorem ipsum dolor sit amet, consectetur.',
            showProgress: 'bottom',
            classProgress: 'green'
        });
    });
    $("#gagal").click(function(){
        $('body')
          .toast({
            title: 'Gagal!',
            message: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
            showProgress: 'bottom',
            classProgress: 'red'
        });
    });
</script>