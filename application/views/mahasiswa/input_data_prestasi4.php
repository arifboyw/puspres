<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title"><strong>K O N F I R M A S I</strong></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    Data usulan prestasi mandiri Saudara telah disimpan, silahkan klik tombol Konfirmasi untuk memproses usulan ke bagian Kemahasiswaan fakultas Saudara.
                    <!-- /.container-fluid -->
                    <form action="<?= base_url() ?>kompetisi/tambah_prestasi5/<?= $mhs->id_mhs_kompetisi ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_mhs_kompetisi" name="id_mhs_kompetisi" value="<?= $mhs->id_mhs_kompetisi ?>">
                            <input type="hidden" class="form-control" id="konfirmasi" name="konfirmasi" value="1">
                            <br>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> KONFIRMASI</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End of Main Content -->
            </div>
        </div>