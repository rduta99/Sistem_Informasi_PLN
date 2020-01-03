
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="http://adminlte.io">Lebah Gantengs</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Engineering PLN KIT SBS</b>
            </div>
        </footer>


        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>


    <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>    

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

    <script src="<?= base_url('assets/') ?>plugins/select2/js/select2.full.min.js"></script>
    
    <script src="<?= base_url('assets/') ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

    <script src="<?= base_url("assets/") ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable();

            $('.textarea').summernote();

            $('.select2').select2({
                theme: 'bootstrap4'
            });
        });

        function add_eq() {
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('admin/tools_list'); ?>',
                async : false,
                dataType : 'json',
                success : function(data) {
                    var html = '<div class="col-md-6"><div class="card"><div class="card-body"><select name="teknologi[]" class="form-control select2" style="width: 100%;">';
                    for (let index = 0; index < data.length; index++) {
                        html += '<option value="'+data[index].id_tools+'">'
                                +data[index].nama_teknologi
                                +' | '+data[index].merk
                                +'</option>';
                    }
                    html += '</select><div class="form-group mb-2 mt-2"><input class="form-control" name="angka[]" placeholder="Angka Indikasi"></div>';
                    html += '<div class="form-group mb-2"><select name="kondisi[]" class="custom-select">';
                    html += '<option selected disabled>Pilih Kondisi</option><option value="1">Good</option><option value="2">Warning</option><option value="3">Bad</option>'
                    html += '</select></div></div></div></div>';
                    $('#tools').append(html);
                    $('.select2').select2({
                        theme: 'bootstrap4'
                    });
                }
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('#blah').attr('class', 'img-thumbnail mb-3');
                    $('#blah').css('display', 'block');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#foto_bukti").change(function() {
            readURL(this);
        });
        
    </script>
</body>
</html>
