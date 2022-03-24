<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>
        <div class="card card-primary card-outline">
            <div class="card-header">
                Universitas memberikan kesempatan kepada Saudara untuk mengajukan pembebasan Uang Kuliah Tunggal (UKT) atau SPP
                bagi yang mahasiswa yang meraih prestasi Juara I/II/III Tingkat Regional/Wilayah/Nasional/Internasional dengan ketentuan sebagai berikut : <br>
                <ol>
                    <li>Prestasi yang diusulkan telah divalidasi oleh fakultas masing-masing.</li>
                    <li>Mahasiswa hanya bisa mengusulkan satu prestasi terbaik untuk satu periode pengusulan.</li>
                    <li><b>Bukan Penerima Bidikmisi/KIP Kuliah/Bantuan UKT.</b></li>
                    <li>Silahkan klik tombol <b>Ajukan Permohonan Pembebasan UKT/SPP</b>.</li>
                    <li>Isi data-data UKT Saudara, lalu klik tombol <b>Konfirmasi</b>.</li>
                    <li>Usulan Pembebasan UKT/SPP akan divalidasi oleh Bagian Kemahasiswaan BAK UNP.</li>
                    <li>Bagian Kemahasiswaan membuat Surat Keputusan (SK) Rektor Universitas Negeri Padang.</li>
                    <li>Apabila SK Pembebasan UKT/SPP telah mendapatkan persetujuan pimpinan, maka bagian Kemahasiswaan akan menyampaikan pembebasan UKT/SPP ke bagian Keuangan.</li>
                    <li>Status pengusulan Saudara akan diumumkan di portal ini dan website <a href="http://bak.unp.ac.id"><b>http://bak.unp.ac.id</b></a>.</li>
                </ol>
            </div>
            <div class="card-body">

                <?php foreach ($jadwal_bebas_ukt as $p) : ?>
                    <?php if ($p->status_jadwal == 1) { ?>
                        <?php if (!(strtotime($hari_ini) > strtotime($p->deadline_jadwal))) { ?>
                            <form action="<?= base_url() ?>kompetisi/konfirmasi_usulan" method="POST">
                                <input type="hidden" class="form-control" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt" value="<?= $p->id_jadwal_bebas_ukt ?>">
                                <div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-file-invoice"></i> Ajukan Permohonan Pembebasan UKT/SPP untuk Semester<?php echo $p->nama_semester; ?></button>
                                </div>
                            </form>
                            <div class="text-center"><strong><u>Dibuka</u></strong> dari <b><?php echo format_indo($p->mulai_jadwal); ?></b> sampai dengan <b><?php echo format_indo($p->deadline_jadwal); ?></b></div>
                        <?php } else { ?>
                            <b>Jadwal pengajuan permohonan bebas UKT/SPP telah ditutup!</b>
                        <?php } ?>
                    <?php } elseif ($p->status_jadwal == 0) { ?>
                        Jadwal pengajuan permohonan bebas UKT/SPP telah ditutup
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="text-center">Historis Pengajuan Bebas UKT/SPP</h5>
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Uraian</th>
                            <th>Level</th>
                            <th>Proses Berjalan</th>
                            <th>Catatan</th>
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
                                    <?php echo $v->nama_capaian; ?> <?php echo $v->nama_kegiatan; ?>
                                    yang dilaksanakan di <?= $v->tempat_kegiatan ?>, <?= $v->prov_name ?>
                                    pada tanggal <?php echo format_indo($v->jadwal_kegiatan); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $v->nama_level; ?>
                                </td>
                                <td class="text-left">
                                    <?php if ($v->usul_bebas_ukt == "1") { ?>
                                        <div class="badge badge-warning">Pengajuan Bebas UKT/SPP Terkirim</div><br>
                                        <small>Diajukan pada tanggal <?= $v->tgl_usulan; ?></small>
                                    <?php } elseif ($v->usul_bebas_ukt == "2") { ?>
                                        Pengajuan Bebas UKT/SPP yang diajukan pada tanggal <?= $v->tgl_usulan; ?>
                                        <br>
                                        <div class="badge badge-success">Disetujui</div><br>
                                        Silahkan menunggu informasi dari Bagian Kemahasiswaan BAK UNP melalui website <a href="http://bak.unp.ac.id" target="_blank">http://bak.unp.ac.id</a>
                                        dan cek tagihan UKT/SPP Saudara pada <a href="http://portal.unp.ac.id" target="_blank">http://portal.unp.ac.id</a>
                                    <?php } elseif ($v->usul_bebas_ukt == "3") { ?>
                                        Pengajuan Bebas UKT/SPP yang diajukan pada tanggal <?= $v->tgl_usulan; ?>
                                        <br>
                                        <div class="badge badge-danger">Ditolak</div><br>
                                    <?php } ?>
                                </td>
                                <td> <?php echo $v->ket_bebas_ukt; ?> <br>
                                    <?php if ($v->usul_bebas_ukt == "2") { ?>
                                        Saudara tidak diwajibkan membayar UKT/SPP pada <br>
                                        <strong><?php echo $v->nama_semester_bu; ?></strong>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    </div>
    </div>