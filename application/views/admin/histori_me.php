
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Histori Pengukuran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Histori Pengukuran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Histori Pengukuran</h3>
                            <div class="card-tools">
                                <a href="<?= site_url('admin/ukur_eq') ?>" class="btn btn-tool btn-sm">
                                    <i class="fas fa-plus"></i> Ukur Equipment
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Equipment</td>
                                        <td>Tanggal Pengukuran</td>
                                        <td>Kondisi</td>
                                        <td>Opsi</td>
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
                                        <td><?= $k->waktu ?></td>
                                        <td>
                                            <span class="badge <?= $class[$k->kondisi] ?>">
                                                <?= $cond[$k->kondisi] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('admin/detail_pengukuran/'.$k->id_pengukuran) ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-cog"></i> Detail
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
