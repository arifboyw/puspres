<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="mt-3 col-lg">
                        <div class="">
                            <table id="example1" class="table table-sm table-bordered table-hover" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Jadwal</th>
                                        <th>Semester</th>
                                        <th>Mulai Pengajuan</th>
                                        <th>Deadline</th>
                                        <th>Status Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($jadwal_bebas_ukt)) : ?>
                                        <tr>
                                            <td colspan="7">
                                                <div class="text-center alert-warning">
                                                    Data tidak ditemukan!
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($jadwal_bebas_ukt as $p) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="">
                                                <?php echo $p->nama_jadwal; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $p->nama_semester; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo format_indo($p->mulai_jadwal); ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo format_indo($p->deadline_jadwal); ?>
                                            </td>
                                            <?php if ($p->status_jadwal == 1) { ?>
                                                <td class="text-center text-primary">
                                                    <h5><strong>AKTIF</strong></h5>
                                                </td>
                                            <?php } elseif ($p->status_jadwal == 0) { ?>
                                                <td class="text-center">Tutup</td>
                                            <?php } ?>
                                            <td class="">
                                                <a class="btn btn-warning btn-sm btn-block" href="<?= base_url() ?>pendataan/edit_jadwal_bebas_ukt/<?= encrypt_url($p->id_jadwal_bebas_ukt); ?>" style="text-decoration: none;"><i class="fas fa-edit"></i> Perbaruhi</a>
                                            </td>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <h5 class="text-center text-primary"><strong>INPUT JADWAL</strong></h5><br>
                        <form class="form-group" action="<?= base_url('pendataan/tambah_jadwal_bebas_ukt') ?>" method="POST">
                            <div class="form-group">
                                <label for="id_kategori_peserta">Nama Jadwal Kegiatan :</label>
                                <input class="form-control" type="text" id="nama_jadwal" name="nama_jadwal" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Semester Pembebasan UKT :</label>
                                <select class="form-control" aria-label="Default select example" id="kode_semester" name="kode_semester">
                                    <option value="">--Pilih Semester--</option>
                                    <?php foreach ($semester as $row) : ?>
                                        <option value="<?php echo $row->kode_semester; ?>"><?php echo $row->nama_semester; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Mulai Pengajuan :</label>
                                <input class="form-control" type="date" id="mulai_jadwal" name="mulai_jadwal" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Deadline :</label>
                                <input class="form-control" type="date" id="deadline_jadwal" name="deadline_jadwal" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Status Jadwal :</label>
                                <select class="form-control" type="text" id="status_jadwal" name="status_jadwal" required>
                                    <option value="0" selected>Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                            </div>
                            <div class="form-group text-sm-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->