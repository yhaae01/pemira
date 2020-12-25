    <div class="content pb-0">

        <h1><i class="fa fa-users"> </i> DATA PEMILIH</h1>
        <hr>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata" ><i class="fa fa-plus-circle"></i>&nbsp; Tambah</button> <a href="<?php echo base_url('datapem/export') ?>" class="btn btn-success" ><i class="fa fa-print"></i>&nbsp; Export</a>
            </div>
    	</div>
        <hr>
        <?php if($this->session->flashdata('success_msg')){

            ?>
            <div class="alert alert-success"><center>
                <?php echo $this->session->flashdata('success_msg'); ?>                
            </center></div>
            <?php
        } ?>
        <?php if($this->session->flashdata('error_msg')){

            ?>
            <div class="alert alert-danger"><center>
                <?php echo $this->session->flashdata('error_msg'); ?>                
            </center></div>
            <?php
        } ?>
    
    <div class="clearfix">
        <table class="table table-striped table-bordered dataku">
            <thead style="text-align:center">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Pemilih</th>
                    <!-- <th>Kelas</th> -->
                    <th>Absen</th>
                    <th>Suara</th>
                    <th width="150"><button class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#truncate" >Kosongkan</button></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    foreach($data->result_array() as $i):
                            $id=$i['id'];
                            $nis=$i['nis']; 
                            $namasiswa=$i['namasiswa']; 
                            // $kelas=$i['kelas']; 
                            $suara=$i['suara'];
                            $absen=$i['absen'];        
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo "$no"?></td>
                    <td><?php echo $nis;?> </td>
                    <td><?php echo ucwords($namasiswa);?> </td>
                    <!-- <td><?php echo $kelas;?> </td> -->
                    <td style="text-align: center;"><?php
                        if ($absen=='0') {
                            ?>
                                <button type="button" class="btn btn-warning">Belum Absen</button>
                            <?php
                        }else{
                            ?>
                                <button type="button" class="btn btn-success">Telah Absen</button>
                            <?php
                        };
                    ?> </td>
                    <td style="text-align: center;"><?php
                        if ($suara=='0') {
                            ?>
                                <button type="button" class="btn btn-warning">Belum Memilih</button>
                            <?php
                        }else{
                            ?>
                                <button type="button" class="btn btn-success">Telah Memilih</button>
                            <?php
                        };
                    ?> </td>
                    <td>

                        <a class="btn btn-outline-success" data-toggle="modal" data-target="#editdata<?php echo $id;?>"  href=""><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-outline-primary" href="datapem/edita/<?php echo $id;?>" title="Absen" href=""><i class="fa fa-check"></i></a>
                        <a class="btn btn-outline-secondary" href="datapem/editbatal/<?php echo $id;?>" title="Batal Absen"  href=""><i class="fa fa-undo"></i></a>
                        <a class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Reset Pilihan" href="<?php echo  base_url('index.php/datapem/resetpilihan/'.$id);?>"><i class="fa fa-undo"></i></a>
                        <a class="btn btn-outline-danger" href="<?php echo  base_url('index.php/datapem/delete/'.$id);?>"><i class="fa fa-trash"></i></a>
                        
                    </td>
                </tr>
                <?php $no++; endforeach;?>
            </tbody>
        </table>
    </div>

<!--Modal tambah-->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h2><i class="fa fa-plus-circle"></i>&nbsp; Pemilih</h2>
            </div>


            <form action="datapem/insert" method="post">
                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">NIM</label></div>
                        <div class="col-12">
                            <input type="text" id="nis" name="nis" placeholder="NIS . . ." required class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Password</label></div>
                        <div class="col-12">
                            <input type="password" id="password" name="password" placeholder="Password . . ."  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama Pemilih</label></div>
                        <div class="col-12">
                            <input type="text" id="nama" name="nama" placeholder="Nama . . ."  class="form-control">
                        </div>
                    </div>

                    <!-- <div class="row form-group">
                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">Kelas</label></div>
                        <div class="col-12 col-md-9">
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="11.2A.13">11.2A.13</option>
                                <option value="11.2B.13">11.2B.13</option>
                                <option value="12.2A.13">12.2A.13</option>
                                <option value="12.2B.13">12.2B.13</option>
                                <option value="12.2C.13">12.2C.13</option>
                                <option value="12.2D.13">12.2D.13</option>
                            </select>
                        </div>
                    </div> -->
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" value="Tambah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal Edit-->
<?php
    foreach($data->result_array() as $i):
    $id=$i['id'];
    $nis=$i['nis']; 
    $password=$i['password'];
    $namasiswa=$i['namasiswa']; 
    // $kelas=$i['kelas']; 
    $suara=$i['suara'];
?>
<div class="modal fade" id="editdata<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h2><i class="fa fa-pencil"></i>&nbsp; Pemilih</h2>
            </div>

            <form action="<?php echo  base_url('index.php/datapem/edit/'.$id);?>" method="post">
                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">NIS</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nis" name="nis" placeholder="NIS . . ."  class="form-control" readonly value="<?php echo $nis; ?>"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Passowrd</label></div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password" name="password" placeholder="NIS . . ."  readonly class="form-control" value="<?php echo $password; ?>"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama Pemilih</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama" name="nama" placeholder="Nama . . ."  class="form-control" value="<?php echo $namasiswa; ?>"></div>
                    </div>

                    <!-- <div class="row form-group">
                        <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">Kelas</label></div>
                        <div class="col-12 col-md-9">
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="X RPL 1">X RPL 1</option>
                                <option value="X RPL 2">X RPL 2</option>
                                <option value="XI RPL 1">XI RPL 1</option>
                                <option value="XI RPL 2">XI RPL 2</option>
                                <option value="XII RPL 1">XII RPL 1</option>
                                <option value="XII RPL 2">XII RPL 2</option>
                            </select>
                        </div>
                    </div> -->
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" value="Ubah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
        <div class="clearfix"></div>


<!--Modal Keluar -->
<div class="modal fade" id="konfirmkeluar" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Apakah anda yakin ingin keluar?</h5>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form  action="<?php echo base_url('index.php/Welcome/logout'); ?>">
                    <input type="submit" class="btn btn-primary" value="Ya">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Keluar -->

<!--Modal truncate -->
<div class="modal fade" id="truncate" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Jika Anda menghapus semua data pemilih maka hasil pemilihan juga akan direset...<hr>Apakah anda yakin ingin menghapus semua data pemilih ?</h5>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form  action="<?php echo base_url('index.php/datapem/hapussemua') ?>">
                    <input type="submit" class="btn btn-primary" value="Ya">
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal truncate -->
<br>
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 text-right">
                        Copyright &copy; BEM UBSI BOGOR <?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- /#right-panel -->