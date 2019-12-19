
            <div class="content-header">
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
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-10 mb-3">
                                    <div class="form-group">
                                        <select name="equipment" class="form-control select2" style="width: 100%;">
                                            <option disabled selected>Pilih Equipment</option>
                                            <?php foreach ($equipment as $c) { ?>
                                                <option value="<?= $c->asset_id ?>"><?= $c->desk ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button onclick="add_eq()" class="btn btn-md btn-primary w-100">Tambah Tools</button>
                                </div>

                            </div>

                            <div class="row" id="tools">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
