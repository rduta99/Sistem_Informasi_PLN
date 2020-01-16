
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Histori Pengukuran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Histori Pengukuran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <sectio class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Histori Pengukuran</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tool_reg">
                                    <i class="fas fa-download"></i> Download Laporan
                                </button>
                                <div class="modal fade" id="tool_reg">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                            <?= form_open('supervisor/laporan_analisis_dua') ?>
                                                <div class="form-group">
                                                    <input type="number" name="tahun" placeholder="tahun" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <select name="bulan" id="" class="custom-select">
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <a href="<?= site_url('supervisor/ukur_eq') ?>" class="btn btn-tool btn-sm">
                                    <i class="fas fa-plus"></i> Ukur Equipment
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Asset ID</th>
                                        <th>Equipment</th>
                                        <th>KKS Number</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // $cond = ['', 'Good', 'Warning', 'Bad'];
                                    // $class = ['', 'bg-success', 'bg-warning text-white', 'bg-danger'];
                                    $no = 0; foreach ($ukur as $k) { 
                                    
                                    ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $k->asset_id ?></td>
                                        <td><?= $k->desk ?></td>
                                        <td><?= $k->kks_number ?></td>
                                        <td>
                                            <a href="<?= site_url('supervisor/detail_ukur/'.$k->asset_id) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Detail
                                            </a>
                                            <a href="<?= site_url('supervisor/analisis_eq/'.$k->asset_id) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Lakukan Analisis
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </sectio>
