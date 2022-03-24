<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-info">
        <a href="<?= base_url('auth'); ?>" class="brand-link">
            <img src="<?= base_url(); ?>assets/vendor/dist/img/unp.png" alt="KIPK Logo" class="brand-image img-circle bg-white elevation-3">
            <span class="brand-text font-weight-light">PUSAT PRESTASI</span>
        </a>
    </div>
    <div class="sidebar">
        <div class="user-panel mt-2 pb-3 d-flex">
            <div class="image mt-2">
                <img src="<?= base_url('assets/vendor/dist/img/') . $user['image']; ?>" class="bg-white elevation-2" alt="No Img">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?= $user['name']; ?>
                </a>
                <span class="badge badge-warning">
                    <?= $user['jabatan']; ?>
                </span>
            </div>
        </div>

        <div class="form-inline mt-2 mb-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="form-inline mt-2 mb-2">
            <!-- Membuat query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`   
                WHERE `user_access_menu`.`role_id` = $role_id
                AND `user_menu`.`is_show`=1
                ORDER BY `user_access_menu`.`menu_id` ASC
    ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <!-- Looping Menu -->
            <?php foreach ($menu as $m) : ?>
                <ul class="nav nav-treeview">
                    <div class="sidebar-heading text-white mt-1">
                        <?= $m['menu']; ?>
                    </div>
                    <!-- Siapkan submenu sesuai menu -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                        FROM `user_sub_menu` 
                        JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                        WHERE `user_sub_menu`.`menu_id`=$menuId
                        AND `user_sub_menu`.`is_active`=1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <?php if ($title == $sm['title']) : ?>
                            <li class="nav-item active text-bold">
                            <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                                <i class="<?= $sm['icon']; ?>"></i>
                                <span><?= $sm['title'] ?></span></a>
                            </li>
                        <?php endforeach; ?>
                        <hr>
                    <?php endforeach; ?>
                </ul>

        </div>
        <div class="sidebar-heading text-white">
            <a class="" href="<?= base_url('auth/logout'); ?>">
                <i class="nav-icon fas fa-power-off"></i> Logout
            </a>
        </div>

    </div>
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <div class="badge badge-secondary"><?= $title; ?></div>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->