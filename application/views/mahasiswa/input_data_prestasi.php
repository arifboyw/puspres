<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

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
                <table id="" class="table table-sm table-hover" width="100%" cellspacing="0">
                    <caption class="text-center">Note : untuk mengajukan usulan prestasi mandiri silahkan klik tombol Entri Prestasi</caption>
                    <thead>
                        <tr>
                            <th>Informasi Jadwal Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jadwal)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-danger">
                                        Jadwal pengusulan data prestasi mandiri belum dibuka.
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php foreach ($jadwal as $p) : ?>
                            <tr>
                                <td class="">
                                    <?php echo $p->nama_jadwal; ?> untuk Triwulan <b><?php echo $p->nama_triwulan; ?>
                                        <?php echo $p->tahun_triwulan; ?></b> Semester <b><?php echo $p->nama_semester; ?></b>
                                    <?php if ($p->status_jadwal == 1) { ?>
                                        <strong><u>dibuka</u></strong> sampai <b><?php echo format_indo($p->deadline_jadwal); ?></b>.<br><br>
                                        <?php if (!(strtotime($hari_ini) > strtotime($p->deadline_jadwal))) { ?>
                                            <form action="<?= base_url() ?>kompetisi/input_data_prestasi" method="POST">
                                                <input type="hidden" class="form-control" id="id_jadwal" name="id_jadwal" value="<?= $p->id_jadwal ?>">
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-keyboard"></i> Entri Prestasi</button>
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <b>Jadwal pengusulan prestasi telah ditutup!</b>
                                        <?php } ?>
                                </td>
                            <?php } elseif ($p->status_jadwal == 0) { ?>
                                <div class="text-center">Jadwal pengusulan prestasi telah ditutup
                                    </td>
                                <?php } ?>
                                </div>

                            <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><strong>DRAF USULAN PRESTASI MANDIRI</strong></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <br>Silahkan upload bukti prestasi untuk melengkapi usulan Prestasi Mandiri dengan menyiapkan softcopy file terlebih dahulu. <br>
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Tgl. Pengajuan</th>
                            <th>Nama Kegiatan</th>
                            <th>Level Kegiatan</th>
                            <th>Capaian</th>
                            <th>Waktu Kegiatan</th>
                            <th colspan="2"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($draft)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="text-center">
                                        Data tidak ditemukan!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php foreach ($draft as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td class="text-center">
                                    <?php echo $p->tgl_pengajuan; ?>
                                </td>
                                <td class="">
                                    <?php echo $p->nama_kegiatan; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $p->nama_level; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $p->nama_capaian; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo format_indo($p->jadwal_kegiatan); ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p->status_upload == "0") { ?>
                                        <a class="btn btn-warning btn-sm btn-block" href="<?= base_url() ?>kompetisi/tambah_prestasi2/<?= encrypt_url($p->id_mhs_kompetisi); ?>" style="text-decoration: none;"><i class="fas fa-upload"></i> Upload Dokumen</a>
                                    <?php } elseif ($p->status_upload == "1") { ?>
                                        <a class="btn btn-primary btn-sm btn-block" href="<?= base_url() ?>kompetisi/detail_prestasi/<?= encrypt_url($p->id_mhs_kompetisi); ?>" style="text-decoration: none;"><i class="fas fa-edit"></i> Edit Data</a>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p->status_upload == "0") { ?>
                                        <small><strong>Segera upload dokumen!</strong></small>
                                    <?php } elseif ($p->status_upload == "1") { ?>

                                        <form action="<?= base_url() ?>kompetisi/konfirmasi/<?= encrypt_url($p->id_mhs_kompetisi) ?>" method="POST">
                                            <input type="hidden" class="form-control" id="konfirmasi" name="konfirmasi" value="1">
                                            <div>
                                                <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fas fa-check"></i> Konfirmasi</button>
                                </td>
            </div>
            </form>
        <?php } ?>
        </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
    </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title"><strong>DAFTAR PRESTASI MANDIRI</strong></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
            <br>Silahkan dikumpulkan bukti prestasi <i>(hardcopy)</i> ke bagian Kemahasiswaan di Fakutas Saudara untuk dapat divalidasi. <br>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Kegiatan</th>
                        <th>Level Kegiatan</th>
                        <th>Capaian</th>
                        <th>Waktu Kegiatan</th>
                        <th>Aksi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($valid)) : ?>
                        <tr>
                            <td colspan="6">
                                <div class="text-center">
                                    Data tidak ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; ?>
                    <?php
                    foreach ($valid as $v) : ?>
                        <tr>
                            <td class="text-center"><?= $i; ?></td>
                            <td class="">
                                <?php echo $v->nama_kegiatan; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $v->nama_level; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $v->nama_capaian; ?>
                            </td>
                            <td class="text-center">
                                <?php echo format_indo($v->jadwal_kegiatan); ?>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href="<?= base_url() ?>kompetisi/vdetail_prestasi/<?= encrypt_url($v->id_mhs_kompetisi); ?>" style="text-decoration: none;"> <i class="fas fa-search"></i></a>
                            </td>
                            <td class="text-center">
                                <?php if ($v->status_validasi == "0") { ?>
                                    <div class="badge badge-warning">Diproses</div>
                                <?php } elseif ($v->status_validasi == "1") { ?>
                                    <div class="badge badge-success">Disetujui</div><br><small>Ket. : <?= $v->ket_validasi ?></small>
                                <?php } elseif ($v->status_validasi == "2") { ?>
                                    <div class="badge badge-danger">Tidak Disetujui</div><br><small>Ket. : <?= $v->ket_validasi ?></small>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- End of Main Content -->
    </div>
    </div>