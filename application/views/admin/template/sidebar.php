
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            
            <a href="index3.html" class="brand-link">
            <img src="<?= base_url('assets/') ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">PT PLN Persero</span>
            </a>

            <div class="sidebar">
            
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/') ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('admin') ?>" class="d-block"><?= $this->data['username'] ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    
                        <li class="nav-item">
                            <a href="<?= site_url('admin') ?>" class="nav-link <?php if($active == 1) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/master_eq') ?>" class="nav-link <?php if($active == 4) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-utensil-spoon"></i>
                                <p>
                                    Master Equipment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/master_to') ?>" class="nav-link <?php if($active == 5) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-toolbox"></i>
                                <p>
                                    Master Tools
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/his_pengukuran') ?>" class="nav-link <?php if($active == 6) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-thermometer-quarter"></i>
                                <p>
                                    Histori Pengukuran
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/jab_unit') ?>" class="nav-link <?php if($active == 2) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Jabatan dan Unit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('admin/lupa') ?>" class="nav-link <?php if($active == 3) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-question"></i>
                                <p>
                                    Lupa Password
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            
            </div>
            
        </aside>

        <div class="content-wrapper">
