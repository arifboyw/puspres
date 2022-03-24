<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?= form_error('fileinfo', '<h5 class="text-danger pl-3">', '</h5>'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <?php if ($user['role_id'] == 1) {  ?>
                    <div class="text-right">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash" disable></i></i></a>
                    </div>
                <?php } else { ?>
                <?php } ?>

                <form action="<?= base_url() ?>informasi/update_konfirmasi/<?= encrypt_url($detail_informasi->id_info) ?>" method="POST">
                    <input type="hidden" id="tgl_posting" name="tgl_posting" value="<?= $hari_ini ?>">
                    <input type="hidden" id="id_info" name="id_info" value="<?= $detail_informasi->id_info ?>">
                    <label for="judul">Judul Informasi :</label>
                    <input class="form-control" type="text" id="judul" name="judul" value="<?= $detail_informasi->judul ?>">
                    <br>
                    <label for="status_posting">Status :</label>
                    <select class="form-control" id="status_posting" name="status_posting">
                        <option value="1" <?php if ($detail_informasi->status_posting == "1") {
                                                echo "selected";
                                            } ?>>Publish</option>
                        <option value="0" <?php if ($detail_informasi->status_posting == "0") {
                                                echo "selected";
                                            } ?>>Unpublish</option>
                    </select>
                    <br>
                    <label for="info_singkat">Informasi Singkat :</label>
                    <textarea class="form-control" id="ckeditor" name="info_singkat" rows="2"><?= $detail_informasi->info_singkat ?></textarea>
                    <br>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-edit"></i> Update Informasi
                            </button>
                        </div>
                </form>
                <div class="col-3">
                    <button class="btn btn-warning btn-block" onclick="window.location.assign('<?= base_url(); ?>informasi/daftar_informasi')">
                        <i class="fas fa-hand-point-left"></i> Kembali
                    </button>
                </div>
            </div>
            <hr>
            <p class="text-primary"><strong>
                    Silahkan klik Update File Informasi baru untuk mengupload file informasi yang baru, setelah itu klik tombol Upload.</strong>
            </p>
            <?php echo form_open_multipart('informasi/update_file'); ?>
            <div class="row">
                <div class="text-center col-8"><object data="<?= base_url('assets/upload/info/') . $detail_informasi->nama_berkas ?>" width="700" height="500"></object>
                </div>
                <div class="custom-file col-4">
                    <input type="hidden" id="id_info" name="id_info" value="<?= $detail_informasi->id_info ?>">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fileinfo" name="fileinfo" required>
                        <label class="custom-file-label" for="fileinfo">Choose file</label>
                        <?php if ($user['role_id'] == 1) {  ?>
                            <div class="mt-2 text-right">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        <?php } else { ?>
                            <div class="mt-2 text-right">
                                <button type="submit" class="btn btn-primary" disabled>Upload</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Anda yakin informasi ini?</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Keterangan : <strong><?= $detail_informasi->judul ?></strong></div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" data-dismiss="modal"><i class="fas fa-hand-point-left"></i> Batal</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>informasi/hapus_informasi/<?= encrypt_url($detail_informasi->id_info); ?>"><i class="fas fa-trash"></i></i> Delete</a>
                </div>
            </div>
        </div>
    </div>