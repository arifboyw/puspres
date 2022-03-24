<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="row mb-0">
            <div class="col-sm-12">
                <?php if ($mhs->konfirmasi == "0") { ?>
                    <div class="badge badge-secondary">Status</div><br> <small><b><?= $mhs->ket_validasi ?></b></small>
                <?php } elseif ($mhs->status_validasi == "0") { ?>
                    <div class="badge badge-warning">Diproses</div><br> <small>Keterangan : menunggu validasi dari bagian Kemahasiswaan <?= $mhs->nama_fak ?></small>
                <?php } elseif ($mhs->status_validasi == "1") { ?>
                    <div class="badge badge-success">Disetujui</div><br> <small>Keterangan : <?= $mhs->ket_validasi ?></small>
                <?php } elseif ($mhs->status_validasi == "2") { ?>
                    <div class="badge badge-danger">Tidak Disetujui</div><br> <small>Keterangan : <?= $mhs->ket_validasi ?></small>
                <?php } ?>
            </div>
        </div>
        <?php $tgl = date('d-m-Y');
        ?>
        <div class="row mb-3">
            <div class="col-lg-9">
                <div class="card card-primary card-outline">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-bordered mb-0">
                            <tr>
                                <td class="font-weight-bold"></td>
                                <td class="font-weight-bold text-right"><small><b>Tanggal Pengajuan : <?= $mhs->tgl_pengajuan ?></b></small></td>
                            </tr>
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
                                <form action="<?= base_url() ?>kompetisi/edit/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                                    <input type="hidden" id="tgl_pengajuan" name="tgl_pengajuan" value="<?= $tgl ?>" />
                                    <td class="font-weight-bold">Nama Kegiatan</td>
                                    <td>
                                        <textarea class="form-control" id="nama_kegiatan" name="nama_kegiatan" rows="3"><?= $mhs->nama_kegiatan ?></textarea>
                                    </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Capaian Prestasi</td>
                                <td>
                                    <select class="form-control" aria-label="Default select example" id="id_capaian" name="id_capaian">
                                        <option value="1" <?php if ($mhs->id_capaian == "1") {
                                                                echo "selected";
                                                            } ?>>Juara 1</option>
                                        <option value="2" <?php if ($mhs->id_capaian == "2") {
                                                                echo "selected";
                                                            } ?>>Juara 2</option>
                                        <option value="3" <?php if ($mhs->id_capaian == "3") {
                                                                echo "selected";
                                                            } ?>>Juara 3</option>
                                        <option value="4" <?php if ($mhs->id_capaian == "4") {
                                                                echo "selected";
                                                            } ?>>Harapan</option>
                                        <option value="5" <?php if ($mhs->id_capaian == "5") {
                                                                echo "selected";
                                                            } ?>>Peserta/Delegasi/Partisipasi</option>
                                        <option value="6" <?php if ($mhs->id_capaian == "6") {
                                                                echo "selected";
                                                            } ?>>Apresiasi</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tingkat Kegiatan</td>
                                <td>
                                    <select class="form-control" aria-label="Default select example" id="id_level" name="id_level">
                                        <option value="1" <?php if ($mhs->id_level == "1") {
                                                                echo "selected";
                                                            } ?>>Universitas</option>
                                        <option value="2" <?php if ($mhs->id_level == "2") {
                                                                echo "selected";
                                                            } ?>>Provinsi</option>
                                        <option value="3" <?php if ($mhs->id_level == "3") {
                                                                echo "selected";
                                                            } ?>>Regional/Wilayah </option>
                                        <option value="4" <?php if ($mhs->id_level == "4") {
                                                                echo "selected";
                                                            }  ?>>Nasional </option>
                                        <option value="5" <?php if ($mhs->id_level == "5") {
                                                                echo "selected";
                                                            }  ?>>Internasional</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kategori Peserta</td>
                                <td>
                                    <select class="form-control" aria-label="Default select example" id="id_kategori" name="id_kategori">
                                        <option value="1" <?php if ($mhs->id_kategori == "1") {
                                                                echo "selected";
                                                            } ?>>Individu</option>
                                        <option value="2" <?php if ($mhs->id_kategori == "2") {
                                                                echo "selected";
                                                            } ?>>Kelompok</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Pelaksanaan</td>
                                <td><input type="date" class="form-control" id="jadwal_kegiatan" name="jadwal_kegiatan" value="<?= $mhs->jadwal_kegiatan; ?>"></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tempat Pelaksanaan</td>
                                <td><input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" value="<?= $mhs->tempat_kegiatan ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Provinsi</td>
                                <td>
                                    <select class="form-control" aria-label="Default select example" id="prov_id" name="prov_id">
                                        <option value="1" <?php if ($mhs->prov_id == "1") {
                                                                echo "selected";
                                                            } ?>>ACEH</option>
                                        <option value="2" <?php if ($mhs->prov_id == "2") {
                                                                echo "selected";
                                                            } ?>>SUMATERA UTARA</option>
                                        <option value="3" <?php if ($mhs->prov_id == "3") {
                                                                echo "selected";
                                                            } ?>>SUMATERA BARAT</option>
                                        <option value="4" <?php if ($mhs->prov_id == "4") {
                                                                echo "selected";
                                                            } ?>>RIAU</option>
                                        <option value="5" <?php if ($mhs->prov_id == "5") {
                                                                echo "selected";
                                                            } ?>>JAMBI</option>
                                        <option value="6" <?php if ($mhs->prov_id == "6") {
                                                                echo "selected";
                                                            } ?>>SUMATERA SELATAN</option>
                                        <option value="7" <?php if ($mhs->prov_id == "7") {
                                                                echo "selected";
                                                            } ?>>BENGKULU</option>
                                        <option value="8" <?php if ($mhs->prov_id == "8") {
                                                                echo "selected";
                                                            } ?>>LAMPUNG</option>
                                        <option value="9" <?php if ($mhs->prov_id == "9") {
                                                                echo "selected";
                                                            } ?>>KEPULAUAN BANGKA BELITUNG</option>
                                        <option value="10" <?php if ($mhs->prov_id == "10") {
                                                                echo "selected";
                                                            } ?>>KEPULAUAN RIAU</option>
                                        <option value="11" <?php if ($mhs->prov_id == "11") {
                                                                echo "selected";
                                                            } ?>>DKI JAKARTA</option>
                                        <option value="12" <?php if ($mhs->prov_id == "12") {
                                                                echo "selected";
                                                            } ?>>JAWA BARAT</option>
                                        <option value="13" <?php if ($mhs->prov_id == "13") {
                                                                echo "selected";
                                                            } ?>>JAWA TENGAH</option>
                                        <option value="14" <?php if ($mhs->prov_id == "14") {
                                                                echo "selected";
                                                            } ?>>DI YOGYAKARTA</option>
                                        <option value="15" <?php if ($mhs->prov_id == "15") {
                                                                echo "selected";
                                                            } ?>>JAWA TIMUR</option>
                                        <option value="16" <?php if ($mhs->prov_id == "16") {
                                                                echo "selected";
                                                            } ?>>BANTEN</option>
                                        <option value="17" <?php if ($mhs->prov_id == "17") {
                                                                echo "selected";
                                                            } ?>>BALI</option>
                                        <option value="18" <?php if ($mhs->prov_id == "18") {
                                                                echo "selected";
                                                            } ?>>NUSA TENGGARA BARAT</option>
                                        <option value="19" <?php if ($mhs->prov_id == "19") {
                                                                echo "selected";
                                                            } ?>>NUSA TENGGARA TIMUR</option>
                                        <option value="20" <?php if ($mhs->prov_id == "20") {
                                                                echo "selected";
                                                            } ?>>KALIMANTAN BARAT</option>
                                        <option value="21" <?php if ($mhs->prov_id == "21") {
                                                                echo "selected";
                                                            } ?>>KALIMANTAN TENGAH</option>
                                        <option value="22" <?php if ($mhs->prov_id == "22") {
                                                                echo "selected";
                                                            } ?>>KALIMANTAN SELATAN</option>
                                        <option value="23" <?php if ($mhs->prov_id == "23") {
                                                                echo "selected";
                                                            } ?>>KALIMANTAN TIMUR</option>
                                        <option value="24" <?php if ($mhs->prov_id == "24") {
                                                                echo "selected";
                                                            } ?>>KALIMANTAN UTARA</option>
                                        <option value="25" <?php if ($mhs->prov_id == "25") {
                                                                echo "selected";
                                                            } ?>>SULAWESI UTARA</option>
                                        <option value="26" <?php if ($mhs->prov_id == "26") {
                                                                echo "selected";
                                                            } ?>>SULAWESI TENGAH</option>
                                        <option value="27" <?php if ($mhs->prov_id == "27") {
                                                                echo "selected";
                                                            } ?>>SULAWESI SELATAN</option>
                                        <option value="28" <?php if ($mhs->prov_id == "28") {
                                                                echo "selected";
                                                            } ?>>SULAWESI TENGGARA</option>
                                        <option value="29" <?php if ($mhs->prov_id == "29") {
                                                                echo "selected";
                                                            } ?>>GORONTALO</option>
                                        <option value="30" <?php if ($mhs->prov_id == "30") {
                                                                echo "selected";
                                                            } ?>>SULAWESI BARAT</option>
                                        <option value="31" <?php if ($mhs->prov_id == "31") {
                                                                echo "selected";
                                                            } ?>>MALUKU</option>
                                        <option value="32" <?php if ($mhs->prov_id == "32") {
                                                                echo "selected";
                                                            } ?>>MALUKU UTARA</option>
                                        <option value="33" <?php if ($mhs->prov_id == "33") {
                                                                echo "selected";
                                                            } ?>>PAPUA</option>
                                        <option value="34" <?php if ($mhs->prov_id == "34") {
                                                                echo "selected";
                                                            } ?>>PAPUA BARAT</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penyelenggara</td>
                                <td>
                                    <textarea class="form-control" id="penyelenggara" name="penyelenggara" rows="3"><?= $mhs->penyelenggara ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Kategori Penyelenggaraan</td>
                                <td>
                                    <select class="form-control" aria-label="Default select example" id="id_penyelenggara" name="id_penyelenggara">
                                        <option value="1" <?php if ($mhs->id_penyelenggara == "1") {
                                                                echo "selected";
                                                            } ?>>Kemahasiswaan Mandiri</option>
                                        <option value="2" <?php if ($mhs->id_penyelenggara == "2") {
                                                                echo "selected";
                                                            } ?>>Kemahasiswaan Kemdikbudristek</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Sertifikat</td>
                                <td>
                                    <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" value="<?= $mhs->no_sertifikat ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Sertifikat</td>
                                <td>
                                    <input type="date" class="form-control" id="tgl_sertifikat" name="tgl_sertifikat" value="<?= $mhs->tgl_sertifikat ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penandatangan Sertifikat</td>
                                <td>
                                    <input type="text" class="form-control" id="ttd_sertifikat" name="ttd_sertifikat" value="<?= $mhs->ttd_sertifikat ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Surat Tugas</td>
                                <td>
                                    <input type="text" class="form-control" id="no_surat_tugas" name="no_surat_tugas" value="<?= $mhs->no_surat_tugas ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Surat Tugas</td>
                                <td>
                                    <input type="date" class="form-control" id="tgl_surat_tugas" name="tgl_surat_tugas" value="<?= $mhs->tgl_surat_tugas ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penandatangan Surat Tugas</td>
                                <td>
                                    <input type="text" class="form-control" id="ttd_surat_tugas" name="ttd_surat_tugas" value="<?= $mhs->ttd_surat_tugas ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Surat Undangan</td>
                                <td>
                                    <input type="text" class="form-control" id="no_undangan" name="no_undangan" value="<?= $mhs->no_undangan ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Surat Undangan</td>
                                <td>
                                    <input type="date" class="form-control" id="tgl_surat_undangan" name="tgl_surat_undangan" value="<?= $mhs->tgl_surat_undangan ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Pihak Pengundang</td>
                                <td>
                                    <input type="text" class="form-control" id="pengundang" name="pengundang" value="<?= $mhs->pengundang ?>">
                            </tr>
                            <tr>
                                <td class="font-weight-bold">URL Kegiatan</td>
                                <td>
                                    <input type="text" class="form-control" id="url" name="url" value="<?= $mhs->url ?>">
                                    <a class="badge badge-primary" href="<?= $mhs->url ?>" target="_blank">TEST LINK</a> <small><b>Harap masukkan URL yang lengkap!</b></small>
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
                                    <td>
                                        <?php if ($mhs->bantuan = '1') { ?>
                                            Iya
                                        <?php } else { ?> Tidak
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold bg-striped" style="width:180px">Jumlah Bantuan</td>
                                    <td>
                                        <input type="text" class="form-control" id="jumlah_bantuan" name="jumlah_bantuan" value="<?= $mhs->jumlah_bantuan ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Terbilang</b></td>
                                    <td><input type="text" class="form-control" id="terbilang" name="terbilang" value="<?= $mhs->terbilang ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold bg-striped" style="width:180px">Pemberi Bantuan</td>
                                    <td>
                                        <select class="form-control" aria-label="Default select example" id="id_pemberi_bantuan" name="id_pemberi_bantuan">
                                            <option value="1" <?php if ($mhs->id_pemberi_bantuan == "1") {
                                                                    echo "selected";
                                                                } ?>>Universitas</option>
                                            <option value="2" <?php if ($mhs->id_pemberi_bantuan == "2") {
                                                                    echo "selected";
                                                                } ?>>Fakultas</option>
                                            <option value="3" <?php if ($mhs->id_pemberi_bantuan == "3") {
                                                                    echo "selected";
                                                                } ?>>Instansi Lain</option>
                                            <option value="4" <?php if ($mhs->id_pemberi_bantuan == "4") {
                                                                    echo "selected";
                                                                } ?>>Swasta</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold bg-striped" style="width:180px">Keterangan</td>
                                    <td>
                                        <input type="text" class="form-control" id="ket_pemberi" name="ket_pemberi" value="<?= $mhs->ket_pemberi ?>">
                                    </td>
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

    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h6 class="mb-3 text-danger">KETENTUAN
                    </h6>
                    <div class="table-responsive">
                        1. Silahkan klik tombol <strong>KONFIRMASI</strong> apabila Saudara yakin telah mengentrikan data-data dengan benar sesuai dokumen yang ada.
                        <br>
                        2. Apabila terdapat data yang akan diupdate, silahkan langsung diubah kemudian klik tombol <strong>EDIT DATA</strong>.
                        <br>
                        3. Untuk menghapus data usulan, klik tombol <strong>HAPUS USULAN</strong>.
                        <br>
                        4. Silahkan klik tombol <strong>KEMBALI</strong> untuk kembali ke halaman Daftar Usulan Prestasi.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <input type="hidden" class="form-control" id="konfirmasi" name="konfirmasi" value="">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Edit Data</button>
            </div>
        </div>
        </form>

        <div class="col-sm-3">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#konfirmasiModal"><i class="fas fa-check"></i> Konfirmasi</button>
            </div>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-danger btn-block" style="text-decoration: none;" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></i> Hapus Usulan</a>
        </div>
        <div class="col-sm-3">
            <button class="btn btn-warning btn-block" onclick="window.location.assign('<?= base_url(); ?>kompetisi')">
                <i class="fas fa-hand-point-left"></i> Kembali
            </button>
        </div>
    </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin menghapus usulan prestasi ini?</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Nama Kegiatan : <?= $mhs->nama_kegiatan ?></div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-hand-point-left"></i> Batal</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>kompetisi/delete/<?= encrypt_url($mhs->id_mhs_kompetisi); ?>"><i class="fas fa-trash"></i></i> Delete</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Konfirmasi Modal-->
    <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $mhs->nama_capaian ?> <?= $mhs->nama_kegiatan ?> Tingkat <?= $mhs->nama_level ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><b>Dengan ini saya menyatakan bahwa data prestasi yang diusulkan sudah benar.</b></div>
                <div class="modal-footer">
                    <form action="<?= base_url() ?>kompetisi/konfirmasi/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                        <input type="hidden" class="form-control" id="konfirmasi" name="konfirmasi" value="1">
                        <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>