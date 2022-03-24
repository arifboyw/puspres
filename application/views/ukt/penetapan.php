<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

        <div class="card card-primary card-outline">
            <div class="card-header">
                Tambah data penetapan penerima pembebasan UKT/SPP
            </div>
            <div class="card-body">
                <a type="button" href="<?= base_url() ?>ukt/tambah_penetapan" class="btn btn-warning btn-block"><i class="fas fa-keyboard"></i> Tambah Data Penetapan</a>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header">
                <strong>Draf SK Pembebasan UKT/SPP</strong>
            </div>
            <div class="card-body">
                Silahkan klik tombol lanjutkan untuk menambahkan penerima pada SK Penetapan Pembebasan UKT/SPP. <br>
                <table id="example2" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Semester Pengajuan</th>
                            <th>Nomor SK</th>
                            <th>Judul SK</th>
                            <th>Tanggal SK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($sk)) : ?>
                            <tr>
                                <td colspan="6">
                                    <div class="text-center">
                                        Draf SK Penetapan tidak ada!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($sk as $v) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><b><?php echo $v->nama_semester; ?></b><br>
                                </td>
                                <td class="">
                                    <?php echo $v->no_sk; ?>
                                </td>
                                <td>
                                    <?php echo $v->judul_sk; ?>
                                </td>
                                <td class="text-left">
                                    Diajukan pada tanggal <?= $v->tgl_sk; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>ukt/tambah_penetapan_3/<?= encrypt_url($v->id_sk); ?>"><b>Lanjutkan Penetapan</b></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <strong>Historis SK Pembebasan UKT/SPP</strong>
            </div>
            <div class="card-body">
                Silahkan klik tombol lanjutkan untuk menambahkan penerima pada SK Penetapan Pembebasan UKT/SPP. <br>
                <table id="example2" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Semester Pengajuan</th>
                            <th>Nomor SK</th>
                            <th>Judul SK</th>
                            <th>Tanggal SK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($sk_valid)) : ?>
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
                        foreach ($sk_valid as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><b><?php echo $r->nama_semester; ?></b><br>
                                </td>
                                <td width="150">
                                    <?php echo $r->no_sk; ?>
                                </td>
                                <td>
                                    <?php echo $r->judul_sk; ?>
                                </td>
                                <td class="text-left">
                                    <?= $r->tgl_sk; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>ukt/detail_sk/<?= encrypt_url($r->id_sk); ?>"><i class="fa fa-search"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>