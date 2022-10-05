<?php require('../kon.php'); require('../tgl_indo.php'); session_start(); 
    $level  = $_SESSION['level'];
    $username   = $_SESSION['username'];
    $query      = mysqli_query($kon,"SELECT * FROM user WHERE level='$level' AND username = '$username'");
    $memori       = mysqli_fetch_array($query);
    $_SESSION['id'] = $memori['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="../images/logo.png">
        <title>Hanif Komputer</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="css/metisMenu.min.css" rel="stylesheet">
        <link href="css/timeline.css" rel="stylesheet">
        <link href="css/startmin.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">   
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="../images/logo.png" style="width: 40px; position: relative; bottom: 10px; float: left; margin-right: 7px;"></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../index.php" target="_blank"><i class="fa fa-home fa-fw"></i> Website</a></li>
                    <li> <a href="user.php"><i class="fa fa-user-secret fa-fw"></i> Pelanggan</a> </li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> karyawan <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profil.php"><i class="fa fa-user fa-fw"></i> Profil</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="keluar.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Halaman Utama</a>
            </li>
            <li>
                <a href="service.php"><i class="fa fa-get-pocket fa-fw"></i> Service</a>
            </li>
            <li>
                <a href="garansi.php"><i class="fa fa-gavel fa-fw"></i> Garansi</a>
            </li>
            <li>
                <a href="gaji.php"><i class="fa fa-money fa-fw"></i> Gaji Anda</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Data Inventori<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="inventori.php"><i class="fa fa-tasks fa-fw"></i> Inventori</a>
                    </li>
                    <li>
                        <a href="rusak.php"><i class="fa fa-th-list fa-fw"></i> Inventori Rusak</a>
                    </li>
                    <li>
                        <a href="repair.php"><i class="fa fa-th-list fa-fw"></i> Inventori Keluar</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</nav>