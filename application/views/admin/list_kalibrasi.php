
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

                                        <?= form_open("admin/master_to") ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Tools</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-pen"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="id_tools" class="form-control" placeholder="ID Tools">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="type" class="form-control" placeholder="Type">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-toolbox"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="merk" class="form-control" placeholder="Merk">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <select name="unit" class="custom-select">
                                                        <option disabled selected>Pilih Unit</option>
                                                        <?php foreach ($unit as $k) { ?>
                                                            <option value="<?= $k->id_unit ?>"><?= $k->nama_unit ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <select name="teknologi" class="custom-select">
                                                        <option disabled selected>Pilih Teknologi</option>
                                                        <?php foreach ($teknologi as $d) { ?>
                                                            <option value="<?= $d->id_teknologi ?>"><?= $d->nama_teknologi ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="date" name="tgl_kalibrasi" class="form-control">
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
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                List Analisis
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Equipment</td>
                                        <td>Asset ID</td>
                                        <td>KKS Number</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php 
                                    
                                    $no = 0; foreach ($analisis as $k) { 
                                    
                                    ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $k->desk ?></td>
                                        <td><?= $k->asset_id ?></td>
                                        <td><?= $k->kks_number ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/detail_analisis/'.$k->id_log) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
