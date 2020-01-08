
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <?= $this->session->flashdata('msg') ?>
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Daftar Pengguna</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Tambah Pengguna
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">

                                <?= form_open("admin") ?>

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Pegawai</h4>
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
                                            <input type="text" name="nip" class="form-control" placeholder="NIP">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                            </div>
                                            <select name="jabatan" id="" class="custom-select">
                                                <option selected disabled>Pilih Jabatan</option>
                                                <?php foreach ($jab as $k) { ?>
                                                    <option value="<?= $k->id_jabatan ?>"><?= $k->nama_jabatan ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list"></i>
                                                </span>
                                            </div>
                                            <select name="unit" id="" class="custom-select">
                                                <option selected disabled>Pilih unit</option>
                                                <?php foreach ($unit as $k) { ?>
                                                    <option value="<?= $k->id_unit ?>"><?= $k->nama_unit ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="no" class="form-control" placeholder="Nomor HP">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <select name="role" class="custom-select">
                                                <option disabled selected>Pilih Role</option>
                                                <?php foreach ($role as $k) { ?>
                                                    <option value="<?= $k->id_role ?>"><?= $k->nama_role ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Tambah Pegawai" name="simpan">
                                    </div>
                                </div>

                                <?= form_close() ?>

                            </div>
                        </div>

                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Jabatan</th>
                                        <th>Unit</th>
                                        <th>Role</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pegawai as $k) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url('assets/') ?>dist/img/avatar3.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            <?= $k->nama ?>
                                        </td>
                                        <td>
                                            <?= $k->nip ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_jabatan ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_unit ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_role ?>
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modal-<?= $k->nip ?>" class="btn btn-sm btn-warning text-white">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <div class="modal fade" id="modal-<?= $k->nip ?>">
                                                <div class="modal-dialog">

                                                    <?= form_open("admin/edit") ?>

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
                                                                <input type="text" name="nip" class="form-control" value="<?= $k->nip ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-user"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="nama" class="form-control" value="<?= $k->nama ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-users"></i>
                                                                    </span>
                                                                </div>
                                                                <select name="jabatan" id="" class="custom-select">
                                                                    <?php foreach ($jab as $c) { ?>
                                                                        <option <?php if($k->jabatan == $c->id_jabatan) { echo "selected"; } ?> value="<?= $c->id_jabatan ?>"><?= $c->nama_jabatan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-list"></i>
                                                                    </span>
                                                                </div>
                                                                <select name="unit" id="" class="custom-select">
                                                                    <option selected disabled>Pilih unit</option>
                                                                    <?php foreach ($unit as $d) { ?>
                                                                        <option <?php if($k->unit == $d->id_unit) { echo "selected"; } ?> value="<?= $d->id_unit ?>"><?= $d->nama_unit ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-phone"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="no" class="form-control" value="<?= $k->no ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="email" name="email" class="form-control" value="<?= $k->email ?>">
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                                <select name="role" class="custom-select">
                                                                    <?php foreach ($role as $e) { ?>
                                                                        <option <?php if($k->id_role == $e->id_role) { echo "selected"; } ?> value="<?= $e->id_role ?>"><?= $e->nama_role ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-primary" value="Simpan Perubahan" name="simpan">
                                                        </div>
                                                    </div>
                                                </div>

                                                    <?= form_close() ?>

                                                </div>
                                            </div>
                                            <a href="<?= site_url('admin/delete/'.$k->nip) ?>" class="btn btn-sm btn-danger text-white">
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
