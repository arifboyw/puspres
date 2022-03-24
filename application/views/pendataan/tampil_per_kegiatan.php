<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5>REKAPITULASI PRESTASI MENURUT TINGKAT KEGIATAN</h5>
                <hr>
                <form action="<?= base_url('pendataan/tampil_per_kegiatan/'); ?>" method="GET">
                    <table width="40%">
                        <tr>
                            <td>
                                <div class="mb-3">Pilih Tahun Kegiatan</div>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="tahun_kegiatan" name="tahun_kegiatan">
                                    <option value="">Tampilkan Semua</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-search"></i>Tampilkan</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <hr>
                <table width="50%" border="1" cellpadding="5">
                    <thead>
                        <tr class="text-md-center">
                            <th>No.</th>
                            <th>Tahun Kegiatan</th>
                            <th>Tingkat Kegiatan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($per_tingkat)) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert-warning text-center" role="alert">
                                        Data prestasi tidak ditemukan!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($per_tingkat as $p) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td class="text-center">
                                    <?php echo $p->tahun_kegiatan; ?>
                                </td>
                                <td>
                                    <?php echo $p->nama_level; ?>
                                </td>
                                <td class="text-right">
                                    <?php echo $p->jumlah; ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($total as $t) { ?>
                            <tr>
                                <td class="text-center" colspan="3"><b>Jumlah Pencapaian</b></td>
                                <td class="text-right"><b><?= $t->total; ?></b></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary btn-block" onclick="window.location.assign('<?= base_url(); ?>pendataan/rekapitulasi')">
                    <i class="fas fa-hand-point-left"></i> Kembali
                </button>
            </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->