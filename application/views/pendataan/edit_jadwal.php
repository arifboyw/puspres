<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <nav class="navbar navbar-expand-sm navbar-light">
                    <div class="container-fluid">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link  active" href="<?= base_url('pendataan/jadwal') ?>" style="text-decoration: none;"><strong>Jadwal Input Prestasi</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('pendataan/semester') ?>" style="text-decoration: none;"><strong>Pengaturan Semester</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('pendataan/triwulan') ?>" style="text-decoration: none;"><strong>Pengaturan Triwulan</strong></a>
                            </li>
                    </div>
                </nav>
                <div class="row">
                    <div class="mt-3 col-lg">
                        <div class="">
                            <h5 class="">EDIT JADWAL PENGISIAN PRESTASI MANDIRI</h5>
                            <form action="<?= base_url() ?>pendataan/edit_jadwal_konfirmasi/<?= encrypt_url($tampil_jadwal->id_jadwal) ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_kategori_peserta">Nama Jadwal Kegiatan :</label>
                                    <input class="form-control" type="text" id="nama_jadwal" name="nama_jadwal" value="<?= $tampil_jadwal->nama_jadwal ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori_peserta">Kode Triwulan :</label>
                                    <input class="form-control" type="text" id="kode_triwulan" name="kode_triwulan" value="<?= $tampil_jadwal->kode_triwulan ?>" readonly>
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Kode Semester :</label>
                                    <input class="form-control" type="text" id="kode_semester" name="kode_semester" value="<?= $tampil_jadwal->kode_semester ?>" readonly>
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Deadline Jadwal :</label>
                                    <input class="form-control" type="date" id="deadline_jadwal" name="deadline_jadwal" value="<?= $tampil_jadwal->deadline_jadwal ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Status Jadwal :</label>
                                    <select class="form-control" aria-label="Default select example" id="status_jadwal" name="status_jadwal">
                                        <option value="1" <?php if ($tampil_jadwal->status_jadwal == "1") {
                                                                echo "selected";
                                                            } ?>>Aktif</option>
                                        <option value="0" <?php if ($tampil_jadwal->status_jadwal == "0") {
                                                                echo "selected";
                                                            } ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group text-sm-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbaruhi Jadwal</button>
                                    <?php if ($user['role_id'] == "1") { ?>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></i> Hapus Jadwal</a>
                                    <?php } else { ?>
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash" disable></i></i> Hapus Jadwal</a>
                                    <?php } ?>
                                    <a class="btn btn-warning" href="<?= base_url('pendataan/jadwal') ?>"><i class="fas fa-hand-point-left"></i></i> Kembali</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin menghapus jadwal kegiatan ini?</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Keterangan : <strong><?= $tampil_jadwal->nama_jadwal ?></strong></div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-hand-point-left"></i> Batal</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>pendataan/hapus_jadwal/<?= encrypt_url($tampil_jadwal->id_jadwal); ?>"><i class="fas fa-trash"></i></i> Delete</a>


                </div>
            </div>
        </div>
    </div>