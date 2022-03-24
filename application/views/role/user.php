<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> <b>Pengaturan User</b></h5>
            <div class="row">
                <div class="col-lg">
                    <?php if ($this->session->flashdata('hapus')) : ?>
                        <?php if ($this->session->flashdata('hapus') == TRUE) : ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="icon fas fa-check"></i>
                                Data user berhasil dihapus!
                            </div>
                        <?php elseif ($this->session->flashdata('hapus') == FALSE) : ?>
                            <div class="alert alert-danger">Data user gagal dihapus!</div>
                        <?php endif; ?>
                    <?php endif ?>

                    <?= form_error('username', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <?= $this->session->flashdata('message'); ?>

                    <div class="alert alert-light">
                        Keterangan Role : 1= Administrator, 2= Operator, 3=Operator Fakultas, 4= Mahasiswa 5= Operator Bebas UKT </div>
                    <button type="button" class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#newUsernameModal">Tambah User</button>

                </div>
            </div>


            <!-- Tabel Utama-->

            <table id="example1" class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Role_Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($username as $u) : ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $i; ?></th>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['name']; ?></td>
                            <td><?= $u['jabatan']; ?></td>
                            <td><?= $u['unit']; ?></td>
                            <td class="text-center"><?= $u['role_id']; ?></td>
                            <td class="text-center"><?= $u['is_active']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url(); ?>role/edituser/<?= $u['id']; ?>" class="">Edit</a>
                                <a class="" href="<?= base_url(); ?>role/deleteuser/<?= $u['id']; ?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <!-- Modal -->
                <div class="modal fade" id="newUsernameModal" tabindex="-1" role="dialog" aria-labelledby="newUsernameModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newUsernameModalLabel">Tambah User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('role/user'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit">
                                    </div>

                                    <div class="form-group">
                                        <input type="role_id" class="form-control" id="role_id" name="role_id" placeholder="Role Id*">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
            </table>
        </div>
    </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin menghapus data?</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang terhapus tidak dapat dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url(); ?>/role/deleteuser/<?= $u['id']; ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>