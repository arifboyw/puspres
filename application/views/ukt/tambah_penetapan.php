<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <?php
        $hari_ini = date("Y-m-d");

        ?>

        <div class="card card-primary card-outline">
            <div class="card-header">
                Tambah data penetapan penerima pembebasan UKT/SPP
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" action="<?= base_url('ukt/tambah_penetapan_2'); ?>" method="POST">
                    <div class="mb-3 row">
                        <label for="ttd" class="col-sm-3 col-form-label">Semester Penetapan</label>
                        <div class="col-sm-3">
                            <select class="form-control mb-3" id="id_jadwal_bebas_ukt" name="id_jadwal_bebas_ukt" required>
                                <option value="">Pilih Semester Penetapan</option>
                                <?php foreach ($jadwal_bebas_ukt as $row) : ?>
                                    <option value="<?php echo $row->id_jadwal_bebas_ukt; ?>"><?php echo $row->nama_semester; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_sk" class="col-sm-3 col-form-label">Nomor SK</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" id="no_sk" name="no_sk" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul_sk" class="col-sm-3 col-form-label">Judul SK</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="judul_sk" name="judul_sk" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_sk" class="col-sm-3 col-form-label">Tanggal Penetapan</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="date" id="tgl_sk" name="tgl_sk" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ttd" class="col-sm-3 col-form-label">Penandatangan</label>
                        <div class="col-sm-3">
                            <select class="form-control" aria-label="Default select example" id="ttd" name="ttd" required>
                                <option value="" selected>Pilih Penandatangan</option>
                                <option value="Rektor">Rektor</option>
                                <option value="Wakil Rektor I">Wakil Rektor I</option>
                                <option value="Wakil Rektor II">Wakil Rektor II</option>
                                <option value="Wakil Rektor III">Wakil Rektor III</option>
                                <option value="Wakil Rektor IV">Wakil Rektor IV</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="filesk" class="col-sm-3 col-form-label">Upload File</label>
                        <div class="col-sm-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="filesk" name="filesk" required>
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="mt-4 col-6">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save fa-lg"></i> Simpan</button>
                        </div>
                        <div class="mt-4 col-6">
                            <a type="button" class="btn btn-warning btn-block" href="<?= base_url() ?>ukt/penetapan"><i class="far fa-hand-point-left fa-lg"></i> Kembali</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- End of Main Content -->
    </div>
    </div>