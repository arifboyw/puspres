<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <!-- Small boxes (Stat box) -->

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><strong>DRAF USULAN PRESTASI MANDIRI</strong></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
                <br>Berikut daftar mahasiswa yang mengajukan usulan prestasi mandiri. <br>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered" id="example1">
                    <thead>
                        <tr class="text-md-center">
                            <th>#</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>TM</th>
                            <th>Program Studi/Fakultas</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mhspenerima)) : ?>
                            <tr>
                                <td colspan="9">
                                    <div class="alert-warning text-center" role="alert">
                                        Data usulan prestasi belum ada!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($mhspenerima as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td class="text-center">
                                    <?php echo $p->nim; ?>
                                </td>
                                <td>
                                    <?php echo $p->nama; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $p->tm; ?>
                                </td>
                                <td>
                                    <?php echo $p->nama_prodi; ?> (<?= $p->jenjang ?>) - <?php echo $p->singkatan_fak; ?>
                                </td>
                                <td class="">
                                    <?= $p->nama_kegiatan ?>
                                </td>
                                <td class="text-center">
                                    <?= $p->tgl_pengajuan ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>prestasi/validasi/<?= encrypt_url($p->id_mhs_kompetisi); ?>"><b>Validasi</b></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->