
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tools Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/tools') ?>">Tools</a></li>
                                <li class="breadcrumb-item active">Detail Tools</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                Detail Tools
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Upload Kalibrasi
                                </button>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">

                                        <?= form_open_multipart("admin/upload_kalibrasi", [], ['id' => $this->uri->segment(3)]) ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Upload File Kalibrasi (.pdf file)</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="file_pdf" id="foto_bukti">
                                                        <label class="custom-file-label" for="foto_bukti">File Kalibrasi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Tambah Equipment" name="simpan_tool">
                                            </div>
                                        </div>

                                        <?= form_close() ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Type Tools</label>
                                        <input type="text" name="" class="form-control" value="<?= $tools->type ?>" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Merk Tools</label>
                                        <input type="text" name="" class="form-control" value="<?= $tools->merk ?>" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                List Kalibrasi
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal Kalibrasi</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $no = 0; foreach ($list_kalibrasi as $k) { 
                                    
                                    ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= date('d M Y', strtotime($k->tgl)) ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/detail_kalibrasi/'.$k->id_kalibrasi) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Detail
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
