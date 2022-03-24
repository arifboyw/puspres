<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="text-center">
                    <h5>DAFTAR PRESTASI MAHASISWA UNIVERSITAS NEGERI PADANG</h5>
                </div>
                <hr>
                <form action="<?= base_url('pendataan/tampil_prestasi/'); ?>" method="GET">
                    <table width="100%">
                        <tr>
                            <td>
                                <select class="form-control mb-3" id="tahun_kegiatan" name="tahun_kegiatan">
                                    <option value="">Tahun Kegiatan</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
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
            </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->