<?php
$sec = "10";
?>
<meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?= base_url('Dasbor') ?>'">

<div class="content pb-0">

    <h1><i class="fa fa-bar-chart-o"> </i> Hasil Pemilihan</h1>
    <hr>
    <a class="btn btn-success mb-3" href="<?php echo base_url('dasbor/export'); ?>"><i class="fa fa-print">
        </i> Cetak</a>

    <?php
    $nototal                = 0;
    $belummemilih           = 0;
    $sudahmemilih           = 0;
    $sudahabsen             = 0;
    $belumabsen             = 0;
    $sudahabsenbelummilih   = 0;
    foreach ($datapemilih->result_array() as $j) :
        $id = $j['id'];
        $suara = $j['suara'];
        $absen = $j['absen'];
        if ($suara != 0) {
            $sudahmemilih++;
        }
        if ($suara == 0) {
            $belummemilih++;
        }
        if ($absen != 0) {
            $sudahabsen++;
        }
        if ($absen == 0) {
            $belumabsen++;
        }
        if ($suara == 0 && $absen != 0) {
            $sudahabsenbelummilih++;
        };
        $nototal++;
    endforeach;

    ?>
    <div class="row">

        <?php $no = 1;
        foreach ($data->result_array() as $i) :
            $id = $i['id'];
            $namacalon = $i['namacalon'];
            $foto = $i['foto'];
            $totalsuara = $i['totalsuara'];
        ?>
            <div class="col-lg-4">
                <aside class="profile-nav alt">
                    <section class="card">
                        <div class="card-header user-header alt bg-dark">
                            <div class="media">
                                <a href="#">
                                    <img class="img-thumbnail mr-2" style="width:85px; height:85px;" alt="" src="<?php echo base_url('assets/img/calon/' . $foto) ?>">
                                </a>
                                <div class="media-body">
                                    <h4 class="text-light"><?php echo ucwords($namacalon); ?></h2>
                                        <p>Calon No <?php echo $no; ?></p>
                                </div>
                            </div>
                        </div>


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <center>
                                    <h3><br><?php echo $totalsuara; ?> Suara</h3>
                                    <h4><?php $persen = ($totalsuara / $nototal) * 100;
                                        echo $persen; ?> %</h4>
                                    <br><br>
                                </center>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>

        <?php $no++;
        endforeach; ?>
    </div>

</div> <!-- .content -->
<div class="clearfix"></div>