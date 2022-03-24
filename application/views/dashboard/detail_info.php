<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="text-center text-primary"><b><?= $detail_informasi->judul ?></b></h5>
                <div class="text-center"><small> <?php if ($detail_informasi->status_posting == 1) { ?>
                            Publish
                        <?php } elseif ($detail_informasi->status_posting == 0) { ?>
                            Unpublish
                        <?php } ?> pada Tanggal <?= format_indo($detail_informasi->tgl_posting) ?></small>
                </div>
                <hr>
                <p>
                    <?= $detail_informasi->info_singkat ?>
                </p>
                <hr>
                <div class="text-center"><object data="<?= base_url(); ?>/assets/upload/info/<?= $detail_informasi->nama_berkas; ?>" width="999" height="500"></object>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block" onclick="window.location.assign('<?= base_url(); ?>dashboard/user')">
                            <i class="fas fa-hand-point-left"></i> Kembali
                        </button>
                    </div>
                </div>

            </div>
        </div>