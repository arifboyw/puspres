<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php $tgl = date('d-m-Y');
        ?>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-bordered mb-0">
                            <tr>
                                <td class="font-weight-bold">Nama Mahasiswa</td>
                                <td><?= $mhs->nama ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Induk Mahasiswa (NIM)</td>
                                <td><?= $mhs->nim ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tahun Masuk</td>
                                <td><?= $mhs->tm ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Program Studi</td>
                                <td><?= $mhs->nama_prodi ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Fakultas</td>
                                <td><?= $mhs->nama_fak ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Uraian Prestasi</td>
                                <td><?php echo $mhs->nama_capaian; ?> <?php echo $mhs->nama_kegiatan; ?>
                                    yang dilaksanakan di <?= $mhs->tempat_kegiatan ?>, <?= $mhs->prov_name ?>
                                    <br>pada tanggal <?php echo format_indo($mhs->jadwal_kegiatan); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Jumlah UKT/SPP</td>
                                <td>Rp <?= rupiah($mhs->jumlah_ukt) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h6 class="mb-2 text-danger text-lg">VERIFIKASI DOKUMEN
                    </h6>
                    Silahkan validasi dokumen pendukung prestasi mandiri mahasiswa berdasarkan <i>hardcopy</i> usulan dari mahasiswa.
                    <br>
                    <div class="table-responsive">
                        <?php if ($mhs->status_upload == "0") { ?>
                            <b>Dokumen belum diupload!</b><br>
                            Silahkan menghubungi operator Puspres fakutas masing-masing.
                        <?php } elseif ($mhs->status_upload == "1") { ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-bordered mb-0">
                                    <thead>
                                        <tr class="font-weight-bold bg-striped text-center" style="width:180px">
                                            <th>No.</th>
                                            <th>Download</th>
                                            <th>Preview Dokumen</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($mhs2 as $detail) : ?>
                                        <tr>
                                            <td class="text-md-center">
                                                <div><?php echo $no++; ?>
                                            </td>
                            </div>
                            <td>
                                <div>
                                    <a href="<?= base_url(); ?>ukt/download_dokumen/<?php echo $detail->id_upload; ?>">
                                        <strong> <?php echo $detail->jenis_bukti; ?></strong></a>
                            </td>
                    </div>
                    <td>
                        <div>
                            <a href="<?= base_url(); ?>ukt/preview_dokumen/<?php echo $detail->id_upload; ?>" target="_blank">
                                <strong><?php echo $detail->jenis_bukti; ?></< /a>
                    </td>
                </div>
                </td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php } ?>
            </div>
        </div>
    </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h6 class="text-danger text-lg">PENGUSULAN TIDAK DISETUJUI
                    </h6>
                </div>
                <div class="card-body">
                    Apabila <u>tidak disetujui</u>, silahkan berikan keterangan : <br>
                    <form action="<?= base_url() ?>ukt/entri_validasi_2/<?= encrypt_url($mhs->id_bebas_ukt) ?>" method="POST">
                        <textarea class="form-control" id="ket_bebas_ukt" name="ket_bebas_ukt" rows="3"></textarea>
                        <input type="hidden" id="usul_bebas_ukt" name="usul_bebas_ukt" value="3">
                        <input type="hidden" id="validasi_bebas_ukt" name="validasi_bebas_ukt" value="1">
                        <input type="hidden" id="tgl_validasi" name="tgl_validasi" value="<?= $tgl; ?>">
                        <input type="hidden" id="user_bebas_ukt" name="user_bebas_ukt" value="<?= $user['name'] ?>"><br>
                        <button type="submit" class="btn btn-sm btn-danger mb-1 btn-block">
                            <i class="fas fa-flag"></i> Tidak Disetujui
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h6 class="text-success text-lg">PENGUSULAN DISETUJUI
                    </h6>
                </div>
                <div class="card-body">

                    Apabila <u>disetujui</u>, silahkan isi data-data berikut: <br><br>

                    <form action="<?= base_url() ?>ukt/entri_validasi/<?= encrypt_url($mhs->id_bebas_ukt) ?>" method="POST">
                        <input type="hidden" id="usul_bebas_ukt" name="usul_bebas_ukt" value="2">
                        <input type="hidden" id="ket_bebas_ukt" name="ket_bebas_ukt" value="Pengajuan Bebas UKT Disetujui">
                        <input type="hidden" id="validasi_bebas_ukt" name="validasi_bebas_ukt" value="1">
                        <input type="hidden" id="user_bebas_ukt" name="user_bebas_ukt" value="<?= $user['name'] ?>">
                        <input type="hidden" id="tgl_validasi" name="tgl_validasi" value="<?= $tgl; ?>">
                        <label for="jumlah_semester">Jumlah Semester yang diberikan Pembebasan UKT/SPP :</label>
                        <select class="form-control" aria-label="Default select example" id="jumlah_semester" name="jumlah_semester" required>
                            <option value="">Pilih Jumlah Semester</option>
                            <option value="1">1 (Satu) Semester</option>
                            <option value="2">2 (Dua) Semester</option>
                        </select>
                        <br>
                        <label for="kode_semester">Nama Semester yang dibebaskan UKT/SPP :</label><br>
                        <?php foreach ($semester as $row) : ?>
                            <input type="checkbox" id="nama_semester" name="nama_semester[]" value="<?php echo $row->nama_semester; ?>"> <?php echo $row->nama_semester; ?>
                        <?php endforeach; ?>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-sm btn-success mb-1 text-white btn-block">
                            <i class="fas fa-check"></i> Disetujui
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="action-button">
                                <form action="<?= base_url() ?>ukt/entri_validasi/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                                    <input type="hidden" id="usul_bebas_ukt" name="usul_bebas_ukt" value="0">
                                    <input type="hidden" id="validasi_bebas_ukt" name="validasi_bebas_ukt" value="0">
                                    <input type="hidden" id="ket_bebas_ukt" name="ket_bebas_ukt" value="Status diturunkan menjadi Draft, silahkan update data usulan Saudara">
                                    <input type="hidden" id="user_bebas_ukt" name="user_bebas_ukt" value="<?= $user['name'] ?>">
                                    <button type="submit" class="btn btn-sm btn-dark mb-1 text-white btn-block">
                                        <i class="fas fa-list-alt"></i> Hapus Pengajuan
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <button type="submit" class="btn btn-sm btn-warning mb-1 text-dark btn-block" onclick="window.location.assign('<?= base_url(); ?>ukt')">
                                <i class="fas fa-times-circle"></i> Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>