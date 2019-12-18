
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
                            <h3 class="card-title">Daftar Tools</h3>
                            <div class="card-tools">
                                

                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#tool_reg">
                                    <i class="fas fa-plus"></i> Tool Register
                                </button>
                            </div>
                        </div>

                        <!--  -->

                        <div class="modal fade" id="tool_reg">
                            <div class="modal-dialog">

                                <?= form_open("supervisor/tools") ?>

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tool Register</h4>
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
                                            <input type="text" name="tools_id" class="form-control" placeholder="Tools ID">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                            </div>
                                            <select name="teknologi" class="custom-select">
                                                <option disabled selected>Jenis Teknologi</option>
                                                <?php foreach ($teknologi as $k) { ?>
                                                    <option value="<?= $k->id_teknologi ?>"><?= $k->nama_teknologi ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="merk" class="form-control" placeholder="Merk">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="type" class="form-control" placeholder="Type">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                            </div>
                                            <select name="unit" class="custom-select">
                                                <option disabled selected>Pilih unit</option>
                                                <?php foreach ($unit as $k) { ?>
                                                    <option value="<?= $k->id_unit ?>"><?= $k->nama_unit ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" name="tgl_kalibrasi" class="form-control" placeholder="Tanggal Kalibrasi">
                                        </div>
                                                                                
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Tambah Tools" name="simpan_tool">
                                    </div>
                                </div>

                                <?= form_close() ?>

                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Tools ID</th>
                                        <th>Type</th>
                                        <th>Merk</th>
                                        <th>Unit</th>
                                        <th>Teknologi</th>
                                        <th>Tanggal Kalibrasi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($tools as $k) { ?>
                                    <tr>
                                        <td>
                                            <?= $k->id_tools ?>
                                        </td>
                                        <td>
                                            <?= $k->type ?>
                                        </td>
                                        <td>
                                            <?= $k->merk ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_unit ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_teknologi ?>
                                        </td>
                                        <td>
                                            <?= $k->tgl_kalibrasi ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#modal-<?= $k->id_tools ?>">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <div class="modal fade" id="modal-<?= $k->id_tools ?>">
                                                <div class="modal-dialog">

                                                    <?= form_open("supervisor/tools_edit") ?>

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Tools</h4>
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
                                                                <input type="text" name="id_tools" class="form-control" value="<?= $k->id_tools ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="type" class="form-control" value="<?= $k->type ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-toolbox"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="merk" class="form-control" value="<?= $k->merk ?>">
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
                                                                <input type="text" name="teknologi" class="form-control" value="<?= $k->teknologi ?>">
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-toolbox"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="tgl_kalibrasi" class="form-control" value="<?= $k->tgl_kalibrasi ?>">
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-primary" value="Simpan Perubahan" name="simpan">
                                                        </div>
                                                    </div>

                                                    <?= form_close() ?>

                                                </div>
                                            </div>
                                            <a href="<?= site_url('supervisor/delete_tools/'.$k->id_tools) ?>"class="btn btn-sm btn-danger text-white">
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
