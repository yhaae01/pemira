<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <title>PEMILIHAN UMUM KETUA BEM UBSI BOGOR</title>

    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/img/bem-logo.png">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/bem-logo.png">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatable/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatable/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

</head>

<body>

    <?php
    $login = $this->session->userdata('status');
    if ($login == 'loginadmin') {
    } else if ($login == 'loginpengawas') {
        redirect(base_url('?pesan=salah'));
    } else if ($login == 'loginsiswa') {
        redirect(base_url('?pesan=salah'));
    } else {
        redirect(base_url('?pesan=belumlogin'));
    }
    ?>

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li><!-- /.menu-title -->

                    <li class="menu-item">
                        <a href="DataCalon"> <i class="menu-icon fa fa-id-badge"></i>Data Calon</a>
                        <a href="DataMahasiswa"> <i class="menu-icon fa fa-user"></i>Data Mahasiswa</a>
                        <a href="" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#konfirmkeluar"> <i class="menu-icon fa fa-times"></i>Keluar</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href=""><img src="assets/img/logo.png" width="40" height="40" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div style="position: fixed;right: 30px; top: 8px;">
                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#konfirmkeluar">Keluar</a>
            </div>
        </header>
        <!-- Header-->