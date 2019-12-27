
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Pengukuran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('personel') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('personel/his_pengukuran') ?>">Histori Pengukuran</a></li>
                                <li class="breadcrumb-item active">Detail Pengukuran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title"><?= $barang->desk ?></h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                <?= '<img class="img-thumbnail p-4" src="data:image/jpeg;base64,'.base64_encode($barang->gambar).'">' ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label>Nama Equipment</label>
                                        <input type="text" value="<?= $barang->desk ?>" readonly class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>KKS Number</label>
                                        <input type="text" value="<?= $barang->kks_number ?>" readonly class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Asset ID</label>
                                        <input type="text" value="<?= $barang->asset_id ?>" readonly class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php foreach ($tools as $k) { ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <?php 
                                        $cond = ['', 'Good', 'Warning', 'Bad'];
                                        $class = ['', 'bg-success', 'bg-warning text-white', 'bg-danger'];
                                        ?>
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon <?= $class[$k->kondisi] ?>"><?= $cond[$k->kondisi] ?></div>
                                        </div>
                                        <div class="card-header border-0">
                                            <h3 class="card-title">
                                                <?= $k->type.' | '.$k->merk ?>
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-6 col-form-label">
                                                    Hasil Ukur
                                                </label>
                                                <div class="col-6">
                                                    <input type="text" value="<?= $k->angka ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
