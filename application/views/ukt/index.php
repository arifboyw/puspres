<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

        <div class="card card-primary card-outline">
            <div class="card-header">
                Daftar Usulan UKT/SPP yang diterima sebagai berikut:
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama/NIM/Program Studi/Fakultas</th>
                            <th>Uraian</th>
                            <th>Level Kegiatan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($usulan)) : ?>
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
                        foreach ($usulan as $v) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><b><?php echo $v->nama; ?></b><br>
                                    <?php echo $v->nim; ?><br>
                                    <?php echo $v->nama_prodi; ?><br>
                                    <?php echo $v->nama_fak; ?>
                                </td>
                                <td class="">
                                    <?php echo $v->nama_capaian; ?> <?php echo $v->nama_kegiatan; ?>
                                    yang dilaksanakan di <?= $v->tempat_kegiatan ?>, <?= $v->prov_name ?>
                                    pada tanggal <?php echo format_indo($v->jadwal_kegiatan); ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $v->nama_level; ?>
                                </td>
                                <td class="text-left">
                                    Diajukan pada tanggal <?= $v->tgl_usulan; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>ukt/validasi/<?= encrypt_url($v->id_bebas_ukt); ?>"><b>Validasi</b></a>
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