    <div class="content pb-0">

        <h1><i class="fa fa-users"> </i> DATA PEMILIH</h1>
        <hr>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata" ><i class="fa fa-plus-circle"></i>&nbsp; Tambah</button> 
                <!-- <a href="<?= base_url('datapem/export') ?>" class="btn btn-success" ><i class="fa fa-print"></i>&nbsp; Export</a> -->
                <button class="btn btn-danger" data-toggle="modal" data-target="#truncate" ><i class="fa fa-trash"></i>&nbsp; Kosongkan</button>
            </div> 
    	</div>
        <hr>
        <?php if($this->session->flashdata('success_msg')){

            ?>
            <div class="alert alert-success"><center>
                <?= $this->session->flashdata('success_msg'); ?>                
            </center></div>
            <?php
        } ?>
        <?php if($this->session->flashdata('error_msg')){

            ?>
            <div class="alert alert-danger"><center>
                <?= $this->session->flashdata('error_msg'); ?>                
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
                    <th width="150">
                    Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    foreach($data->result_array() as $i):
                        $id=$i['id'];
                        $nis=$i['nis']; 
                        $namasiswa=$i['namasiswa']; 
                        $suara=$i['suara'];
                        $absen=$i['absen'];        
                ?>
                <tr>
                    <td style="text-align: center;"><?= "$no"?></td>
                    <td><?= $nis;?> </td>
                    <td><?= ucwords($namasiswa);?> </td>
                    <!-- <td><?= $kelas;?> </td> -->
                    <td style="text-align: center;"><?php
                        if ($absen=='0') {
                            ?>
                                <span class="badge badge-warning">Belum Absen</span>
                                <?php
                        }else{
                            ?>
                                <span class="badge badge-success">Telah Absen</span>
                            <?php
                        };
                    ?> </td>
                    <td style="text-align: center;"><?php
                        if ($suara=='0') {
                            ?>
                                <span class="badge badge-warning">Belum Memilih</span>
                                <?php
                        }else{
                            ?>
                                <span class="badge badge-success">Telah Memilih</span>
                            <?php
                        };
                    ?> </td>
                    <td>
                        <a class="btn btn-outline-success" data-toggle="modal" data-target="#editdata<?= $id;?>"  href=""><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-outline-primary" href="datapem/edita/<?= $id;?>" title="Absen" href=""><i class="fa fa-check"></i></a>
                        <a class="btn btn-outline-secondary" href="datapem/editbatal/<?= $id;?>" title="Batal Absen"  href=""><i class="fa fa-times"></i></a>
                        <a class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Reset Pilihan" href="<?=  base_url('index.php/datapem/resetpilihan/'.$id);?>"><i class="fa fa-undo"></i></a>
                        <a class="btn btn-outline-danger" data-toggle="modal" data-target="#delete<?= $i['id']; ?>" href=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <!--Modal delete -->
                <div class="modal fade" id="delete<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Konfirmasi<hr>
                                Apakah anda ingin hapus mahasiswa <b><?= ucwords($namasiswa);?></b> ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <form  action="<?= base_url('datapem/delete/'.$id);?>">
                                    <input type="submit" class="btn btn-primary" value="Ya">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal delete -->
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
                            <input type="text" id="nis" name="nis" placeholder="NIM . . ." autocomplete="no" required class="form-control">
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
                            <input type="text" id="nama" name="nama" placeholder="Nama . . ." autocomplete="no" class="form-control">
                        </div>
                    </div>
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
<div class="modal fade" id="editdata<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h2><i class="fa fa-pencil"></i>&nbsp; Pemilih</h2>
            </div>

            <form action="<?=  base_url('index.php/datapem/edit/'.$id);?>" method="post">
                <div class="modal-body">

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">NIS</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nis" name="nis" placeholder="NIS . . ."  class="form-control" readonly value="<?= $nis; ?>"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Passowrd</label></div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password" name="password" placeholder="NIS . . ."  readonly class="form-control" value="<?= $password; ?>"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama Pemilih</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nama" name="nama" placeholder="Nama . . ."  class="form-control" value="<?= $namasiswa; ?>"></div>
                    </div>
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

<!--Modal truncate -->
<div class="modal fade" id="truncate" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticModalLabel">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <p>Jika Anda menghapus semua data pemilih maka hasil pemilihan juga akan direset... </p> 
                    <p>Apakah anda yakin ingin menghapus semua data pemilih ?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form  action="<?= base_url('index.php/datapem/hapussemua') ?>">
                    <input type="submit" class="btn btn-primary" value="Ya">
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal truncate -->
<br>