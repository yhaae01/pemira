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
            $visi = $i['visi'];
            $misi = $i['misi'];
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

<!--Modal Keluar -->
<div class="modal fade" id="konfirmkeluar" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticModalLabel">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                <form action="<?= base_url('index.php/Welcome/logout'); ?>">
                    <input type="submit" class="btn btn-outline-danger" value="Ya, keluar">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Keluar -->

<!--Modal Grafik -->
<div class="modal fade" id="lihatgrafik" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="largeModalLabel">
                    <center>Hasil Pemilihan</center>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <h4 class="mb-3"> </h4>
                            <canvas id="doughutChart" height="300" width="601" class="chartjs-render-monitor" style="display: block; width: 601px; height: 300px;"></canvas>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<br>