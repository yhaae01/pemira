        <div class="content pb-0">

        <h1><i class="fa fa-users"> </i> DATA PENGAWAS</h1>
        <hr>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata" ><i class="fa fa-plus-circle"></i>&nbsp; Tambah</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#truncate"><i class="fa fa-trash"></i>&nbsp; Kosongkan</button>
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
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Pengawas</th>
                    <th width="150">
                    Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    foreach($data->result_array() as $i):
                        $id=$i['id'];
                            $username=$i['username'];
                            $namapengawas=$i['namapengawas'];    
                ?>
                <tr>
                    <td><?= "$no"?></td>
                    <td><?= ucwords($username);?> </td>
                    <td><?= ucwords($namapengawas);?> </td>
                    <td>
                        <a class="btn btn-outline-primary" data-toggle="modal" data-target="#editdata<?= $id;?>"  href=""><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-outline-danger" data-toggle="modal" data-target="#delete<?= $i['id']; ?>" href=""><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <!--Modal delete -->
                <div class="modal fade" id="delete<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Konfirmasi<hr>
                                Apakah anda ingin hapus pengawas <b><?= ucwords($namapengawas);?></b> ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <form  action="<?= base_url('datapeng/delete/'.$id);?>">
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
                <h2><i class="fa fa-plus-circle"></i>&nbsp; Pengawas</h2>
            </div>

            <form action="datapeng/insert" method="post">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">NIM</label></div>
                        <div class="col-12">
                            <input type="text" id="nis" name="username" placeholder="NIM . . ." required class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Password</label></div>
                        <div class="col-12">
                            <input type="password" id="password" name="password" placeholder="Password . . ."  class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama</label></div>
                        <div class="col-12">
                            <input type="text" id="namapengawas" name="namapengawas" placeholder="Nama . . ." class="form-control">
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
    $username=$i['username']; 
    $password=$i['password'];
    $namapengawas=$i['namapengawas']; 

?>
<div class="modal fade" id="editdata<?= $id;?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h2><i class="fa fa-pencil"></i>&nbsp; Pengawas</h2>
            </div>

            <form action="<?=  base_url('datapeng/edit/'.$id);?>" method="post">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Username
                        </label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nis" name="username" placeholder="NIS. . ."  class="form-control"  value="<?= $username; ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Passowrd</label></div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password" name="password" placeholder="Password. . ."  class="form-control" value="<?= $password; ?>">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama Pengawas</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="namapengawas" name="namapengawas" placeholder="Nama . . ."  class="form-control" value="<?= $namapengawas; ?>">
                        </div>
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
                    <p>Apakah anda yakin ingin menghapus semua data pengawas ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <form  action="<?= base_url('datapeng/hapussemua') ?>">
                        <input type="submit" class="btn btn-primary" value="Ya">
                    </form>
            </div>
        </div>
    </div>
</div>
<br>