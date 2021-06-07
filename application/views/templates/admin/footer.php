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

    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/datatables.min.js"></script>

    <script src="<?= base_url(); ?>assets/datatable/js/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/datatable/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dataku').DataTable();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#mytable').DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": {
                    url: "<?php echo base_url("DataMahasiswa/json") ?>",
                    type: 'post',
                    dataType: 'json'
                },
                "columns": [{
                        data: "id"
                    },
                    {
                        data: "nim"
                    },
                    {
                        data: "nama_mahasiswa"
                    },
                    {
                        data: "absen"
                    },
                    {
                        data: "suara"
                    }
                ]
            });
        });
    </script>

    </body>

    </html>