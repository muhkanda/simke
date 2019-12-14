<?php
    session_start();
    // LOGGED IN
    if(isset($_SESSION['login'])!=""){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <meta name="robots" content="all,follow">
    <title>SIM KEUANGAN &mdash; PT JAKATIJAYA MEGAH</title>
    <link rel="icon" href="assets/images/logo.png" sizes="32x32">
    <link rel="stylesheet" href="assets/vendors/fomantic-ui/semantic.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/fomantic-ui/semantic.min.js"></script>
</head>
<body>
<?php if (isset($_GET['failed'])) { ?>
    <script>
        $('body')
          .toast({
            title: 'Login Gagal!',
            message: 'Username / Password Salah!',
            class: 'red',
            showProgress: 'top'
        });
    </script>
<?php } ?>
    <div class="ui centered grid">
        <div class="four wide computer column" style="margin-top: 10%;">
            <form action="functions/login_check.php" method="POST">
                <div class="ui segment">
                    <img class="ui centered medium image" src="assets/images/logo-full.png" alt=""><br>
                    <div class="ui form">
                        <div class="field">
                            <label>USERNAME</label>
                            <input name="username" placeholder="USERNAME" type="text">
                        </div>
                        <div class="field">
                            <label>PASSWORD</label>
                            <input name="password" placeholder="PASSWORD" type="password">
                        </div>
                    </div>  
                    <br>
                    <button style="width: 100%;" class="ui blue button">
                        <i class="sign in alternate icon"></i>
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>