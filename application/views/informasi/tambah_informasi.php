<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");
        ?>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <form enctype="multipart/form-data" class="form-group" action="<?= base_url('informasi/tambah_informasi') ?>" method="POST">
                    <input type="hidden" id="tgl_posting" name="tgl_posting" value="<?= $hari_ini ?>" required>
                    <div class="form-group">
                        <label for="judul">Judul Informasi : </label>
                        <input class="form-control" type="text" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="info_singkat">Informasi Singkat :</label>
                        <textarea class="form-control" id="ckeditor" name="info_singkat" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="judul">Status Posting :</label>
                        <select class="form-control" id="status_posting" name="status_posting" required>
                            <option value="">-----</option>
                            <option value="1">Publish</option>
                            <option value="0">Unpublish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fileinfo">Upload File Informasi <small class="text-red">format PDF</small></label>:
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileinfo" name="fileinfo" required>
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group text-sm-right">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>