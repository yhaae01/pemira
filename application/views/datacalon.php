    <div class="content pb-0">    
        <h1><i class="fa fa-users"> </i> DATA CALON</h1>
        <hr>
        <div class="row">
        <div class="col"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata" ><i class="fa fa-plus-circle"></i>&nbsp; Tambah</button></div>
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
            <thead style="text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Nama Calon</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Foto</th>
                    <th>Suara</th>
                    <th width="150"><button class="btn btn-danger btn-block btn-sm" data-toggle="modal" data-target="#truncate" >Kosongkan</button></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                    foreach($data->result_array() as $i):
                            $id=$i['id'];
                            $visi=$i['visi'];
                            $misi=$i['misi']; 
                            $namacalon=$i['namacalon']; 
                            $foto=$i['foto']; 
                            $totalsuara=$i['totalsuara'];        
                ?>
                <tr>
                    <td><?php echo "$no"?></td>
                    <td><?php echo ucwords($namacalon);?> </td>
                    <td><?php echo $visi;?> </td>
                    <td><?php echo $misi;?> </td>
                    <td><img src="<?php echo base_url('assets/img/calon/'.$foto)?>" width="64"> </td>
                    <td><?php echo $totalsuara;?> </td>
                    <td>
                        <!-- <a class="btn btn-outline-primary" data-toggle="modal" data-target="#editdata<?php echo $id;?>"  href=""><i class="fa fa-pencil"></i></a> -->
                        <a class="btn btn-outline-danger" href="<?php echo 'datacal/delete/'.$id=$i['id']; ?>"><i class="fa fa-trash-o"></i></a>
                        
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
                <h2><i class="fa fa-plus-circle"></i>&nbsp; Calon</h2>
            </div>

            <?php echo form_open_multipart('datacal/insert');?>
            <!-- <form action="datacal/insert" method="post"> -->
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="namacalon" name="namacalon" placeholder="Nama Calon"  class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Visi</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" id="visi" name="visi"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Misi</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" id="misi" name="misi"></textarea></div>
                </div>
                <div class="form-group">
                    <label for="name">Foto</label>
                    <input class="form-control-file" type="file" name="upfoto" id="upfoto" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <input type="submit" value="Tambah" class="btn btn-primary">
            </div>
            <!-- </form> -->
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!--Modal Edit-->
<?php
foreach($data->result_array() as $i):
    $id=$i['id'];
    $visi=$i['visi'];
    $misi=$i['misi']; 
    $namacalon=$i['namacalon']; 
    $foto=$i['foto']; 
    $totalsuara=$i['totalsuara'];  
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

            <?php echo form_open_multipart('datacal/edit/'.$id);?>
            
            <!-- <form action="<?php echo site_url('datacal/edit/'.$id);?>" method="post"> -->
            <div class="modal-body">

            <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="namacalon" name="namacalon" placeholder="Nama Calon"  class="form-control" value="<?php echo $namacalon; ?>"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Visi</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" id="visiedit" name="visi"><?php echo $visi ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Misi</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" id="misiedit" name="misi" ><?php echo $misi ?></textarea></div>
                </div>
                <div class="form-group">
                    <label for="name">Foto</label>
                    <input class="form-control-file" type="file" name="upfdoto" id="upfodto" />
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <input type="submit" value="Ubah" class="btn btn-primary">
            </div>
            <!-- </form> -->
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php endforeach;?>

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

<!--Modal truncate -->
<div class="modal fade" id="truncate" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Jika Anda menghapus semua data Calon maka pilihan siswa juga akan direset...<hr>Apakah anda yakin ingin menghapus semua data calon ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form  action="<?php echo base_url('datacal/hapussemua') ?>">
                    <input type="submit" class="btn btn-primary" value="Ya">
                </form>
            </div>
        </div>
    </div>
</div>
<br>

<script src="assets/js/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'visi' );
</script>
<script>
    CKEDITOR.replace( 'misi' );
</script>
<script>
    CKEDITOR.replace( 'visiedit' );
</script>
<script>
    CKEDITOR.replace( 'misiedit' );
</script>