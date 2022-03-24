<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <H5>Rekapitulasi Penerima Bantuan Pembebasan UKT/SPP Universitas Negeri Padang</H5>
                <hr>
                <table width="100%" border="1" cellpadding="5">
                    <?php $i = 1; ?>
                    <tr class="text-center">
                        <td><b>No.</b></td>
                        <td><b>Fakultas</b></td>
                        <?php foreach ($level as $baris) { ?>
                            <td><b><?= $baris->nama_level ?></b></td>
                        <?php } ?>
                    </tr>
                    <?php if (empty($rekap)) { ?>
                        <tr>
                            <td class="text-center" colspan="7"><b>Data tidak ditemukan!</b></td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($fakultas_rekap as $kolom) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $kolom->nama_fak ?></td>
                                <?php foreach ($level as $baris) { ?>
                                    <td class="text-center">
                                        <?php foreach ($rekap as $jumlah) { ?>
                                            <?php foreach ($jumlah->jlh as $cell) {
                                            } ?>
                                            <?php if ($baris->id_level == $cell->id_level && $kolom->kode_fak == $cell->kode_fak) { ?>
                                                <?php echo $cell->jumlah_per_fakultas ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                            </tr>
                        <?php } ?>
                        <?php if (empty($rekap)) { ?>

                        <?php } else { ?>
                            <tr>
                                <td></td>
                                <td class="text-center"><b>Jumlah</b></td>
                                <td class="text-center"><b><?= $total_universitas ?></b></td>
                                <td class="text-center"><b><?= $total_provinsi ?></b></td>
                                <td class="text-center"><b><?= $total_regional ?></b></td>
                                <td class="text-center"><b><?= $total_nasional ?></b></td>
                                <td class="text-center"><b><?= $total_internasional ?></b></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="col-sm-12">
                <button class="btn btn-primary btn-block" onclick="window.location.assign('<?= base_url(); ?>ukt/rekapitulasi')">
                    <i class="fas fa-hand-point-left"></i> Kembali
                </button>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- End of Main Content -->
    </div>
    </div>