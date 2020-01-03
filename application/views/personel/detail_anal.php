
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">List Analisis</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('personel') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('personel/list_analisis') ?>">List Analisis</a></li>
                                <li class="breadcrumb-item active">Detail Analisis</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="timeline">
                                <?php foreach ($analisis as $k) { ?>
                                <div class="time-label">
                                    <span><?= date('d M Y', strtotime($k->waktu)) ?></span>
                                </div>
                                <div>
                                    <i class="fas fa-stop-circle bg-blue"></i>
                                    <div class="timeline-item">
                                        <div class="card collapsed-card" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
                                            <div class="card-header">
                                                <h3 class="card-title"><?= $k->desk ?></h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="card-body" style="display: none;">
                                                <div class="card">
                                                    <div class="card-header border-0">
                                                        <h3 class="card-title">General Drawing Peralatan & Titik Pengukuran</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <?= $k->general_draw ?>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-header border-0">
                                                        <h3 class="card-title">Finding</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <?= $k->finding ?>
                                                    </div>
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
