<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <!-- Small boxes (Stat box) -->

        <div class="card card-primary card-outline">
            <div class="card-header">
                Berikut daftar mahasiswa yang telah disetujui. <br>
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
                            <th>Pencapaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mhs)) : ?>
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-warning text-center" role="alert">
                                        Data prestasi belum ada!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($mhs as $p) : ?>
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
                                <td class="">
                                    <a><?= $p->nama_capaian ?></a>
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