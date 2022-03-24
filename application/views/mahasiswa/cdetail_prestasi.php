<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
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
                                <td class="font-weight-bold">Capaian Prestasi</td>
                                <td><?= $mhs->nama_capaian ?></td>
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
                                <td><a class="badge badge-info" href="<?= $mhs->url; ?>" target="_blank"><?= $mhs->url; ?></a></td>
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
                                    <h5 class="m-0">Portrait</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <img src="<?= base_url('assets/vendor/dist/img/') . $user['image']; ?>" alt="<?= $mhs->nama ?>" class="cursor-pointer w-100" data-toggle="modal" data-target="#detil-portrait">
                                <div id="detil-portrait" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">DETAIL GAMBAR</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="<?= base_url('assets/vendor/dist/img/') . $user['image']; ?>" alt="<?= $mhs->nama ?>" class="img-thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="alert alert-primary mb-0 text-center">
                                    <span style="font-size: 1.3rem;">
                                        <i class="fas fa-trophy"></i> <?= $mhs->nama_capaian ?>
                                    </span>
                                </div>
                                <div class="text-center mt-3">
                                    <h5><?= $mhs->nama_kegiatan ?></h5>
                                    Tingkat <?= $mhs->nama_level ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h6 class="mb-3 text-danger">BANTUAN/PENDANAAN KEGIATAN
                        </h6>
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

        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h6 class="mb-3 text-danger">FILE UPLOAD
                        </h6>
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
                                        <a href="<?= base_url(); ?>kompetisi/download_dokumen/<?php echo $detail->id_upload; ?>">
                                            <strong> <?php echo $detail->jenis_bukti; ?></strong></a>
                                </td>
                        </div>
                        <td>
                            <div>
                                <a href="<?= base_url(); ?>kompetisi/preview_dokumen/<?php echo $detail->id_upload; ?>" target="_blank">
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
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-warning btn-block" onclick="window.location.assign('<?= base_url(); ?>kompetisi/daftar_prestasi')">
                <i class="fas fa-hand-point-left"></i> Kembali
            </button>
        </div>
    </div>
    </div>