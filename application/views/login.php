<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <title>PEMILIHAN UMUM KETUA BEM UBSI BOGOR | Login</title>

    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/bem-logo.png">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/bem-logo.png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body style="background-color: #3498db;">
    <div class="sufee-login d-flex align-content-center flex-wrap mt-4">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <div class="login-logo">
                        <img class="align-content" src="<?= base_url() ?>assets/img/logo.png" height="180">
                        <title>PEMILIHAN UMUM KETUA BEM UBSI BOGOR</title>
                    </div>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "<div class='alert alert-danger'>Oops! NIM atau password salah.</div>";
                        } else if ($_GET['pesan'] == "logout") {
                            echo "<div class='alert alert-danger'>Anda berhasil logout.</div>";
                        } else if ($_GET['pesan'] == "salah") {
                            echo "<div class='alert alert-danger'>Oops! Akses ditolak.</div>";
                        } else if ($_GET['pesan'] == "sudahmemilih") {
                            echo "<div class='alert alert-danger'>Oops! Gagal login karena sudah memilih.</div>";
                        } else if ($_GET['pesan'] == "belumabsen") {
                            echo "<div class='alert alert-danger'>Oops! Absen belum dibuka.</div>";
                        } else if ($_GET['pesan'] == "terimakasih") {
                            echo "<div class='alert alert-success'>Terimakasih telah menggunakan hak pilih.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Silahkan login dulu.</div>";
                        }
                    }
                    ?>
                    <form method="POST" action="<?= base_url('Welcome/aksi_login'); ?>">
                        <div class="form-group">
                            <input type="text" name="username" placeholder="NIM . . ." class="form-control" autocomplete="no">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password . . ." class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>