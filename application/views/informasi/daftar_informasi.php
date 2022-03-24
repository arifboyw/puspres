<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th width="30">No.</th>
                            <th>Judul</th>
                            <th>Info Singkat</th>
                            <th width="75">File Info</th>
                            <th width="100">Tanggal Posting</th>
                            <th width="100">Status Posting</th>
                            <th width="75">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($daftar_informasi)) : ?>
                            <tr>
                                <td colspan="6">
                                    <div class="text-center">
                                        Data tidak ditemukan! <a href="<?= base_url('informasi/tambah_informasi') ?>">Tambah Informasi?</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $i = 1; ?>
                        <?php
                        foreach ($daftar_informasi as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td><?php echo $r->judul; ?></td>
                                <td><?php echo word_limiter($r->info_singkat, 10); ?></td>
                                <td class="text-center"><a href="<?= base_url(); ?>informasi/download_file_info/<?php echo $r->id_info; ?>">Download</a></td>
                                <td class="text-center"><?php echo format_indo($r->tgl_posting); ?></td>
                                <td class="text-center">
                                    <?php if ($r->status_posting == 1) { ?>
                                        Publish
                                    <?php } elseif ($r->status_posting == 0) { ?>
                                        Unpublish
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url() ?>informasi/detail_informasi/<?= encrypt_url($r->id_info); ?>"><i class="fa fa-search text-success text-lg"></i></a>
                                    <?php if ($user['role_id'] == 1) {  ?>
                                        <a href="<?= base_url() ?>informasi/update_informasi/<?= encrypt_url($r->id_info); ?>"><i class="fa fa-edit text-warning text-lg"></i></a>
                                    <?php } else { ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>