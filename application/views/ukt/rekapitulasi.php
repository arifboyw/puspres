<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <H5>Rekapitulasi Penerima Bantuan Pembebasan UKT/SPP Universitas Negeri Padang menurut Fakultas</H5>
                <hr>
                <form action="<?= base_url('ukt/rekap_fakultas/'); ?>" method="GET">
                    <table width="50%">
                        <tr>
                            <td>
                                <div class="mb-3">Pilih Semester</div>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt">
                                    <option value="">Semester Pengajuan</option>
                                    <?php foreach ($jadwal_bebas_ukt as $row) : ?>
                                        <option value="<?php echo $row->id_jadwal_bebas_ukt; ?>"><?php echo $row->nama_semester; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-search"></i>Tampilkan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-primary card-outline">
            <div class="card-body">
                <H5>Rekapitulasi Daftar Pembayaran Bebas UKT/SPP</H5>
                <hr>
                <form action="<?= base_url('ukt/rekap_pembayaran/'); ?>" method="GET">
                    <table width="50%">
                        <tr>
                            <td>
                                <div class="mb-3">Pilih Semester</div>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt">
                                    <option value="">Semester Pengajuan</option>
                                    <?php foreach ($jadwal_bebas_ukt as $row) : ?>
                                        <option value="<?php echo $row->id_jadwal_bebas_ukt; ?>"><?php echo $row->nama_semester; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-search"></i>Tampilkan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- End of Main Content -->
    </div>
    </div>