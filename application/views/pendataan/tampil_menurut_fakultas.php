<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5>REKAPITULASI PRESTASI MENURUT FAKULTAS</h5>
                <hr>
                <form action="<?= base_url('pendataan/tampil_menurut_fakultas/'); ?>" method="GET">
                    <table width="40%">
                        <tr>
                            <td>
                                <div class="mb-3">Pilih Tahun</div>
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
                <h5 class="text-center">Rekapitulasi Prestasi Mahasiswa Menurut Fakultas <br>
                    <?php if (empty($tahun_kegiatan)) { ?>
                    <?php } else { ?>
                        Tahun : <?php echo $tahun_kegiatan; ?>
                    <?php } ?>
                </h5>
                <table width="100%" border="1" cellpadding="5">
                    <?php $i = 1; ?>
                    <tr class="text-center alert-light">
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
                            <tr class="alert-light">
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