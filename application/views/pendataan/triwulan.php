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
                            <h5 class="text-center text-primary"><strong>DAFTAR TRIWULAN</strong></h5><br>
                            <table id="example1" class="table table-sm table-bordered table-hover" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Kode Triwulan</th>
                                        <th>Nama Triwulan</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($triwulan)) : ?>
                                        <tr>
                                            <td colspan="7">
                                                <div class="text-center alert-warning">
                                                    Data tidak ditemukan!
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($triwulan as $p) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td class="text-center">
                                                <?php echo $p->kode_triwulan; ?>
                                            </td>
                                            <td class="">
                                                <?php echo $p->nama_triwulan; ?>
                                            </td>
                                            <td class="">
                                                <?php echo $p->tahun_triwulan; ?>
                                            </td>
                                            <?php if ($p->status_triwulan == 1) { ?>
                                                <td class="text-center text-primary">
                                                    <h5><strong>AKTIF</strong></h5>
                                                </td>
                                            <?php } elseif ($p->status_triwulan == 0) { ?>
                                                <td class="text-center">Tutup</td>
                                            <?php } ?>
                                            <td class="">
                                                <a class="btn btn-warning btn-sm btn-block" href="<?= base_url() ?>pendataan/edit_triwulan/<?= encrypt_url($p->id_triwulan); ?>" style="text-decoration: none;"><i class="fas fa-edit"></i> Perbaruhi Data</a>
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
                        <h5 class="text-center text-primary"><strong>TAMBAH TRIWULAN</strong></h5><br>
                        <form class="form-group" action="<?= base_url('pendataan/tambah_triwulan') ?>" method="POST">
                            <div class="form-group">
                                <label for="id_kategori_peserta">Kode Triwulan :</label>
                                <input class="form-control" type="text" id="kode_triwulan" name="kode_triwulan" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Nama Triwulan :</label>
                                <input class="form-control" type="text" id="nama_triwulan" name="nama_triwulan" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Tahun Triwulan :</label>
                                <select class="form-control" type="text" id="tahun_triwulan" name="tahun_triwulan" required>
                                    <option value="">Pilih Tahun</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_peserta">Status Triwulan :</label>
                                <select class="form-control" type="text" id="status_triwulan" name="status_triwulan" required>
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