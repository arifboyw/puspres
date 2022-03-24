<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-9">
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
                                <td class="font-weight-bold">Nama Kegiatan</td>
                                <td><?= $mhs->nama_kegiatan ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tingkat Kegiatan</td>
                                <td><?= $mhs->nama_level ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kategori Peserta</td>
                                <td><?= $mhs->nama_kategori ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Pelaksanaan</td>
                                <td><?= format_indo($mhs->jadwal_kegiatan); ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tempat Pelaksanaan</td>
                                <td><?= $mhs->tempat_kegiatan ?>, <?= $mhs->prov_name ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penyelenggaran</td>
                                <td><?= $mhs->penyelenggara ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kategori Penyelenggaraan</td>
                                <td><?= $mhs->kategori_penyelenggara ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Capaian Prestasi</td>
                                <td><?= $mhs->nama_capaian ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Sertifikat</td>
                                <td><?= $mhs->no_sertifikat ?> Tanggal <?= format_indo($mhs->tgl_sertifikat) ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penandatangan</td>
                                <td><?= $mhs->ttd_sertifikat ?></td>
                            </tr>

                            <tr>
                                <td class="font-weight-bold">Nomor Surat Tugas</td>
                                <td><?= $mhs->no_surat_tugas ?> Tanggal <?= $mhs->tgl_surat_tugas ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penandatangan</td>
                                <td><?= $mhs->ttd_surat_tugas ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Surat Undangan</td>
                                <td><?= $mhs->no_undangan ?> Tanggal <?= $mhs->tgl_surat_undangan ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Pihak Pengundang</td>
                                <td><?= $mhs->pengundang; ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">URL Kegiatan</td>
                                <td>
                                    <?= $mhs->url ?><br>
                                    <a class="badge badge-primary" href="<?= $mhs->url ?>" target="_blank">TEST LINK</a> <small><b>Silahkan klik TEST LINK untuk memastikan URL aktif dan valid!</b></small>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="d-flex justify-content-between font-weight-bold">
                                    <h5 class="m-0"><?= $mhs->nama_kegiatan ?></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-primary mb-0 text-center">
                                    <span style="font-size: 1.3rem;">
                                        <i class="fas fa-trophy"></i> <?= $mhs->nama_capaian ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="d-flex justify-content-between font-weight-bold">
                                    <h5 class="m-0">PENDANAAN</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered mb-0">
                                        <tr>
                                            <td class="font-weight-bold bg-striped" style="width:180px">Mendapatkan bantuan?</td>
                                            <td><?php if ($mhs->bantuan = '1') { ?>
                                                    Iya
                                                <?php } else { ?> Tidak
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold bg-striped" style="width:180px">Jumlah Bantuan</td>
                                            <td><?= $mhs->jumlah_bantuan ?><small> - <?= $mhs->terbilang ?></small></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold bg-striped" style="width:180px">Pemberi Bantuan</td>
                                            <td>
                                                <?= $mhs->nama_pemberi ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold bg-striped" style="width:180px">Keterangan</td>
                                            <td><?= $mhs->ket_pemberi ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h6 class="mb-2 text-danger text-lg">FILE UPLOAD
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
                                        <a href="<?= base_url(); ?>prestasi/download_dokumen/<?php echo $detail->id_upload; ?>">
                                            <strong> <?php echo $detail->jenis_bukti; ?></strong></a>
                                </td>
                        </div>
                        <td>
                            <div>
                                <a href="<?= base_url(); ?>prestasi/preview_dokumen/<?php echo $detail->id_upload; ?>" target="_blank">
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

    <div class="callout callout-info">
        <div class="row">
            <div class="col-xl-6">
                <h5 class="text-danger">KONFIRMASI VALIDASI</h5>
                <div class="mb-1 mb-xl-0">
                    <span class="pr-2">
                        Apakah pengusulan prestasi mandiri Saudara <strong><?= $mhs->nama ?></strong> disetujui?<br>
                        Apabila <u>tidak disetujui</u>, silahkan berikan keterangan : <br>
                        <form action="<?= base_url() ?>prestasi/entri_validasi/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                            <textarea class="form-control" id="ket_validasi" name="ket_validasi" rows="3"></textarea>
                    </span>
                </div>
            </div>
            <div class="col-xl-6 text-sm-right">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="action-button">
                            <input type="hidden" id="status_validasi" name="status_validasi" value="2">
                            <input type="hidden" id="user_validasi" name="user_validasi" value="<?= $user['name'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger mb-1 btn-block">
                                <i class="fas fa-flag"></i> Tidak Disetujui
                            </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="action-button">
                            <form action="<?= base_url() ?>prestasi/entri_validasi/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                                <input type="hidden" id="ket_validasi" name="ket_validasi" value="Dokumen Valid">
                                <input type="hidden" id="poin_kompetisi" name="poin_kompetisi" value="<?php if ($mhs->id_capaian == 1) { ?>
                                 100
                                <?php } elseif ($mhs->id_capaian == 2) { ?>
                                80
                                    <?php } elseif ($mhs->id_capaian == 3) { ?>60
                                    <?php } elseif ($mhs->id_capaian == 4) { ?>40
                                    <?php } elseif ($mhs->id_capaian == 5) { ?>20
                                    <?php } elseif ($mhs->id_capaian == 6) { ?>10
                                      <?php } ?>  ">
                                <input type="hidden" id="status_validasi" name="status_validasi" value="1">
                                <input type="hidden" id="user_validasi" name="user_validasi" value="<?= $user['name'] ?>">
                                <button type="submit" class="btn btn-sm btn-success mb-1 text-white btn-block">
                                    <i class="fas fa-check"></i> Disetujui
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="action-button">
                            <form action="<?= base_url() ?>prestasi/entri_konfirmasi/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                                <input type="hidden" id="konfirmasi" name="konfirmasi" value="0">
                                <input type="hidden" id="ket_validasi" name="ket_validasi" value="Status diturunkan menjadi Draft">
                                <input type="hidden" id="user_validasi" name="user_validasi" value="<?= $user['name'] ?>">
                                <button type="submit" class="btn btn-sm btn-dark mb-1 text-white btn-block">
                                    <i class="fas fa-list-alt"></i> Jadikan Draft
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <button type="submit" class="btn btn-sm btn-warning mb-1 text-dark btn-block" onclick="window.location.assign('<?= base_url(); ?>prestasi')">
                            <i class="fas fa-times-circle"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>