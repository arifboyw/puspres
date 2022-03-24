<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5>Rekap Pembayaran Bantuan Pembebasan UKT/SPP</h5>
                <hr>
                <table class="table table-bordered table-sm table-hover" id="example1">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Fakultas</th>
                            <th>Jumlah Semester</th>
                            <th>UKT/SPP</th>
                            <th>Total Bantuan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($rekap_pembayaran)) : ?>
                            <tr>
                                <td colspan="9">
                                    <div class="text-center">
                                        Data tidak ditemukan!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($rekap_pembayaran as $v) { ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td width="130px"><b><?php echo $v->nama; ?></b>
                                </td>
                                <td>
                                    <?php echo $v->nim; ?>
                                </td>
                                <td>
                                    <?php echo $v->nama_prodi; ?>
                                </td>
                                <td>
                                    <?php echo $v->nama_fak; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $v->jumlah_semester; ?>
                                </td>
                                <td class="text-right" width="120px">
                                    <?php echo 'Rp ' . rupiah($v->jumlah_ukt); ?>
                                </td>
                                <td class="text-right" width="130px">
                                    <?php echo 'Rp ' . rupiah($v->jumlah_ukt * $v->jumlah_semester); ?>
                                </td>
                                <td class="text-justify">
                                    Diberikan pembebasan UKT/SPP untuk semester <b><?php echo $v->nama_semester_bu; ?>
                                    </b></td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($totalbantuan as $t) { ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center"><b><i>Total Bantuan</i></b></td>
                                <td class="text-right"><b><i><?= 'Rp ' . rupiah($t->jumlah); ?></i></b></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- /.card -->
    </div>
    <div class="col-sm-12">
        <button class="btn btn-primary btn-block" onclick="window.location.assign('<?= base_url(); ?>ukt/rekapitulasi')">
            <i class="fas fa-hand-point-left"></i> Kembali
        </button>
    </div>
    <!-- End of Main Content -->
    </div>
    </div>