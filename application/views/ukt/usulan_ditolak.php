<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <form action="<?= base_url('ukt/tampil_usulan_ditolak/'); ?>" method="GET">
                    <table>
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- End of Main Content -->
    </div>
    </div>