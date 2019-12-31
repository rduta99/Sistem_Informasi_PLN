
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">List Analisis</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor') ?>">Home</a></li>
                                <li class="breadcrumb-item active">List Analisis</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                List Analisis
                            </h3>
                        </div>
                        <div class="card-body table-responsive p-3">
                            <table class="table table-striped table-valign-middle" id="example1">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Equipment</td>
                                        <td>KKS Number</td>
                                        <td>Tanggal Analisis</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $no = 0; foreach ($analisis as $k) { 
                                    
                                    ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $k->desk ?></td>
                                        <td><?= $k->kks_number ?></td>
                                        <td><?= date('d M Y', strtotime($k->waktu)) ?></td>
                                        <td>
                                            <a href="<?= site_url('supervisor/laporan_analisis/'.$k->id_anal) ?>" class="btn btn-primary btn-sm">
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
