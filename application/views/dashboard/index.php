<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg">

                <!-- /.card-footer -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5><strong><?= $user['name']; ?></strong></h5>
                                <p class="mb-0">Selamat Datang pada Sistem Informasi Pusat Prestasi Universitas Negeri Padang.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <table id="example2" class="table table-sm table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                <h5><b>Informasi Terbaru</b></h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($daftar_informasi)) : ?>
                                            <tr>
                                                <td colspan="2">
                                                    <div>
                                                        -
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $i = 1; ?>
                                        <?php
                                        foreach ($daftar_informasi as $r) : ?>
                                            <tr>
                                                <td class="text-center" width="30"><?= $i; ?></td>
                                                <td class="text-justify">
                                                    <strong class="text-primary"><?php echo $r->judul; ?></strong>
                                                    <small><i>Tanggal Publish : <?= format_indo($r->tgl_posting) ?></i></small><br>
                                                    <?php echo word_limiter($r->info_singkat, 8); ?> <a href="<?= base_url() ?>dashboard/detail_informasi/<?= encrypt_url($r->id_info); ?>" class="badge badge-warning badge-lg">Read More</a>
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
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>