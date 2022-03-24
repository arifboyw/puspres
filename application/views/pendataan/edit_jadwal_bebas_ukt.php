<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="mt-3 col-lg">
                        <div class="">
                            <h5 class="">EDIT JADWAL PENGAJUAN BEBAS UKT</h5>
                            <form action="<?= base_url() ?>pendataan/edit_bu_konfirmasi/<?= encrypt_url($tampil_jadwal->id_jadwal_bebas_ukt) ?>" method="POST">
                                <div class="form-group">
                                    <label for="id_kategori_peserta">Nama Jadwal Kegiatan :</label>
                                    <input class="form-control" type="text" id="nama_jadwal" name="nama_jadwal" value="<?= $tampil_jadwal->nama_jadwal ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Kode Semester :</label>
                                    <input class="form-control" type="text" id="kode_semester" name="kode_semester" value="<?= $tampil_jadwal->kode_semester ?>" readonly>
                                </div>
                                <div class=" form-group">
                                    <label for="id_kategori_peserta">Mulai Pengajuan :</label>
                                    <input class="form-control" type="date" id="mulai_jadwal" name="mulai_jadwal" value="<?= $tampil_jadwal->mulai_jadwal ?>">
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
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></i> Hapus Jadwal</a>
                                    <a class="btn btn-warning" href="<?= base_url('pendataan/bebas_ukt') ?>"><i class="fas fa-hand-point-left"></i></i> Kembali</a>
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
                    <a class="btn btn-danger" href="<?= base_url() ?>pendataan/hapus_jadwal_bebas_ukt/<?= encrypt_url($tampil_jadwal->id_jadwal_bebas_ukt); ?>"><i class="fas fa-trash"></i></i> Delete</a>


                </div>
            </div>
        </div>
    </div>