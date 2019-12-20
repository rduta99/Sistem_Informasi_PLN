
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            
            <a href="index3.html" class="brand-link">
            <img src="<?= base_url('assets/') ?>dist/img/logo_pln.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Engineering PLN</span>
            </a>

            <div class="sidebar">
            
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/') ?>dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= site_url('personel') ?>" class="d-block"><?= $this->data['username'] ?></a>
                    </div>

                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    
                        <li class="nav-item">
                            <a href="<?= site_url('personel') ?>" class="nav-link <?php if($active == 1) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-utensil-spoon"></i>
                                <p>
                                    Equipment
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('personel/tools') ?>" class="nav-link <?php if($active == 2) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-toolbox"></i>
                                <p>
                                    Tools
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= site_url('personel/setting') ?>" class="nav-link <?php if($active == 3) { echo "active"; } ?>">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
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
