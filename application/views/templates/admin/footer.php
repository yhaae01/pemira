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

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script type="text/javascript" src="assets/datatable/js/jquery.js"></script>
    <script type="text/javascript" src="assets/datatable/js/jquery.dataTables.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dataku').DataTable();
        });
    </script>

    </body>

    </html>