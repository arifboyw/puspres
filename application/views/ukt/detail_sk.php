<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5>Detail SK Penetapan Penerima Bantuan Pembebasan UKT/SPP Universitas Negeri Padang</h5>
                        <hr>
                        <table class="table table-sm mb-0 table-borderless table-striped">
                            <tr>
                                <td class="font-weight-bold">Penjadwalan Seleksi</td>
                                <td class="text-right">:</td>
                                <td>Jadwal dibuka pada <b><?= format_indo($detail_sk->mulai_jadwal); ?></b>
                                    dan ditutup pada <b><?= format_indo($detail_sk->deadline_jadwal); ?></b></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nomor Surat Keputusan</td>
                                <td class="text-right">:</td>
                                <td><?= $detail_sk->no_sk ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Semester Penetapan</td>
                                <td class="text-right">:</td>
                                <td><?php echo $detail_sk->nama_semester ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tanggal Penetapan</td>
                                <td class="text-right">:</td>
                                <td><?php echo format_indo($detail_sk->tgl_sk) ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Perihal</td>
                                <td class="text-right">:</td>
                                <td><?= $detail_sk->judul_sk ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Penandatangan</td>
                                <td class="text-right">:</td>
                                <td><?= $detail_sk->ttd ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Jumlah Penerima</td>
                                <td class="text-right">:</td>
                                <td><b><?= $jumlah_diterima ?> orang</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5>Daftar Penerima</h5>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama/NIM/Program Studi/Fakultas</th>
                                    <th>Uraian</th>
                                    <th>Semester dibebaskan UKT/SPP</th>
                                    <th>Detail Prestasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($daftar_diterima)) : ?>
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
                                foreach ($daftar_diterima as $v) : ?>
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
                                            pada tanggal <?php echo format_indo($v->jadwal_kegiatan); ?><br>
                                            Tingkat Kegiatan : <b><?php echo $v->nama_level; ?></b>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $v->nama_semester_bu; ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url() ?>ukt/detail_prestasi/<?= encrypt_url($v->id_mhs_kompetisi); ?>" target="_blank"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5>Preview SK</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center"><object data="<?= base_url(); ?>/assets/upload/sk/<?= $detail_sk->nama_berkas; ?>" width="999" height="500"></object>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary btn-block" onclick="window.location.assign('<?= base_url(); ?>ukt/penetapan')">
                    <i class="fas fa-hand-point-left"></i> Kembali
                </button>
            </div>
        </div>
    </div>
    </div>