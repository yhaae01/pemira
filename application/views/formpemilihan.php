<html>

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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/datatable/css/bootstrap.css">

</head>

<body>
    <?php
    $login = $this->session->userdata('status');
    if ($login == 'loginadmin') {
        redirect(base_url('?pesan=salah'));
    } else if ($login == 'loginpengawas') {
        redirect(base_url('?pesan=salah'));
    } else if ($login == 'loginsiswa') {
    } else {
        redirect(base_url('?pesan=belumlogin'));
    }
    ?>
    <div class="content">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <div class="row">
                    <div class="col-3"><img src="<?php echo base_url('assets/img/logo2.png'); ?>"></div>
                    <div class="col-9 text-right"><b>Selamat Datang : <?php echo ucwords($this->session->userdata('nama')); ?> </b><br>Silahkan pilih calon ketua BEM UBSI BOGOR dibawah ini...</div>
                </div>
            </li>
        </ol>
        <hr>

        <div class="row">
            <?php $no = 1;
            foreach ($data->result_array() as $i) :
                $id = $i['id'];
                $visi = $i['visi'];
                $misi = $i['misi'];
                $namacalon = $i['namacalon'];
                $foto = $i['foto'];
                $totalsuara = $i['totalsuara'];
            ?>
                <div class="col-lg-4 col-md-12 col-xs-12">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <form action="<?php echo base_url('index.php/form/pilih/' . $id . ''); ?>">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <h3 class="text-light display-6"><?php echo $no . '. ' . ucwords($namacalon); ?></h3>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <center>
                                            <h1>
                                                <img class="align-self-center" style="width:240px; height:300px;" alt="" src="<?php echo base_url('assets/img/calon/' . $foto) ?>">
                                            </h1>
                                        </center><br>
                                        <div>
                                            <a class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#pilih<?php echo $id; ?>" href="">Pilih</a>
                                            <a class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#visimisi<?php echo $id; ?>" href="">Visi & Misi</a>
                                        </div>
                                        </center>
                                    </li>
                                </ul>
                            </form>
                        </section>
                    </aside>
                </div>
            <?php $no++;
            endforeach; ?>
        </div>

        <!--Modal VISIMISI-->
        <?php
        $no = 1;
        foreach ($data->result_array() as $i) :
            $id = $i['id'];
            $visi = $i['visi'];
            $misi = $i['misi'];
            $namacalon = $i['namacalon'];
            $foto = $i['foto'];
            $totalsuara = $i['totalsuara'];
        ?>
            <div class="modal fade" id="visimisi<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="card-header user-header alt bg-dark">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="media">
                                    <h1 class="text-light display-6"><?php echo $no . '. ' . ucwords($namacalon); ?></h1>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4 col-sm-12">
                                            <img class="align-self-center" style="width:240px; height:300px;" alt="" src="<?php echo base_url('assets/img/calon/' . $foto) ?>">
                                        </div>
                                        <div class="col">
                                            </h1>
                                            <div class="box">
                                                <h3>Visi :</h3>
                                                <hr>
                                                <p><?php echo $visi; ?></p>
                                            </div>
                                            <hr>
                                            <div class="box">
                                                <h3>Misi :</h3>
                                                <hr>
                                                <p><?php echo $misi; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="modal-footer">
                            <!-- <input type="submit" class="btn btn-success btn-lg btn-block" value="Pilih"> -->
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php $no++;
        endforeach; ?>
        <!-- End Modal VISIMISI -->

        <!-- Modal Vote -->
        <?php
        $no = 1;
        foreach ($data->result_array() as $i) :
            $id = $i['id'];
            $visi = $i['visi'];
            $misi = $i['misi'];
            $namacalon = $i['namacalon'];
            $foto = $i['foto'];
            $totalsuara = $i['totalsuara'];
        ?>
            <div class="modal fade" id="pilih<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="<?php echo  base_url('index.php/form/pilih/' . $id); ?>" method="post">
                            <div class="modal-body">

                                <div class="card-header user-header alt bg-dark">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="media">
                                        <h1 class="text-light display-6"><?php echo $no . '. ' . ucwords($namacalon); ?></h1>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="rounded mx-auto d-block" style="width:240px; height:300px;" alt="No Image" src="<?php echo base_url('assets/img/calon/' . $foto) ?>">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Pilih">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php $no++;
        endforeach; ?>
        <!-- End Modal Vote -->

        <center>
            <div class="footer-inner bg-white">
                Copyright &copy; BEM UBSI BOGOR <?php echo date("Y"); ?>
            </div>
        </center>
    </div> <!-- .content -->
    </div><!-- /#right-panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>