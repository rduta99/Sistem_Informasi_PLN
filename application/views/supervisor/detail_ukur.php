
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">List Analisis</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor/his_pengukuran') ?>">Histori Pengukuran</a></li>
                                <li class="breadcrumb-item active">Detail Pengukuran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Equipment</th>
                                        <th>Waktu</th>
                                        <th>Kondisi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $cond = ['', 'Good', 'Warning', 'Bad'];
                                    $class = ['', 'bg-success', 'bg-warning text-white', 'bg-danger'];
                                    $no = 0; foreach ($pengukuran as $k) { 
                                    
                                    ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $k->desk ?></td>
                                        <td><?= date('d M Y', strtotime($k->waktu)) ?></td>
                                        <td>
                                            <span class="badge <?= $class[$k->kondisi] ?>">
                                                <?= $cond[$k->kondisi] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('supervisor/detail_pengukuran/'.$k->id_pengukuran) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Detail
                                            </a>
                                            <!-- <a href="<?= site_url('supervisor/analisis_eq/'.$k->asset_id) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Lakukan Analisis
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </section>
