
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= site_url('personel/lupa_password') ?>">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                            <h3 class="card-title">Equipment Based on Unit</h3>
                        </div>

                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>Asset ID</th>
                                        <th>KKS Number</th>
                                        <th>Description</th>
                                        <th>Unit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($equipment as $k) { ?>
                                    <tr>
                                        <td>
                                            <?= $k->asset_id ?>
                                        </td>
                                        <td>
                                            <?= $k->kks_number ?>
                                        </td>
                                        <td>
                                            <?= $k->desk ?>
                                        </td>
                                        <td>
                                            <?= $k->unit ?>
                                        </td>
                                        
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </section>
