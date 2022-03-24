<section class="content">
    <div class="container-fluid">

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><strong>INPUT DATA PRESTASI MANDIRI</strong></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div class="step" data-target="#logins-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                <span class="bs-stepper-circle"><i class="fas fa-laptop-house"></i></span>
                                <span class="bs-stepper-label">Data Kegiatan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#information-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                <span class="bs-stepper-circle"><i class="fas fa-money-check"></i></span>
                                <span class="bs-stepper-label">Data Bantuan</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#document-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="document-part" id="document-part-trigger">
                                <span class="bs-stepper-circle"><i class="fas fa-envelope-open-text"></i></span>
                                <span class="bs-stepper-label">Data Dokumen</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                            <?php $tgl = date('d-m-Y');
                            ?>
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <form action="<?= base_url() ?>kompetisi/tambah_prestasi" method="POST">
                                        <input type="hidden" id="id_jadwal" name="id_jadwal" value="<?= $id_jadwal ?>" />
                                        <input type="hidden" id="tgl_pengajuan" name="tgl_pengajuan" value="<?= $tgl ?>" />
                                        <input type="hidden" id="nim" name="nim" value="<?= $detail->nim ?>" />
                                        <input type="hidden" id="id_kegiatan" name="id_kegiatan" value="2" />
                                        <div class="form-group">
                                            <label for="id_level">Level Kompetisi :</label>
                                            <select class="form-control" aria-label="Default select example" id="id_level" name="id_level" required>
                                                <option value="">Pilih Level Kompetisi</option>
                                                <?php foreach ($level as $row) : ?>
                                                    <option value="<?php echo $row->id_level; ?>"><?php echo $row->nama_level; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_level', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori_peserta">Kategori Peserta :</label>
                                            <select class="form-control" aria-label="Default select example" id="id_kategori_peserta" name="id_kategori_peserta" required>
                                                <option value="">Pilih Kategori Peserta</option>
                                                <?php foreach ($peserta as $row) : ?>
                                                    <option value="<?php echo $row->id_kategori; ?>"><?php echo $row->nama_kategori; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('id_kategori_peserta', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kegiatan">Nama Kegiatan :</label>
                                            <textarea class="form-control" id="nama_kegiatan" name="nama_kegiatan" rows="1" required></textarea>
                                            <?= form_error('nama_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="tahun_kegiatan">Tahun Kegiatan :</label>
                                            <select class="form-control" aria-label="Default select example" id="tahun_kegiatan" name="tahun_kegiatan" required>
                                                <option value="">Pilih Tahun</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                            </select>
                                            <?= form_error('tahun_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="jadwal_kegiatan">Jadwal Kegiatan :</label>
                                            <input type="date" class="form-control" id="jadwal_kegiatan" name="jadwal_kegiatan" required>
                                            <?= form_error('jadwal_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_kegiatan">Tempat Kegiatan :</label>
                                            <textarea class="form-control" id="tempat_kegiatan" name="tempat_kegiatan" rows="1" required></textarea>
                                            <?= form_error('tempat_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label for="prov_id">Provinsi :</label>
                                        <select class="form-control" aria-label="Default select example" id="prov_id" name="prov_id">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="-">-</option>
                                            <?php foreach ($provinsi as $row) : ?>
                                                <option value="<?php echo $row->prov_id; ?>"><?php echo $row->prov_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small>Abaikan bila tempat kegiatan berada di luar negeri.</small>
                                        <?= form_error('prov_id', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_bantuan">Negara :</label>
                                        <input type="text" class="form-control" id="negara" name="negara" placeholder="Diisi bila tempat pelaksanaan di luar negeri...">
                                    </div>
                                    <div class="form-group">
                                        <label for="penyelenggara">Penyelenggara :</label>
                                        <textarea class="form-control" id="penyelenggara" name="penyelenggara" rows="1" required></textarea>
                                        <?= form_error('penyelenggara', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_penyelenggara">Kategori Penyelenggara :</label>
                                        <select class="form-control" aria-label="Default select example" id="id_penyelenggara" name="id_penyelenggara" required>
                                            <option value="">Pilih Kategori Penyelenggara</option>
                                            <?php foreach ($penyelenggara as $row) : ?>
                                                <option value="<?php echo $row->id_penyelenggara; ?>"><?php echo $row->kategori_penyelenggara; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_penyelenggara', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_capaian">Capaian Prestasi :</label>
                                        <select class="form-control" aria-label="Default select example" id="id_capaian" name="id_capaian" required>
                                            <option value="">Pilih Capaian Prestasi</option>
                                            <?php foreach ($capaian as $row) : ?>
                                                <option value="<?php echo $row->id_capaian; ?>"><?php echo $row->nama_capaian; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('id_capaian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="text-sm-right"><button class="btn btn-primary" onclick="stepper.next()"><i class="fas fa-hand-point-right"></i> Entri Data Berikutnya</button></div>
                                </div>
                            </div>
                        </div>
                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label for="bantuan">Apakah Saudara mendapatkan bantuan? :</label><br>
                                        <input class="" type="radio" name="bantuan" id="bantuan" value="1"> Iya<br>
                                        <input class="" type="radio" name="bantuan" id="bantuan" value="0"> Tidak<br>
                                        <?= form_error('bantuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_bantuan">Jumlah Bantuan :</label>
                                        <input type="text" class="form-control" id="jumlah_bantuan" name="jumlah_bantuan"> *tanpa tanda titik
                                    </div>

                                    <div class="form-group">
                                        <label for="terbilang">Terbilang :</label>
                                        <input type="text" class="form-control" id="terbilang" name="terbilang">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_pemberi_bantuan">Pemberi Bantuan :</label>
                                        <select class="form-control" aria-label="Default select example" id="id_pemberi_bantuan" name="id_pemberi_bantuan">
                                            <option value="">Pilih Pemberi Bantuan</option>
                                            <?php foreach ($pemberi as $row) : ?>
                                                <option value="<?php echo $row->id_pemberi_bantuan; ?>"><?php echo $row->nama_pemberi; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ket_pemberi">Keterangan Pemberi Bantuan :</label>
                                        <textarea class="form-control" id="ket_pemberi" name="ket_pemberi" rows="2"></textarea>*Silahkan diisikan jabatan/nama pemberi bantuan/sponsor
                                    </div>
                                    <div class="form-group text-sm-right">
                                        <button class="btn btn-primary" onclick="stepper.previous()"><i class="fas fa-hand-point-left"></i> Data Sebelumnya</button>
                                        <button class="btn btn-primary" onclick="stepper.next()"><i class="fas fa-hand-point-right"></i> Entri Data Berikutnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="document-part" class="content" role="tabpanel" aria-labelledby="document-part-trigger">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <div>SERTIFIKAT/PIALA/MEDALI</div>
                                    <div class="form-group">
                                        <label for="no_sertifikat">Nomor Sertifikat :</label>
                                        <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" required>
                                        <?= form_error('no_sertifikat', '<small class="text-danger pl-3">', '</small>'); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_sertifikat">Tanggal Sertifikat :</label>
                                        <input type="date" class="form-control" id="tgl_sertifikat" name="tgl_sertifikat" required>
                                        <?= form_error('tgl_sertifikat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttd_sertifikat">Jabatan Penandatangan pada Sertifikat :</label>
                                        <input type="text" class="form-control" id="ttd_sertifikat" name="ttd_sertifikat" required>
                                        <?= form_error('ttd_sertifikat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <div class="form-group"> LINK/URL KEGIATAN
                                        <div class="form-group">
                                            <label for="url">URL Kegiatan :</label>
                                            <input type="text" class="form-control" id="url" name="url" required>
                                        </div>
                                        <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <div class="form-group"> SURAT TUGAS
                                        <div class="form-group">
                                            <label for="no_surat_tugas">Nomor Surat Tugas :</label>
                                            <input type="text" class="form-control" id="no_surat_tugas" name="no_surat_tugas" required>
                                            <?= form_error('no_surat_tugas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_surat_tugas">Tanggal Surat Tugas :</label>
                                            <input type="date" class="form-control" id="tgl_surat_tugas" name="tgl_surat_tugas" required>
                                            <?= form_error('tgl_surat_tugas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="ttd_surat_tugas">Jabatan Penandatangan pada Surat Tugas :</label>
                                            <input type="text" class="form-control" id="ttd_surat_tugas" name="ttd_surat_tugas" required>
                                            <?= form_error('ttd_surat_tugas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                                <div class="col-sm-6 ">
                                    <div class="form-group"> SURAT UNDANGAN/INVITASI
                                        <div class="form-group">
                                            <label for="no_undangan">Nomor Undangan :</label>
                                            <input type="text" class="form-control" id="no_undangan" name="no_undangan" required>
                                            <?= form_error('no_undangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_surat_undangan">Tanggal Surat Undangan :</label>
                                            <input type="date" class="form-control" id="tgl_surat_undangan" name="tgl_surat_undangan" required>
                                            <?= form_error('tgl_surat_undangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="pengundang">Pihak yang mengundang :</label>
                                            <input type="text" class="form-control" id="pengundang" name="pengundang" required>
                                            <?= form_error('pengundang', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group text-sm-right">
                                        <button class="btn btn-primary" onclick="stepper.previous()"><i class="fas fa-hand-point-left"></i> Data Sebelumnya</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>