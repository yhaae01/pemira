    <div class="content pb-0">

        <h1><i class="fa fa-users"> </i> DATA Mahasiswa</h1>
        <hr>
        <div class="row">
            <div class="col">
                <?= form_error('nim', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('nama_mahasiswa', '<div class="alert alert-danger">', '</div>'); ?>
                <?= form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>

                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus-circle"></i>&nbsp; Tambah</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#truncate"><i class="fa fa-trash"></i>&nbsp; Kosongkan</button>
                <button class="btn btn-success" data-toggle="modal" data-target="#absen"><i class="fa fa-check"></i>&nbsp; Absen</button>
                <button class="btn btn-secondary" data-toggle="modal" data-target="#batalabsen"><i class="fa fa-times"></i>&nbsp; Batal Absen</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#resetpilihan"><i class="fa fa-undo"></i>&nbsp; Reset Pilihan</button>
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
            <table id="mytable" class="table table-striped table-bordered dataku">
                <thead style="text-align:center">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Absen</th>
                        <th>Suara</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <!-- Modal tambah -->
        <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h2><i class="fa fa-plus-circle"></i>&nbsp; Mahasiswa</h2>
                    </div>

                    <form action="<?= base_url("DataMahasiswa"); ?>" method="post">
                        <div class="modal-body">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">NIM</label></div>
                                <div class="col-12">
                                    <input type="text" id="nim" name="nim" placeholder="NIM . . ." maxlength="8" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Password</label></div>
                                <div class="col-12">
                                    <input type="password" id="password" name="password" placeholder="Password . . ." maxlength="8" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama Mahasiswa</label></div>
                                <div class="col-12">
                                    <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama . . ." autocomplete="no" class="form-control">
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

        <div class="clearfix"></div>

        <!--Modal truncate -->
        <div class="modal fade" id="truncate" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticModalLabel">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        <p>Jika Anda menghapus semua data Mahasiswa maka hasil Pemilihan juga akan direset... </p>
                        <p>Apakah anda yakin ingin menghapus semua data Mahasiswa ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <form action="<?= base_url('index.php/DataMahasiswa/hapussemua') ?>">
                            <input type="submit" class="btn btn-primary" value="Ya">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal truncate -->

        <!-- Modal absen -->
        <div class="modal fade" id="absen" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticModalLabel">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin absen semua data Mahasiswa ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <form action="<?= base_url('DataMahasiswa/absen') ?>">
                            <input type="submit" class="btn btn-primary" value="Ya">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal absen -->

        <!--Modal batal absen -->
        <div class="modal fade" id="batalabsen" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticModalLabel">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin batal absen semua data Mahasiswa ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <form action="<?= base_url('DataMahasiswa/batalabsen') ?>">
                            <input type="submit" class="btn btn-primary" value="Ya">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal batal absen -->

        <!--Modal reset pilihan -->
        <div class="modal fade" id="resetpilihan" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticModalLabel">Konfirmasi</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin reset pilihan semua data Mahasiswa ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <form action="<?= base_url('DataMahasiswa/resetpilihan') ?>">
                            <input type="submit" class="btn btn-primary" value="Ya">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal reset pilihan -->