<div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url(); ?>assets/vendor/dist/img/unp.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <!-- <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul> -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-users-cog"></i> <strong> Pengaturan</strong></a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-item text-center alert-primary"><strong>Manajemen Role</strong></div>
                    <a href="<?= base_url('role') ?>" class="dropdown-item">
                        <i class="fas fa-fw fa-user-tie"></i> Pengaturan Role
                    </a>
                    <a href="<?= base_url('role/user') ?>" class="dropdown-item">
                        <i class="fas fa-users"></i> Pengaturan User
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item text-center alert-primary"><strong>Manajemen Menu</strong></div>
                    <a href="<?= base_url('menu') ?>" class="dropdown-item">
                        <i class="fas fa-fw fa-folder"></i> Pengaturan Menu
                    </a>
                    <a href="<?= base_url('menu/submenu') ?>" class="dropdown-item">
                        <i class="fas fa-fw fa-folder-open"></i> Pengaturan Submenu
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item text-center alert-primary"><strong>Manajemen User</strong></div>
                    <a href="<?= base_url('user') ?>" class="dropdown-item">
                        <i class="fas fa-fw fa-folder"></i> Profil User
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="<?= base_url('auth/logout'); ?>">
                        <i class="nav-icon fas fa-power-off"></i> Logout
                    </a>
                </div>
                <div>
                </div>
            </li>
            <!-- Nav Item - User Information -->
        </ul>

    </nav>
    <!-- /.navbar -->