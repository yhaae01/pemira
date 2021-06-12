<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <title>PEMILIHAN UMUM KETUA BEM UBSI BOGOR</title>

    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/img/bem-logo.png">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/bem-logo.png">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/datatable/css/bootstrap.css">

</head>

<body>
    <?php
    $login = $this->session->userdata('status');
    if ($login == 'loginadmin') {
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
                    <div class="col-3"><img src="<?= base_url('assets/img/logo2.png'); ?>"></div>
                    <div class="col-9 text-right"><b>Selamat Datang : <?= strtoupper($this->session->userdata('nama')); ?> </b><br>Silahkan pilih calon ketua BEM UBSI BOGOR dibawah ini...</div>
                </div>
            </li>
        </ol>
        <hr>

        <div class="row">
            <?php $no = 1;
            foreach ($data->result_array() as $i) :
                $id = $i['id'];
                $nim = $i['nim'];
                $namacalon = $i['namacalon'];
                $jurusan = $i['jurusan'];
                $asalkampus = $i['asalkampus'];
                $riwayat = $i['riwayat'];
                $proker = $i['proker'];
                $visi = $i['visi'];
                $misi = $i['misi'];
                $foto = $i['foto'];
                $totalsuara = $i['totalsuara'];
            ?>
                <div class="col-lg-4 col-md-12 col-xs-12">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <form action="<?= base_url('form/pilih/' . $id . ''); ?>">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <h3 class="text-light display-6"><?= $no . '. ' . strtoupper($namacalon); ?></h3>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <center>
                                            <h1>
                                                <img class="align-self-center" style="width:240px; height:300px;" alt="" src="<?= base_url('assets/img/calon/' . $foto) ?>">
                                            </h1>
                                        </center><br>
                                        <div>
                                            <a class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#pilih<?= $id; ?>" href="">Pilih</a>
                                            <a class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#biodata<?= $id; ?>" href="">Biodata</a>
                                            <a class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#visimisi<?= $id; ?>" href="">Visi Misi & Proker</a>
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
            $id     = $i['id'];
            $visi   = $i['visi'];
            $misi   = $i['misi'];
            $proker = $i['proker'];
            $foto   = $i['foto'];
        ?>
            <div class="modal fade" id="visimisi<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="card-header user-header alt bg-dark">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="media">
                                    <h3 class="text-light display-6"><?= $no . '. ' . strtoupper($namacalon); ?></h3>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4 col-sm-12">
                                            <img class="align-self-center" style="width:240px; height:300px;" alt="" src="<?= base_url('assets/img/calon/' . $foto) ?>">
                                        </div>
                                        <div class="col">
                                            </h1>
                                            <div class="box">
                                                <h4>Visi :</h4>
                                                <hr>
                                                <p><?= $visi; ?></p>
                                            </div>
                                            <hr>
                                            <div class="box">
                                                <h4>Misi :</h4>
                                                <hr>
                                                <p><?= $misi; ?></p>
                                            </div>
                                            <hr>
                                            <div class="box">
                                                <h4>Program Kerja Unggulan :</h4>
                                                <hr>
                                                <p><?= $proker; ?></p>
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
            $id         = $i['id'];
            $namacalon  = $i['namacalon'];
            $foto       = $i['foto'];
        ?>
            <div class="modal fade" id="pilih<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form action="<?= base_url('form/pilih/' . $id); ?>" method="post">
                            <div class="modal-body">

                                <div class="card-header user-header alt bg-dark">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="media">
                                        <h3 class="text-light display-6"><?= $no . '. ' . strtoupper($namacalon); ?></h3>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-12">
                                                <img class="rounded mx-auto d-block" style="width:240px; height:300px;" alt="No Image" src="<?= base_url('assets/img/calon/' . $foto) ?>">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success btn-lg btn-block" value="Ya, Vote!">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php $no++;
        endforeach; ?>
        <!-- End Modal Vote -->

        <!--Modal biodata-->
        <?php
        $no = 1;
        foreach ($data->result_array() as $i) :
            $id         = $i['id'];
            $nim        = $i['nim'];
            $namacalon  = $i['namacalon'];
            $jurusan    = $i['jurusan'];
            $foto       = $i['foto'];
            $asalkampus = $i['asalkampus'];
            $riwayat    = $i['riwayat'];
            $link       = $i['link'];
        ?>
            <div class="modal fade" id="biodata<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largemodalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">

                            <div class="card-header user-header alt bg-dark">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="media">
                                    <h3 class="text-light display-6"><?= $no . '. ' . strtoupper($namacalon); ?> - <?= $nim; ?></h3>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4 col-sm-12">
                                            <img class="align-self-center" style="width:240px; height:300px;" alt="" src="<?= base_url('assets/img/calon/' . $foto) ?>">
                                        </div>
                                        <div class="col">
                                            <div class="box">
                                                <h4>Asal Kampus :</h4>
                                                <hr>
                                                <p><?= strtoupper($asalkampus); ?></p>
                                            </div>
                                            <hr>
                                            <div class="box">
                                                <h4>Jurusan :</h4>
                                                <hr>
                                                <p><?= strtoupper($jurusan); ?></p>
                                            </div>
                                            <hr>
                                            <div class="box">
                                                <h4>Riwayat Organisasi :</h4>
                                                <hr>
                                                <p><?= $riwayat; ?></p>
                                            </div>
                                            <hr>
                                            <div class="box">
                                                <h4>Link Video Kampanye :</h4>
                                                <hr>
                                                <p>Klik link <a href="<?= $link; ?>" target="_blank" rel="noopener noreferrer" style="color: blue; text-decoration: underline;">berikut</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php $no++;
        endforeach; ?>
        <!-- End Modal biodata -->

        <center>
            <div class="footer-inner bg-white">
                Copyright &copy; BEM UBSI BOGOR <?= date("Y"); ?>
            </div>
        </center>
    </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
</body>

</html>