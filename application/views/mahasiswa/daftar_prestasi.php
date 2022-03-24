<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

        <div class="card card-primary card-outline">
            <div class="card-header text-center">
                <H5>DAFTAR PRESTASI MANDIRI</H5>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama Kegiatan</th>
                            <th>Level Kegiatan</th>
                            <th>Capaian</th>
                            <th>Waktu/Tempat Kegiatan</th>
                            <th>Aksi</th>
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
                                    <?php echo format_indo($v->jadwal_kegiatan); ?>/<br>
                                    <?= $v->tempat_kegiatan ?>, <?= $v->prov_name ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>kompetisi/cdetail_prestasi/<?= encrypt_url($v->id_mhs_kompetisi); ?>" style="text-decoration: none;"> <i class="fas fa-search"></i></a>
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