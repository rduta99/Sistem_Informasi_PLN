
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
                            <h3 class="card-title">Daftar Equipment</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#eq_reg">
                                    <i class="fas fa-plus"></i> Equipment Register
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="eq_reg">
                            <div class="modal-dialog">

                                <?= form_open("supervisor") ?>

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Equipment Register</h4>
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
                                            <input type="text" name="asset_id" class="form-control" placeholder="Asset ID">
                                        </div>
                                        
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="kks_number" class="form-control" placeholder="KKS Number">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="unit" class="form-control" placeholder="ID Unit">
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="desk" class="form-control" placeholder="Description">
                                        </div>
                                                                           
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Tambah Equipment" name="simpan">
                                    </div>
                                </div>

                                <?= form_close() ?>

                            </div>
                        </div>

                        

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Asset ID</th>
                                        <th>KKS Number</th>
                                        <th>Unit</th>
                                        <th>Description</th>
                                        
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data_barang as $k) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url('assets/') ?>dist/img/avatar3.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            <?= $k->asset_id ?>
                                        </td>
                                        <td>
                                            <?= $k->kks_number ?>
                                        </td>
                                        <td>
                                            <?= $k->nama_unit ?>
                                        </td>
                                        <td>
                                            <?= $k->desk ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-warning text-white" data-toggle="modal" data-target="#modal-<?= $k->asset_id ?>">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <div class="modal fade" id="modal-<?= $k->asset_id ?>">
                                                <div class="modal-dialog">

                                                    <?= form_open("supervisor/eq_edit") ?>

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Equipment</h4>
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
                                                                <input type="text" name="asset_id" class="form-control" value="<?= $k->asset_id ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="kks_number" class="form-control" value="<?= $k->kks_number ?>">
                                                            </div>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-toolbox"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" name="desk" class="form-control" value="<?= $k->desk ?>">
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
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-primary" value="Simpan Perubahan" name="simpan">
                                                        </div>
                                                    </div>

                                                    <?= form_close() ?>

                                                </div>
                                            </div>
                                            <a href="<?= site_url('supervisor/delete_eq/'.$k->asset_id) ?>" class="btn btn-sm btn-danger text-white">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </section>
