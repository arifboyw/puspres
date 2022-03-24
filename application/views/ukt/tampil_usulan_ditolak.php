<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="<?= base_url('ukt/tampil_usulan_ditolak/'); ?>" method="GET">
                    <table width="100%">
                        <tr>
                            <td>
                                <select class="form-control mb-3" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt">
                                    <option value="">Semester Pengajuan</option>
                                    <?php foreach ($jadwal_bebas_ukt as $row) : ?>
                                        <option value="<?php echo $row->id_jadwal_bebas_ukt; ?>"><?php echo $row->nama_semester; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="kode_fak" name="kode_fak">
                                    <option value="">Fakultas</option>
                                    <?php foreach ($fakultas as $row) : ?>
                                        <option value="<?php echo $row->kode_fak; ?>"><?php echo $row->nama_fak; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="kode_prodi" name="kode_prodi">
                                    <option value="">Program Studi</option>
                                    <?php foreach ($prodi as $row) : ?>
                                        <option value="<?php echo $row->kode_prodi; ?>"><?php echo $row->nama_prodi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control mb-3" id="nim" name="nim" placeholder="Temukan data by NIM">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i>Tampilkan</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <hr>
                Daftar Usulan UKT/SPP yang ditolak sebagai berikut:
                <table id="example1" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama/NIM/Program Studi/Fakultas</th>
                            <th>Uraian</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Disetujui</th>
                            <th>Keterangan</th>
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
                                    pada tanggal <?php echo format_indo($v->jadwal_kegiatan); ?> <br>
                                    Level Kegiatan : <b><?php echo $v->nama_level; ?></b>
                                </td>
                                <td class="text-center">
                                    <?= $v->tgl_usulan; ?>
                                </td>
                                <td class="text-center">
                                    <?= $v->tgl_validasi; ?>
                                </td>
                                <td>
                                    <strong>Ditolak </strong>karena <?= $v->ket_bebas_ukt; ?>
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