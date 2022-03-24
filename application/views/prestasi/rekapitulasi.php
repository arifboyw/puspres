<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="text-center">REKAPITULASI PRESTASI MANDIRI <br>
                    <?php if (empty($tahun_kegiatan)) { ?>
                    <?php } else { ?>
                        Tahun : <?php echo $tahun_kegiatan; ?>
                    <?php } ?></h5>
                <hr>
                <form action="<?= base_url('prestasi/rekapitulasi/'); ?>" method="GET">
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
                <table width="100%" border="1" cellpadding="3">
                    <?php $i = 1; ?>
                    <tr class="text-center">
                        <td><b>No.</b></td>
                        <td><b>Program Studi</b></td>
                        <?php foreach ($level as $baris) { ?>
                            <td><b><?= $baris->nama_level ?></b></td>
                        <?php } ?>
                    </tr>
                    <?php if (empty($rekap)) { ?>
                        <tr>
                            <td class="text-center" colspan="7"><b>Data tidak ditemukan!</b></td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($prodi_rekap as $kolom) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $kolom->nama_prodi ?></td>
                                <?php foreach ($level as $baris) { ?>
                                    <td class="text-center">
                                        <?php foreach ($rekap as $jumlah) { ?>
                                            <?php foreach ($jumlah->jlh as $cell) {
                                            } ?>
                                            <?php if ($baris->id_level == $cell->id_level && $kolom->kode_prodi == $cell->kode_prodi) { ?>
                                                <?php echo $cell->jumlah_per_fakultas ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                            </tr>
                        <?php } ?>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->