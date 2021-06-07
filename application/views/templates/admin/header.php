<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <title>PEMILIHAN UMUM KETUA BEM UBSI BOGOR</title>

    <link rel="apple-touch-icon" href="assets/img/bem-logo.png">
    <link rel="shortcut icon" href="assets/img/bem-logo.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/datatable/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="assets/datatable/css/dataTables.bootstrap.css">

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
                        <a href="dasbor"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li><!-- /.menu-title -->

                    <li class="menu-item">
                        <a href="Datacal"> <i class="menu-icon fa fa-id-badge"></i>Data Calon</a>
                        <!-- <a href="Datapeng"> <i class="menu-icon fa fa-eye"></i>Data Pengawas</a> -->
                        <a href="Datapem"> <i class="menu-icon fa fa-user"></i>Data Pemilih</a>
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