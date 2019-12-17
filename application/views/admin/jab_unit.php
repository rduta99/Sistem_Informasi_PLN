
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Jabatan & Unit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Jabatan & Unit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->session->flashdata('msg') ?>
            <div class="row">

                <div class="col-md-6">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Daftar Jabatan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-jabatan">
                                            <i class="fas fa-plus"></i> Tambah Jabatan
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-jabatan">
                                    <div class="modal-dialog">

                                        <?= form_open("admin/jab_unit") ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Jabatan</h4>
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
                                                    <input type="text" name="id_jabatan" class="form-control" placeholder="ID Jabatan">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Tambah Jabatan" name="jabatan">
                                            </div>
                                        </div>

                                        <?= form_close() ?>

                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Nama Jabatan</th>
                                                <th>ID Jabatan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($jabatan as $k) { ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('assets/') ?>dist/img/avatar3.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                    <?= $k->nama_jabatan?>
                                                </td>
                                                <td>
                                                    <?= $k->id_jabatan ?>
                                                </td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#modal-<?= $k->id_jabatan ?>" class="btn btn-sm btn-warning text-white">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <div class="modal fade" id="modal-<?= $k->id_jabatan ?>">
                                                        <div class="modal-dialog">

                                                            <?= form_open("admin/jab_edit") ?>

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Pegawai</h4>
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
                                                                        <input type="text" name="id_jabatan" class="form-control" value="<?= $k->id_jabatan ?>">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-lock"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" name="nama_jabatan" class="form-control" value="<?= $k->nama_jabatan ?>">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" value="Ubah Jabatan" name="jabatan">
                                                                </div>
                                                            </div>

                                                            <?= form_close() ?>

                                                        </div>
                                                    </div>
                                                    <a href="<?= site_url('admin/jab_del/'.$k->id_jabatan) ?>" class="btn btn-sm btn-danger text-white">
                                                        <i class="fas fa-trash"></i>
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
                </div>

                <div class="col-md-6">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Daftar Unit</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-unit">
                                            <i class="fas fa-plus"></i> Tambah Unit
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="modal-unit">
                                    <div class="modal-dialog">

                                        <?= form_open("admin/jab_unit") ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Unit</h4>
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
                                                    <input type="text" name="id_unit" class="form-control" placeholder="ID Unit">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit">
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Tambah Unit" name="unit">
                                            </div>
                                        </div>

                                        <?= form_close() ?>

                                    </div>
                                </div>

                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Nama Unit</th>
                                                <th>ID Unit</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($unit as $k) { ?>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('assets/') ?>dist/img/avatar3.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                    <?= $k->nama_unit?>
                                                </td>
                                                <td>
                                                    <?= $k->id_unit ?>
                                                </td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#modal-unit<?= $k->id_unit ?>" class="btn btn-sm btn-warning text-white">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <div class="modal fade" id="modal-unit<?= $k->id_unit ?>">
                                                        <div class="modal-dialog">

                                                            <?= form_open("admin/unit_edit") ?>

                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Unit</h4>
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
                                                                        <input type="text" name="id_unit" class="form-control" value="<?= $k->id_unit ?>">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-lock"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" name="nama_unit" class="form-control" value="<?= $k->nama_unit ?>">
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                    <input type="submit" class="btn btn-primary" value="Ubah Unit" name="unit_edit">
                                                                </div>
                                                            </div>

                                                            <?= form_close() ?>

                                                        </div>
                                                    </div>
                                                    <a href="<?= site_url('admin/jab_del/'.$k->id_unit) ?>" class="btn btn-sm btn-danger text-white">
                                                        <i class="fas fa-trash"></i>
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
                </div>

            </div>
