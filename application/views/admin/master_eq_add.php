
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Tambah Equipment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Equipment</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <?= form_open('admin/master_eq_add') ?>
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
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="kks_number" class="form-control" placeholder="KKS Number">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-toolbox"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="desk" class="form-control" placeholder="Nama Equipment">
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

                                <div class="form-group">
                                    <label for="">Spesifikasi A</label>
                                    <textarea name="spek_a" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Spesifikasi B</label>
                                    <textarea name="spek_b" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Spesifikasi C</label>
                                    <textarea name="spek_c" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Spesifikasi D</label>
                                    <textarea name="spek_d" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                                <input type="submit" value="Tambah Equipment" class="btn btn-md btn-primary" name="simpan">
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </section>