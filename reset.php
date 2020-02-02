<!-- <?php
    session_start();
    // LOGGED IN
    if(isset($_SESSION['login'])!=""){
        header("location:index.php");
    }
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <meta name="robots" content="all,follow">
    <title>RESET PASSWORD &mdash; SIM KEUANGAN PT JAKATIJAYA MEGAH</title>
    <link rel="icon" href="assets/images/logo.png" sizes="32x32">
    <link rel="stylesheet" href="assets/vendors/fomantic-ui/semantic.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/fomantic-ui/semantic.min.js"></script>
</head>
<body>
    <div class="ui centered grid">
        <div class="four wide computer column" style="margin-top: 10%;">
            <form action="functions/function_reset.php" method="POST">
                <div class="ui segment">
                    <img class="ui centered medium image" src="assets/images/logo-full.png" alt=""><br>
                    <div class="ui form">
                        <div class="field">
                            <label>MASUKAN EMAIL ANDA</label>
                            <input name="email" placeholder="exp@mail.com" type="text">
                        </div>
                    </div>  
                    <br>
                    <input type="hidden" name="submit">
                    <button style="width: 100%;" class="ui blue button">
                        <i class="send icon"></i>
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- <?php 
    if (isset($_SESSION['message']) == 'logfail') { 
        echo "
            <script>
                $('body')
                  .toast({
                    title: 'Login Gagal!',
                    message: 'Username / Password Salah!',
                    class: 'red',
                    showProgress: 'top'
                });
            </script>
        ";
    }
    unset($_SESSION['message']); 
?> -->
</html>