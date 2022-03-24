<!-- Main content -->
<?= form_error('kode_unik', '<h5 class="text-danger pl-3">', '</h5>'); ?>
<?= form_error('id_mhs_kompetisi', '<h5 class="text-danger pl-3">', '</h5>'); ?>
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php $tgl = date('d-m-Y');
        ?>
        <div class="row mb-3">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-bordered mb-0">
                            <tr>
                                <td class="font-weight-bold">Nama Mahasiswa</td>
                                <td><?= $mhs->nama ?> </td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Induk Mahasiswa (NIM)</td>
                                <td><?= $mhs->nim ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tahun Masuk</td>
                                <td><?= $mhs->tm ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Program Studi</td>
                                <td><?= $mhs->nama_prodi ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Fakultas</td>
                                <td><?= $mhs->nama_fak ?></td>
                            </tr>
                            <tr>
                                <form action="<?= base_url() ?>kompetisi/konfirmasi_usulan_2" method="POST">
                                    <input type="hidden" id="kode_unik" name="kode_unik" value="<?= $mhs->nim ?><?= $id_jadwal_bebas_ukt ?>" />
                                    <input type="hidden" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt" value="<?= $id_jadwal_bebas_ukt ?>" />
                                    <input type="hidden" id="nim" name="nim" value="<?= $mhs->nim ?>" />
                                    <input type="hidden" id="tgl_usulan" name="tgl_usulan" value="<?= $tgl ?>" />
                                    <input type="hidden" id="usul_bebas_ukt" name="usul_bebas_ukt" value="1" />
                                    <input type="hidden" id="ket_bebas_ukt" name="ket_bebas_ukt" value="Permohonan Saudara akan segera diproses bagian Kemahasiswaan BAK UNP.">
                                    <td class="font-weight-bold">Jumlah Uang Kuliah Tunggal (UKT)/SPP</td>
                                    <td><input type="text" class="form-control" id="jumlah_ukt" name="jumlah_ukt" required></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Prestasi yang diusulkan untuk mendapatkan Pembebasan UKT/SPP</td>
                                <td>
                                    <select class="form-control" aria-label="Default select example" id="id_mhs_kompetisi" name="id_mhs_kompetisi" required>
                                        <option value=""><b>--Pilih Prestasi Terbaik--</b></option>
                                        <?php foreach ($prestasi as $row) : ?>
                                            <option value="<?php echo $row->id_mhs_kompetisi; ?>"><?php echo $row->nama_kegiatan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h6 class="mb-3 text-danger">CATATAN
                    </h6>
                    <div class="table-responsive">
                        1. Silahkan klik tombol <strong>AJUKAN PERMOHONAN</strong> apabila Saudara yakin telah mengentrikan data-data dengan benar sesuai dokumen yang ada.
                        <br>
                        2. Silahkan klik tombol <strong>KEMBALI</strong> untuk kembali ke halaman Daftar Usulan Bebas UKT.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> AJUKAN PERMOHONAN</button>
            </div>
        </div>
        </form>
        <div class="col-sm-6">
            <button class="btn btn-warning btn-block" onclick="window.location.assign('<?= base_url(); ?>kompetisi/usulan_bebas_ukt')">
                <i class="fas fa-hand-point-left"></i> KEMBALI
            </button>
        </div>
    </div>
    </div>

    </div>