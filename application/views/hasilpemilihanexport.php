<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PEMILIHAN UMUM KETUA BEM UBSI BOGOR</title>

    <link rel="apple-touch-icon" href="assets/img/bem-logo.png">
    <link rel="shortcut icon" href="assets/img/bem-logo.png">

    <link rel="stylesheet" href="<?php  echo base_url('assets/css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php  echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php  echo base_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php  echo base_url('assets/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php  echo base_url('assets/css/pe-icon-7-filled.css'); ?>">


    <link href="<?php  echo base_url('assets/weather/css/weather-icons.css'); ?>" rel="stylesheet" />
    <link href="<?php  echo base_url('assets/calendar/fullcalendar.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" href="<?php  echo base_url('assets/css/style.css'); ?>">
    <link href="<?php  echo base_url('assets/css/charts/chartist.min.css'); ?>" rel="stylesheet"> 
    <link href="<?php  echo base_url('assets/css/lib/vector-map/jqvmap.min.css'); ?>" rel="stylesheet"> 

    <link rel="stylesheet" type="text/css" href="assets/datatable/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="assets/datatable/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/datatable/css/dataTables.bootstrap.css">

</head>
<body>
<?php
$login=$this->session->userdata('status');
if($login=='loginadmin'){
    
}else if($login=='loginpengawas'){
    
}else if($login=='loginsiswa'){
    redirect(base_url('?pesan=salah'));
}else{
    redirect(base_url('?pesan=belumlogin'));
}

?>
        <!-- Header-->
        <div class="content pb-0">
        <h1><i class="fa fa-bar-chart-o"> </i> Hasil Pemilihan</h1>
        <?php $nototal=0;$belummemilih=0;$sudahmemilih=0;$sudahabsen=0;$belumabsen=0;$sudahabsenbelummilih=0;
            foreach($datapemilih->result_array() as $j):
                $id=$j['id'];
                $suara=$j['suara'];
                $absen=$j['absen'];
            if ($suara!=0) {
                $sudahmemilih++;
            }
            if ($suara==0) {
                $belummemilih++;
            }
            if ($absen!=0){
                $sudahabsen++;
            }
            if ($absen==0) {
                $belumabsen++;
            }
            if ($suara==0 && $absen!=0) {
                $sudahabsenbelummilih++;
            };
            $nototal++;
            endforeach;
            
        ?>
        <hr> 
        <div class="container">
            <div class="row">
                <div class="col-4"> DPT : <?php echo $nototal; ?> <br> Sudah absen belum memilih : <?php echo $sudahabsenbelummilih; ?> </div>
                <div class="col-4 text-center"> Sudah Memilih : <?php echo $sudahmemilih; ?><br>Sudah Absen : <?php echo $sudahabsen; ?></div>
                <div class="col-4 text-right"> Belum Memilih : <?php echo $belummemilih; ?><br>Belum Absen : <?php echo $belumabsen; ?></div>
            </div>
        </div>
        <hr>
            <div class="row">

                <?php $no=1;
                    foreach($data->result_array() as $i):
                    $id=$i['id'];
                    $visi=$i['visi'];
                    $misi=$i['misi']; 
                    $namacalon=$i['namacalon']; 
                    $foto=$i['foto']; 
                    $totalsuara=$i['totalsuara'];        
                    ?>
            <?php $no++; endforeach;?>
            </div>
                <div class="row">
                    <?php $no=1;
                    foreach($data->result_array() as $i):
                        $id=$i['id'];
                        $visi=$i['visi'];
                        $misi=$i['misi']; 
                        $namacalon=$i['namacalon']; 
                        $foto=$i['foto']; 
                        $totalsuara=$i['totalsuara'];        
                    ?>
                    <div class="col-md-4">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <form action="<?php echo base_url('index.php/form/pilih/'.$id.''); ?>">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">                            
                                            <h3 class="text-light display-6"><?php echo $no.'. '. ucwords($namacalon);?></h3>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <center>
                                        <h1>
                                            <img class="align-self-center" style="width:240px; height:300px;" alt="" src="<?php echo base_url('assets/img/calon/'.$foto)?>">
                                        </h1>
                                        </center><br>
                                        <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <center>
                                        <h1><br><?php echo $totalsuara;?> Suara</h1>
                                        <h3><?php $persen=($totalsuara/$nototal)*100 ;echo $persen; ?> %</h3>
                                        <br><br>
                                    </center>
                                    </li>
                                </ul>
                                    </center>
                                    </li>
                                </ul>
                            </form>
                            </section>
                        </aside>
                    </div>
                    <?php $no++; endforeach;?>
                </div>
        </div> <!-- .content -->
        <div class="clearfix"></div>

<br>
<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6 text-right">
                Copyright &copy; BEM UBSI BOGOR
            </div>
        </div>
    </div>
</footer>
</div><!-- /#right-panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>


    <!--Chartist Chart-->
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/chartist/chartist-plugin-legend.js"></script> 

    
    <script src="assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="assets/js/lib/flot-chart/jquery.flot.spline.js"></script>


    <script src="assets/weather/js/jquery.simpleWeather.min.js"></script>
    <script src="assets/weather/js/weather-init.js"></script>


    <script src="assets/js/lib/moment/moment.js"></script>
    <script src="assets/calendar/fullcalendar.min.js"></script>
    <script src="assets/calendar/fullcalendar-init.js"></script>

    <script type="text/javascript" src="assets/datatable/js/jquery.js"></script>
    <script type="text/javascript" src="assets/datatable/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('.dataku').DataTable();
    });
    </script>
    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
