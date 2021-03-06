
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Pengukuran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor/his_pengukuran') ?>">Histori Pengukuran</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('supervisor/detail_pengukuran') ?>">Detail Pengukuran</a></li>
                                <li class="breadcrumb-item active">Analisis</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Analisis <?= $barang->desk ?></h3>
                        </div>
                        <div class="card-body">
                            <?= form_open('supervisor/list_analisis/'.$barang->asset_id) ?>
                                <div class="row">
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Nama Peralatan</label>
                                        <input type="text" name="nama_peralatan" readonly class="form-control" value="<?= $barang->desk ?>">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Asset ID</label>
                                        <input type="text" name="asset_id" class="form-control" readonly value="<?= $barang->asset_id ?>">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">KKS Number</label>
                                        <input type="text" name="kks_number" readonly class="form-control" value="<?= $barang->kks_number ?>">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">MPI</label>
                                        <input type="text" name="mpi" value="<?= $barang->mpi ?>" readonly class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi A</label>
                                        <input type="text" value="<?= $barang->spek_a ?>" readonly class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi B</label>
                                        <input type="text" value="<?= $barang->spek_b ?>" readonly class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi C</label>
                                        <input type="text" value="<?= $barang->spek_c ?>"readonly  class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi D</label>
                                        <input type="text" value="<?= $barang->spek_d ?>" readonly class="form-control">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group col-md-3 mb-3">
                                            <b>Tanggal Ukur</b>
                                        </div>
                                        <input type="date" name="waktu" class="form-control col-md-3" placeholder="Tanggal Ukur">
                                        <br>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group col-md-3 mb-3">
                                            <b>Nomor Rekomendasi</b>
                                        </div>
                                        <input type="text" name="no_rekomen" class="form-control col-md-3" placeholder="Nomor Rekomendasi">
                                        <br>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $barang->id_pengukuran ?>">
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">General Drawing Peralatan & Titik Pengukuran</label>
                                        <textarea class="textarea"  name="gen_dr" id="summernote" cols="30" rows="10"><?= $barang->general_draw ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Finding</label>
                                        <textarea class="textarea" name="finding" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Diagnose</label>
                                        <textarea class="textarea" name="diagnose" cols="30" rows="10"></textarea>
                                    </div><div class="form-group col-md-12 mb-3">
                                        <label for="">Analysis</label>
                                        <textarea class="textarea" name="analisis" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Recommendation</label>
                                        <textarea class="textarea" name="recommend" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <input type="submit" name="anal" value="Lakukan Analisis" class="btn btn-primary btn-md w-100">
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </section>