<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><strong>UPLOAD DOKUMEN PENDUKUNG</strong></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <?php if ($mhs->konfirmasi == "0") { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <b>UPLOAD SCAN SERTIFIKAT/PIALA/MEDALI</b>
                                <ol>
                                    <li>
                                        Bukti sertifikat adalah sertifikat asli (bukan fotokopi) yang dikeluarkan resmi oleh panitia penyelenggara.
                                    </li>
                                    <li>
                                        Sertifikat yang dikeluarkan oleh perguruan tinggi sebagai bukti penghargaan atas prestasi yang diperoleh tidak sah atau tidak dapat diakui.
                                    </li>
                                    <li>
                                        Jika kejuaraan tersebut tidak merilis sertifikat dan hanya memberikan piala/medali, maka piala/medali harus di foto sejelas mungkin agar bisa terbaca dan meyakinkan tim verifikasi bahwa prestasi kejuaraan yang diraih benar adanya sehingga data verifikasi valid dan dapat dipertanggungjawabkan.
                                    </li>
                                    <li>
                                        Foto piala/medali ditata pada dokumen disertai keterangan dan diunggah dalam bentuk file PDF.
                                    </li>
                                </ol>
                                <form enctype="multipart/form-data" action="<?= base_url() ?>kompetisi/tambah_prestasi3/<?= encrypt_url($mhs->id_mhs_kompetisi) ?>" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="status_upload" name="status_upload" value="1">
                                        <?= form_error('status_upload', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_mhs_kompetisi[]" name="id_mhs_kompetisi[]" value="<?= $mhs->id_mhs_kompetisi ?>">
                                        <?= form_error('id_mhs_kompetisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="nim[]" name="nim[]" value="<?= $mhs->nim ?>">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_bukti[]" name="id_bukti[]" value="1">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="upload_dokumen[]" class="col-sm-3 col-form-label text-sm-right"><i class="fas fa-upload"></i></label>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_dokumen[]" name="upload_dokumen[]" required>
                                                <label class="custom-file-label">Choose file PDF</label>
                                            </div>
                                        </div>
                                        <?= form_error('upload_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <b>UPLOAD PINDAIAN HALAMAN WEBSITE KEGIATAN (URL)</b>
                                    <ol>
                                        <li>
                                            URL yang disematkan bisa URL laman penyelenggara yang mempublikasikan berita informasi lomba/kejuaraan, atau
                                        </li>
                                        <li>
                                            URL informasi lomba/kejuaraan pada media sosial dari panitia penyelenggara, atau
                                        </li>
                                        <li>
                                            URL berita pada surat kabar online terkait kegiatan lomba/ kejuaraan yang diselenggarakan.
                                        </li>
                                        <li>
                                            URL digunakan untuk meyakinkan bahwa kegiatan yang diselenggarakan benar-benar terselenggara serta terdapat informasi pemenang atau perolehan gelar juara dengan identitas mahasiswa yang jelas.
                                        </li>
                                        <li>
                                            Laman tidak sah apabila berupa blog pribadi yang mengunggah informasi kejuaraan.
                                        </li>
                                    </ol>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_mhs_kompetisi[]" name="id_mhs_kompetisi[]" value="<?= $mhs->id_mhs_kompetisi ?>">
                                        <?= form_error('id_mhs_kompetisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="nim[]" name="nim[]" value="<?= $mhs->nim ?>">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_bukti[]" name="id_bukti[]" value="2">
                                        <?= form_error('id_bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="upload_dokumen[]" class="col-sm-3 col-form-label text-sm-right"><i class="fas fa-upload"></i></label>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_dokumen[]" name="upload_dokumen[]" required>
                                                <label class="custom-file-label">Choose file PDF</label>
                                            </div>
                                        </div>
                                        <?= form_error('upload_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <b>UPLOAD SCAN UPACARA PENYERAHAN PENGHARGAAN</b>
                                    <ol>
                                        <li>
                                            Foto Upacara Penyerahan Penghargaan (UPP) merupakan dokumentasi foto penyerahkan piala atau sertifikat atau tanda bukti kejuaraan lain dari panitia kepada peserta yang memperoleh juara.
                                        </li>
                                        <li>
                                            Foto UPP harus terdapat background atau backdrop atau tulisan pada saat kejuaraan yang meyakinkan atau menandakan sebuah kejuaraan yang diikuti.
                                        </li>
                                        <li>
                                            UPP pada lomba secara daring menyesuaikan dengan ketentuan.
                                        </li>
                                    </ol>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_mhs_kompetisi[]" name="id_mhs_kompetisi[]" value="<?= $mhs->id_mhs_kompetisi ?>">
                                        <?= form_error('id_mhs_kompetisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="nim[]" name="nim[]" value="<?= $mhs->nim ?>">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_bukti[]" name="id_bukti[]" value="3">
                                        <?= form_error('id_bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="upload_dokumen[]" class="col-sm-3 col-form-label text-sm-right"><i class="fas fa-upload"></i></label>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_dokumen[]" name="upload_dokumen[]" required>
                                                <label class="custom-file-label">Choose file PDF</label>
                                            </div>
                                        </div>
                                        <?= form_error('upload_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <b>UPLOAD SCAN SURAT TUGAS/IZIN</b>
                                    <ol>
                                        <li>
                                            Surat tugas atau surat izin kepada mahasiswa baik secara individu maupun kelompok untuk mengikuti perlombaan/kejuaraan.
                                        </li>
                                        <li>
                                            Pada surat tugas harus terdapat informasi apa bentuk kegiatan kejuaraan yang diselenggarakan, siapa saja mahasiswa yang ditugaskan, dimana lokasi pelaksanaan, dan kapan lokasi pelaksanaan. Informasi tersebut dibutuhkan untuk memudahkan dalam verifikasi data
                                        </li>
                                    </ol>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_mhs_kompetisi[]" name="id_mhs_kompetisi[]" value="<?= $mhs->id_mhs_kompetisi ?>">
                                        <?= form_error('id_mhs_kompetisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="nim[]" name="nim[]" value="<?= $mhs->nim ?>">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_bukti[]" name="id_bukti[]" value="4">
                                        <?= form_error('id_bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="upload_dokumen[]" class="col-sm-3 col-form-label text-sm-right"><i class="fas fa-upload"></i></label>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_dokumen[]" name="upload_dokumen[]" required>
                                                <label class="custom-file-label">Choose file PDF</label>
                                            </div>
                                        </div>
                                        <?= form_error('upload_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <b>UPLOAD SCAN SURAT UNDANGAN/INVITASI</b>
                                    <ol>
                                        <li>
                                            Apabila sebuah kegiatan kejuaraan tersebut merupakan kegiatan invitasi, maka dapat dibuktikan dengan surat undangan invitasi kejuaraan yang diselenggarakan.
                                        </li>
                                    </ol>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_mhs_kompetisi[]" name="id_mhs_kompetisi[]" value="<?= $mhs->id_mhs_kompetisi ?>">
                                        <?= form_error('id_mhs_kompetisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="nim[]" name="nim[]" value="<?= $mhs->nim ?>">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_bukti[]" name="id_bukti[]" value="5">
                                        <?= form_error('id_bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="upload_dokumen[]" class="col-sm-3 col-form-label text-sm-right"><i class="fas fa-upload"></i></label>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_dokumen[]" name="upload_dokumen[]" required>
                                                <label class="custom-file-label">Choose file PDF</label>
                                            </div>
                                        </div>
                                        <?= form_error('upload_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <b>UPLOAD SCAN BUKTI BANTUAN</b> <i>*Apabila ada</i>
                                    <ol>
                                        <li>
                                            Silahkan upload bukti penerimaan bantuan berupa Kwitansi atau Cover Proposal yang berisi disposisi bantuan </li>
                                    </ol>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_mhs_kompetisi[]" name="id_mhs_kompetisi[]" value="<?= $mhs->id_mhs_kompetisi ?>">
                                        <?= form_error('id_mhs_kompetisi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="nim[]" name="nim[]" value="<?= $mhs->nim ?>">
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_bukti[]" name="id_bukti[]" value="6">
                                        <?= form_error('id_bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="upload_dokumen[]" class="col-sm-3 col-form-label text-md-right"><i class="fas fa-upload"></i></label>
                                        <div class="col-sm">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_dokumen[]" name="upload_dokumen[]">
                                                <label class="custom-file-label">Choose file PDF</label>
                                            </div>
                                        </div>
                                        <?= form_error('upload_dokumen', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <hr>
                                    <div class="alert alert-warning">Silahkan klik tombol <b>SIMPAN</b>, apabila Saudara telah selesai mengupload file dokumen pendukung pengusulan prestasi mandiri.
                                    </div>
                                    <div class="form-group text-sm-right">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <img src="<?= base_url('assets/upload/contoh/sertifikat.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Sertifikat (format PDF)</b><br><br>
                            <img src="<?= base_url('assets/upload/contoh/piala.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Foto Piala (format PDF)</b><br><br>
                            <img src="<?= base_url('assets/upload/contoh/medali.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Foto Medali (format PDF)</b><br><br>
                            <img src="<?= base_url('assets/upload/contoh/upp.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Foto Upacara Penyerahan Penghargaan (UPP) (format PDF)</b><br><br>
                            <img src="<?= base_url('assets/upload/contoh/url.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Pindaian URL (format PDF)</b><br><br>
                            <img src="<?= base_url('assets/upload/contoh/surat_tugas.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Surat Tugas (format PDF)</b><br><br>
                            <img src="<?= base_url('assets/upload/contoh/surat_undangan.png') ?>" class="img-thumbnail"><br>
                            <b>Contoh Surat Undangan (format PDF)</b><br>
                        </div>
                    <?php } ?>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->