
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Lupa Password</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('personel/lupa_password') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Lupa Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <?= $this->session->flashdata('msg') ?>
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Lupa Password</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">

                                <tbody>
                                    <?php foreach ($pengguna as $k) { ?>
                                    <tr>
                                        <td>
                                            <img src="<?= base_url('assets/') ?>dist/img/avatar3.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                            <?= $k->nip ?>
                                        </td>
                                        <td>
                                            <?= $k->nama ?>
                                        </td>
                                        <td>
                                            <?= $k->password ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('personel/lupa/'.$k->nip) ?>" class="btn btn-sm btn-warning text-white">
                                                <i class="fas fa-pen"></i>
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
