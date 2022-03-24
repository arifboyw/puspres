<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5>REKAPITULASI PRESTASI MENURUT TINGKAT KEGIATAN</h5>
                <hr>
                <form action="<?= base_url('pendataan/tampil_per_kegiatan/'); ?>" method="GET">
                    <table width="40%">
                        <tr>
                            <td>
                                <div class="mb-3">Pilih Tahun</div>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="tahun_kegiatan" name="tahun_kegiatan">
                                    <option value="">Tampilkan Semua</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-search"></i>Tampilkan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5>REKAPITULASI PRESTASI MENURUT FAKULTAS</h5>
                <hr>
                <form action="<?= base_url('pendataan/tampil_menurut_fakultas/'); ?>" method="GET">
                    <table width="40%">
                        <tr>
                            <td>
                                <div class="mb-3">Pilih Tahun</div>
                            </td>
                            <td>
                                <select class="form-control mb-3" id="tahun_kegiatan" name="tahun_kegiatan">
                                    <option value="">Tampilkan Semua</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-block mb-3"><i class="fa fa-search"></i>Tampilkan</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->