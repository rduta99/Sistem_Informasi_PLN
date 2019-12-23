
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Detail Pengukuran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/his_pengukuran') ?>">Histori Pengukuran</a></li>
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/detail_pengukuran') ?>">Detail Pengukuran</a></li>
                                <li class="breadcrumb-item active">Analisis Equipment</li>
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
                            <?= form_open('admin/laporan_analisis') ?>
                                <div class="row">
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="">Nama Peralatan</label>
                                        <input type="text" name="nama_peralatan" class="form-control" value="<?= $barang->desk ?>">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="">Nomor KKS</label>
                                        <input type="text" name="kks_number" class="form-control" value="<?= $barang->kks_number ?>">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label for="">MPI</label>
                                        <input type="text" name="mpi" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi A</label>
                                        <input type="text" name="spek_a" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi B</label>
                                        <input type="text" name="spek_b" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi C</label>
                                        <input type="text" name="spek_c" class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label for="">Spesifikasi D</label>
                                        <input type="text" name="spek_d" class="form-control">
                                    </div>
                                    <input type="hidden" name="id" value="<?= $barang->id_pengukuran ?>">
                                    <div class="col-md-4">
                                        <label for="">Gambar Peralatan</label>
                                    <?= '<img class="img-thumbnail p-4" src="data:image/jpeg;base64,'.base64_encode($barang->gambar).'">' ?>
                                    </div>
                                    <div class="form-group col-md-8 mb-3">
                                        <label for="">General Drawing Peralatan & Titik Pengukuran</label>
                                        <textarea class="form-control" name="gen_dr" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="">Finding</label>
                                        <textarea class="form-control" name="finding" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="">Diagnose</label>
                                        <textarea class="form-control" name="diagnose" id="" cols="30" rows="10"></textarea>
                                    </div><div class="form-group col-md-6 mb-3">
                                        <label for="">Analysis</label>
                                        <textarea class="form-control" name="analisis" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="">Recommendation</label>
                                        <textarea class="form-control" name="recommend" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <input type="submit" name="anal" value="Lakukan Analisis" class="btn btn-primary btn-md w-100">
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </section>
