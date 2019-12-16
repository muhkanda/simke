<?php
    session_start();
    // NOT LOGGED IN
    if($_SESSION['login']!="yes"){
        header("location:login.php");
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
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/vendors/fomantic-ui/semantic.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net/datatables.net-se/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net/datatables.net-responsive-se/css/responsive.semanticui.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net/datatables.net-buttons-se/css/buttons.semanticui.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/fomantic-ui/semantic.min.js"></script>
    <!-- endinject -->
</head>
<body>
    <div class="ui grid">
        <div class="row">
            <div class="ui grid">
                <!-- BEGIN NAVBAR -->
                <!-- computer only navbar -->
                <div class="computer only row">
                    <div class="column">
                        <div class="ui top fixed menu navcolor">
                            <div class="item">
                                <img class="imgrad" src="assets/images/logo.png" alt="SimpleIU">
                            </div>
                            <div class="left menu">
                                <div class="nav item">
                                    <strong class="navtext">PT JAKATIJAYA MEGAH</strong>
                                </div>
                            </div>
                            <div class="ui top pointing dropdown admindropdown link item right">
                                <img class="imgrad" src="assets/images/user.png" alt="">
                                <span class="clear navtext"><strong style="text-transform: uppercase;"><?= $_SESSION['nama']; ?></strong></span>
                                <i class="dropdown icon navtext"></i>
                                <div class="menu">
                                    <div class="item">
                                        <a href="functions/logout.php"><i class="sign out alternate icon"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end computer only navbar -->
                <!-- mobile and tablet only navbar -->
                <div class="tablet mobile only row">
                    <div class="column">
                        <div class="ui top fixed menu navcolor">
                            <a id="showmobiletabletsidebar" class="item navtext"><i class="content icon"></i></a>
                            <div class="right menu">
                                <div class="item">
                                    <strong class="navtext">PT JAKATIJAYA MEGAH</strong>
                                </div>
                                <div class="item">
                                    <img src="assets/images/logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end mobile and tablet only navbar -->
                <!-- END NAVBAR -->