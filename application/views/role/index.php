<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> <b>Pengaturan Role</b></h5>

            <div class="text-sm-right mb-3">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#newRoleModal">Tambah Role</button>
            </div>
            <p class="card-text">
                <?= form_error('menu', '<div class="alert alert-success" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message'); ?>
            <div class="row mt-3">
                <div class="col-lg">
                    <table id="example1" class="table table-bordered table-sm" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Role</th>
                                <th>Keterangan Role</th>
                                <th>Access Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row" class="text-center"><?= $i; ?></th>
                                    <td><?= $r['role']; ?></td>
                                    <td><?= $r['ket_role']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('role/roleaccess/') . $r['id'] ?>" class="text-decoration-none"><b>UPDATE<b></a>

                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal -->
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Tambah Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('role'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>