
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor') ?>">Home</a></li>
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
                            <h3 class="card-title">Daftar Personel</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tool_reg">
                                    <i class="fas fa-plus"></i> Personel Register
                                </button>
                                <div class="modal fade" id="tool_reg">
                                    <div class="modal-dialog">

                                        <?= form_open("supervisor/personel") ?>

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Register Personel</h4>
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
                                                            <i class="fas fa-pen"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>

                                                
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-toolbox"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <select name="jabatan" class="custom-select">
                                                        <option disabled selected>Jabatan</option>
                                                        <?php foreach ($jabatan as $l) { ?>
                                                            <option value="<?= $l->id_jabatan ?>"><?= $l->nama_jabatan ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <select name="unit" class="custom-select">
                                                        <option disabled selected>Pilih Unit</option>
                                                        <?php foreach ($unit as $c) { ?>
                                                            <option value="<?= $c->id_unit ?>"><?= $c->nama_unit ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-toolbox"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="no" class="form-control" placeholder="Nomor HP">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-toolbox"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Simpan Perubahan" name="simpan_personel">
                                            </div>
                                        </div>

                                        <?= form_close() ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <th>NIP</th>
                                        <th>ID Pegawai</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Unit</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Sertifikasi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($personel as $k) { ?>
                                    <tr>
                                        <td>
                                            <?= $k->nip ?>
                                        </td>
                                        <td>
                                            <?= $k->id_pegawai ?>
                                        </td>
                                        <td>
                                            <?= $k->nama ?>
                                        </td>
                                        <td>
                                            <?= $k->jabatan ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_unit ?>
                                        </td>
                                        <td>
                                            <?= $k->no ?>
                                        </td>
                                        <td>
                                            <?= $k->email ?>
                                        </td>
                                        <td>
                                            <?= $k->sertifikasi ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#modal-<?= $k->nip ?>">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <div class="modal fade" id="modal-<?= $k->nip ?>">
                                                <div class="modal-dialog">

                                                    <?= form_open("supervisor/personel_edit") ?>

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Personel</h4>
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
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="id_pegawai" class="form-control" value="<?= $k->id_pegawai ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-toolbox"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="nama" class="form-control" value="<?= $k->nama ?>">
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                                <select name="jabatan" class="custom-select">
                                                                    <option disabled selected>Jabatan</option>
                                                                    <?php foreach ($jabatan as $l) { ?>
                                                                        <option <?php if($k->jabatan == $l->id_jabatan) echo "selected" ?> value="<?= $l->id_jabatan ?>"><?= $l->nama_jabatan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-envelope"></i>
                                                                    </span>
                                                                </div>
                                                                <select name="unit" class="custom-select">
                                                                    <option disabled selected>Pilih Unit</option>
                                                                    <?php foreach ($unit as $c) { ?>
                                                                        <option <?php if($k->unit == $c->id_unit) echo "selected" ?> value="<?= $c->id_unit ?>"><?= $c->nama_unit ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-toolbox"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="no" class="form-control" value="<?= $k->no ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-toolbox"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="email" name="email" class="form-control" value="<?= $k->email ?>">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-primary" value="Simpan Perubahan" name="personel_edit">
                                                        </div>
                                                    </div>

                                                    <?= form_close() ?>

                                                </div>
                                            </div>
                                            <a href="<?= site_url('supervisor/delete_personel/'.$k->nip) ?>"class="btn btn-sm btn-danger text-white">
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
