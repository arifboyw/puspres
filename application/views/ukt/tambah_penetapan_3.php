<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>

        <?php
        $id_sk = $penerima['id_sk'];
        $penetapan = "SELECT *
                            FROM `sk_bebas_ukt` 
                            JOIN `jadwal_bebas_ukt`ON `sk_bebas_ukt`.`id_jadwal_bebas_ukt` = `jadwal_bebas_ukt`.`id_jadwal_bebas_ukt`
                            JOIN `bebas_ukt` ON `jadwal_bebas_ukt`.`id_jadwal_bebas_ukt` = `bebas_ukt`.`id_jadwal_bebas_ukt`
                            JOIN `data_mahasiswa` ON `bebas_ukt`.`nim` = `data_mahasiswa`.`nim`
                            JOIN `prodi` ON `data_mahasiswa`.`kode_prodi` = `prodi`.`kode_prodi`
                            JOIN `fakultas` ON `data_mahasiswa`.`kode_fak` = `fakultas`.`kode_fak`
                            WHERE `sk_bebas_ukt`.`id_sk`=$id_sk and `bebas_ukt`.`usul_bebas_ukt`=2 and `bebas_ukt`.`validasi_bebas_ukt`=1
                            ORDER BY `bebas_ukt`.`nim`
                            ";
        $detail = $this->db->query($penetapan)->result_array();
        ?>

        <?php
        $id_sk_ok = $penerima_ok['id_sk'];
        $penetapan_ok = "SELECT *
                            FROM `sk_bebas_ukt` 
                            JOIN `jadwal_bebas_ukt`ON `sk_bebas_ukt`.`id_jadwal_bebas_ukt` = `jadwal_bebas_ukt`.`id_jadwal_bebas_ukt`
                            JOIN `bebas_ukt` ON `jadwal_bebas_ukt`.`id_jadwal_bebas_ukt` = `bebas_ukt`.`id_jadwal_bebas_ukt`
                            JOIN `data_mahasiswa` ON `bebas_ukt`.`nim` = `data_mahasiswa`.`nim`
                            JOIN `prodi` ON `data_mahasiswa`.`kode_prodi` = `prodi`.`kode_prodi`
                            JOIN `fakultas` ON `data_mahasiswa`.`kode_fak` = `fakultas`.`kode_fak`
                            WHERE `sk_bebas_ukt`.`id_sk`=$id_sk_ok and `bebas_ukt`.`usul_bebas_ukt`=2 and `bebas_ukt`.`status_sk`=0 and `bebas_ukt`.`validasi_bebas_ukt`=1
                            ORDER BY `bebas_ukt`.`nim`
                            ";
        $detail_ok = $this->db->query($penetapan_ok)->result_array();
        ?>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <strong>TAMBAH PENERIMA PEMBEBASAN UKT/SPP</strong>
            </div>
            <div class="card-body">
                <table width=80%>
                    <tr>
                        <td>Nomor SK</td>
                        <td>:</td>
                        <td><?= $penerima['no_sk'] ?></td>
                    </tr>
                    <tr>
                        <td>Semester Penetapan</td>
                        <td>:</td>
                        <td><?= $penerima['judul_sk'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal SK</td>
                        <td>:</td>
                        <td><?= format_indo($penerima['tgl_sk']) ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Pengusul</td>
                        <td>:</td>
                        <td class="badge badge-primary"><strong><?php echo $jumlah_pengusul ?></strong> orang</td>
                    </tr>
                    <tr>
                        <td>Jumlah Ditetapkan</td>
                        <td>:</td>
                        <td class="badge badge-success"><strong><?php echo $jumlah_ditetapkan ?></strong> orang</td>
                    </tr>
                </table>
                <hr>
                <div class="text-center">
                    <strong>Daftar Nama Mahasiswa Pengusul Bantuan Pembebasan UKT/SPP</strong>
                </div>
                <table id="example2" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Fakultas</th>
                            <th>Jumlah UKT/SPP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($detail)) : ?>
                            <tr>
                                <td colspan="7">
                                    <div class="text-center alert-warning">
                                        Semua mahasiswa yang mengajukan sudah ditambahkan!
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($detail as $v) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><b><?= $v['nim']; ?></b><br>
                                </td>
                                <td class="">
                                    <?= $v['nama']; ?>
                                </td>
                                <td>
                                    <?= $v['nama_prodi']; ?>
                                </td>
                                <td>
                                    <?= $v['nama_fak']; ?> </td>
                                <td class="text-right">
                                    <?= 'Rp ' . rupiah($v['jumlah_ukt']); ?> </td>
                                <td class="text-center">
                                    <?php if ($v['status_sk'] == 0) { ?>
                                        <form action="<?= base_url() ?>ukt/tambah_penetapan_4/<? encrypt_url($v['id_sk']); ?>)" method="POST">
                                            <input type="hidden" class="form-control" id="nim" name="nim" value="<?= $v['nim']; ?>">
                                            <input type="hidden" class="form-control" id="id_sk" name="id_sk" value="<?= $v['id_sk']; ?>">
                                            <input type="hidden" class="form-control" id="status_sk" name="status_sk" value="1">
                                            <input type="hidden" class="form-control" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt" value="<?= $v['id_jadwal_bebas_ukt']; ?>">
                                            <button type="submit" class="btn btn-info btn-sm btn-block"><i class="fas fa-check"></i>Ajukan</button>
                                        </form>
                                    <?php } else { ?>
                                        <i>Sudah diajukan!</i>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div>
                    <small>Warning : Klik tombol KIRIM PENETAPAN hanya apabila Saudara telah selesai mengajukan penerima.</small>
                </div>
                <?php if (!empty($detail_ok)) { ?>
                    <div class="text-center alert-warning">
                    </div>
                <?php } else { ?>
                    <form action="<?= base_url() ?>ukt/finalisasi_penetapan/<? encrypt_url($v['id_sk']); ?>)" method="POST">
                        <input type="hidden" class="form-control" id="id_sk" name="id_sk" value="<?= $penerima['id_sk'] ?>">
                        <input type="hidden" class="form-control" id="status_sk" name="status_sk" value="1">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check"></i> KIRIM PENETAPAN</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
    </div>