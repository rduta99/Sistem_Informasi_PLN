
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Ukur Equipment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Ukur Equipment</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <?= form_open_multipart('admin/his_pengukuran'); ?>

                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select name="equipment" class="form-control select2" style="width: 100%;">
                                                <option selected disabled>Pilih Equipment</option>
                                                <?php foreach ($equipment as $c) { ?>
                                                    <option value="<?= $c->asset_id ?>"><?= $c->desk ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button onclick="add_eq()" type="button" class="btn btn-md btn-primary w-100">Tambah Tools</button>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="p-3">
                                                <img src="#" id="blah" style="display: none">
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="gambar" id="foto_bukti">
                                                        <label class="custom-file-label" for="foto_bukti">Foto bukti</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md">
                                        <div class="row" id="tools">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Simpan Pengukuran" name="simpan_ukur" class="btn btn-lg btn-success w-100">
                            </div>
                        </div>
                    </div>
                <?= form_close(); ?>

            </section>
