
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url('assets/') ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Supervisor</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                
                    
                    <li class="nav-item">
                        <a href="<?= site_url('supervisor') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Daftar Equipment
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('supervisor/tools') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Daftar Tools
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('supervisor/personel') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Daftar Personel
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                            <a href="<?= site_url('supervisor/his_pengukuran') ?>" class="nav-link">
                                <i class="nav-icon fas fa-thermometer-quarter"></i>
                                <p>
                                    Histori Pengukuran
                                </p>
                            </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('logout') ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Keluar
                            </p>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
