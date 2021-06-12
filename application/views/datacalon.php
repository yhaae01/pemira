    <div class="content pb-0">
        <h1><i class="fa fa-users"> </i> DATA CALON</h1>
        <hr>
        <div class="row">
            <div class="col">
                <?= form_error('nim', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('namacalon', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('jurusan', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('asalkampus', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('riwayat', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('proker', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('visi', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('misi', '<div class="alert alert-danger">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus-circle"></i>&nbsp; Tambah</button>
            </div>
        </div>
        <hr>
        <?php if ($this->session->flashdata('success_msg')) {
        ?>
            <div class="alert alert-success">
                <center>
                    <?= $this->session->flashdata('success_msg'); ?>
                </center>
            </div>
        <?php
        } ?>
        <?php if ($this->session->flashdata('error_msg')) {
        ?>
            <div class="alert alert-danger">
                <center>
                    <?= $this->session->flashdata('error_msg'); ?>
                </center>
            </div>
        <?php
        } ?>
        <div class="clearfix">
            <table class="table table-striped table-bordered dataku">
                <thead style="text-align: center;">
                    <tr>
                        <th>No</th>
                        <th>Nama Calon</th>
                        <th>Foto</th>
                        <th>Suara</th>
                        <th width="150">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data->result_array() as $i) :
                        $id         = $i['id'];
                        $nim        = $i['nim'];
                        $namacalon  = $i['namacalon'];
                        $jurusan    = $i['jurusan'];
                        $asalkampus = $i['asalkampus'];
                        $riwayat    = $i['riwayat'];
                        $proker     = $i['proker'];
                        $visi       = $i['visi'];
                        $misi       = $i['misi'];
                        $foto       = $i['foto'];
                        $totalsuara = $i['totalsuara'];
                    ?>
                        <tr>
                            <td style="text-align: center;"><?= "$no" ?></td>
                            <td><?= ucwords($namacalon); ?> </td>
                            <td style="text-align: center;"><img src="<?= base_url('assets/img/calon/' . $foto) ?>" width="64"> </td>
                            <td style="text-align: center;"><?= $totalsuara; ?> </td>
                            <td style="text-align: center;">
                                <!-- <a class="badge badge-success" data-toggle="modal" data-target="#editdata<?= $id; ?>" href=""><i class="fa fa-pencil"></i> Ubah</a> -->
                                <a class="badge badge-danger" data-toggle="modal" data-target="#delete<?= $i['id']; ?>" href=""><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <!--Modal delete -->
                        <div class="modal fade" id="delete<?= $i['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticModalLabel">Konfirmasi
                                            <hr>
                                            Apakah anda ingin hapus calon <b><?= ucwords($namacalon); ?></b> ?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                        <form action="<?= base_url('DataCalon/delete/') . $i['id'] ?>">
                                            <input type="submit" class="btn btn-primary" value="Ya">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal delete -->

                        <!--Modal Edit-->
                        <div class="modal fade" id="editdata<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="smallmodalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h2><i class="fa fa-pencil"></i>&nbsp; Data Calon</h2>
                                    </div>

                                    <div class="modal-body">
                                        <?= form_open_multipart('DataCalon/edit/' . $id); ?>
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">NIM</label></b></div>
                                            <div class="col-12">
                                                <input type="number" id="nim" name="nim" placeholder="NIM . . ." class="form-control" maxlength="8" value="<?= $nim; ?>">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Nama</label></b></div>
                                            <div class="col-12">
                                                <input type="text" id="namacalon" name="namacalon" placeholder="Nama Calon" class="form-control" value="<?= $namacalon; ?>">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Jurusan</label></b></div>
                                            <div class="col-12">
                                                <input type="text" id="jurusan" name="jurusan" placeholder="Jurusan . . ." class="form-control" value="<?= $jurusan; ?>">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Asal Kampus</label></b></div>
                                            <div class="col-12">
                                                <input type="text" id="asalkampus" name="asalkampus" placeholder="Asal Kampus . . ." class="form-control" value="<?= $asalkampus; ?>">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Riwayat Organisasi</label></b></div>
                                            <div class="col-12">
                                                <textarea class="form-control" id="riwayatedit" name="riwayat" rows="6" cols="50"><?= $riwayat ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-4"><b><label for="disabled-input" class=" form-control-label">Program Kerja Unggulan</label></b></div>
                                            <div class="col-12">
                                                <textarea class="form-control" id="prokeredit" name="proker" rows="6" cols="50"><?= $proker ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Visi</label></b></div>
                                            <div class="col-12">
                                                <textarea class="form-control" id="visiedit" name="visi" rows="6" cols="50"><?= $visi ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Misi</label></b></div>
                                            <div class="col-12">
                                                <textarea class="form-control" id="misiedit" name="misi" rows="6" cols="50"><?= $misi ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <b><label for="name">Foto</label></b>
                                            </div>
                                            <div class="col-12">
                                                <div class="custom-file">
                                                    <input class="custom-file-input" type="file" name="upfoto" id="upfoto" />
                                                    <label class="custom-file-label">Pilih gambar...</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <input type="submit" value="Ubah" class="btn btn-primary">
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->
                    <?php $no++;
                    endforeach; ?>
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
                        <h2><i class="fa fa-plus-circle"></i>&nbsp; Data Calon</h2>
                    </div>

                    <?= form_open_multipart('DataCalon'); ?>
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">NIM</label></b></div>
                            <div class="col-12">
                                <input type="text" id="nim" name="nim" placeholder="NIM . . ." class="form-control" maxlength="8">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Nama</label></b></div>
                            <div class="col-12">
                                <input type="text" id="namacalon" name="namacalon" placeholder="Nama Calon . . ." class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Jurusan</label></b></div>
                            <div class="col-12">
                                <input type="text" id="jurusan" name="jurusan" placeholder="Jurusan . . ." class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Asal Kampus</label></b></div>
                            <div class="col-12">
                                <input type="text" id="asalkampus" name="asalkampus" placeholder="Asal Kampus . . ." class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Riwayat Organisasi</label></b></div>
                            <div class="col-12">
                                <textarea class="form-control" id="editor1" name="riwayat" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-4"><b><label for="disabled-input" class=" form-control-label">Program Kerja Unggulan</label></b></div>
                            <div class="col-12">
                                <textarea class="form-control" id="editor2" name="proker" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Visi</label></b></div>
                            <div class="col-12">
                                <textarea class="form-control" id="visi" name="visi" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><b><label for="disabled-input" class=" form-control-label">Misi</label></b></div>
                            <div class="col-12">
                                <textarea class="form-control" id="misi" name="misi" rows="10" cols="80"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <b><label for="name">Foto</label></b>
                            </div>
                            <div class="col-12">
                                <div class="custom-file">
                                    <input class="custom-file-input" type="file" name="upfoto" id="upfoto" />
                                    <label class="custom-file-label">Pilih gambar...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" value="Tambah" class="btn btn-primary">
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>

        <script type="text/javascript">
            CKEDITOR.replace('editor1');
            CKEDITOR.replace('editor2');
            CKEDITOR.replace('visi');
            CKEDITOR.replace('misi');
            CKEDITOR.replace('visiedit');
            CKEDITOR.replace('misiedit');
            CKEDITOR.replace('riwayatedit');
            CKEDITOR.replace('prokeredit');
        </script>