
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.2-pre
            </div>
        </footer>


        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>


    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

    
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/sparklines/sparkline.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>

    <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script>

    <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

        function add_eq() {
            $('#tools').append('<div class="col-md-4"><div class="card"><div class="card-body"></div></div></div>');
        }

        $('.select2').select2();
    </script>
</body>
</html>
