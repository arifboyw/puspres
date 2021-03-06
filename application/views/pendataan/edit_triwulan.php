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
                                <a class="nav-link" href="<?= base_url('pendataan/jadwal') ?>" style="text-decoration: none;"><strong>Jadwal Input Prestasi</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('pendataan/semester') ?>" style="text-decoration: none;"><strong>Pengaturan Semester</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('pendataan/triwulan') ?>" style="text-decoration: none;"><strong>Pengaturan Triwulan</strong></a>
                            </li>
                    </div>
                </nav>
                <div class="row">
                    <div class="mt-3 col-lg">
                        <div class="">
                            <h5 class="">EDIT TRIWULAN</h5>
                            <form action="<?= base_url() ?>pendataan/edit_triwulan_konfirmasi/<?= encrypt_url($tampil_triwulan->id_triwulan) ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_kategori_peserta">Kode Triwulan :</label>
                                    <input class="form-control" type="text" id="kode_triwulan" name="kode_triwulan" value="<?= $tampil_triwulan->kode_triwulan ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori_peserta">Nama Triwulan :</label>
                                    <input class="form-control" type="text" id="nama_triwulan" name="nama_triwulan" value="<?= $tampil_triwulan->nama_triwulan ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Tahun Triwulan :</label>
                                    <input class="form-control" type="text" id="tahun_triwulan" name="tahun_triwulan" value="<?= $tampil_triwulan->tahun_triwulan ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Status Triwulan :</label>
                                    <select class="form-control" aria-label="Default select example" id="status_triwulan" name="status_triwulan">
                                        <option value="1" <?php if ($tampil_triwulan->status_triwulan == "1") {
                                                                echo "selected";
                                                            } ?>>Aktif</option>
                                        <option value="0" <?php if ($tampil_triwulan->status_triwulan == "0") {
                                                                echo "selected";
                                                            } ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="form-group text-sm-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Perbaruhi Triwulan</button>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></i> Hapus Triwulan</a>
                                    <a class="btn btn-warning" href="<?= base_url('pendataan/triwulan') ?>"><i class="fas fa-hand-point-left"></i></i> Kembali</a>
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
                    <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin menghapus data triwulan ini?</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Keterangan Triwulan : <strong><?= $tampil_triwulan->nama_triwulan ?> <?= $tampil_triwulan->tahun_triwulan ?></strong></div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-hand-point-left"></i> Batal</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>pendataan/hapus_triwulan/<?= encrypt_url($tampil_triwulan->id_triwulan); ?>"><i class="fas fa-trash"></i></i> Delete</a>


                </div>
            </div>
        </div>
    </div>