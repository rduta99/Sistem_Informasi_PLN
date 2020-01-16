
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">List Sertifikasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('personel/sertifikasi') ?>">Home</a></li>
                                <!-- <li class="breadcrumb-item active">List Sertifikasi</li> -->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Upload Sertifikat
                                </button>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">

                                        <?= form_open_multipart("personel/upload_sertifikasi", [], ['id' => $this->uri->segment(3)]) ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Upload File Sertifikasi (.pdf file)</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file_pdf" id="foto_bukti">
                                                        <label class="custom-file-label" for="foto_bukti">File Sertifikasi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Tambah Sertifikasi" name="simpan_tool">
                                            </div>
                                        </div>

                                        <?= form_close() ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                List Sertifikasi
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal Sertifikasi</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $no = 0; foreach ($list_sertifikasi as $k) { 
                                    
                                    ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= date('d M Y', strtotime($k->tgl_sertif)) ?></td>
                                        <td>
                                            <a href="<?= site_url('personel/detail_sertifikasi/'.$k->id_sertif) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-download"></i> Download
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
