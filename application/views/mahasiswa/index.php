<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/vendor/dist/img/') . $user['image']; ?>" alt="User profile picture">
                                    <!-- <img class="card-img" src="<?= base_url('assets/vendor/dist/img/') . $user['image']; ?>" alt="Card image cap"> -->

                                </div>

                                <h3 class="profile-username text-center"><?= $detail->nama ?></h3>

                                <p class="text-muted text-center">NIM : <?= $detail->nim ?></p>

                                <a href="<?= base_url() ?>kompetisi/daftar_prestasi" class="btn btn-outline-primary btn-block"><b>Detail Prestasi</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Pendidikan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Program Studi</strong><br>
                                <?= $detail->nama_prodi ?><br><br>
                                <strong><i class="fas fa-book-open mr-1"></i> Fakultas</strong><br>
                                <?= $detail->nama_fak ?>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Kampus Utama</strong>

                                <p class="text-muted">Jalan Prof. Dr. Hamka Air Tawat Barat Kota Padang</p>
                                <hr>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Rekap Prestasi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Update Profil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Password</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box bg-gradient-info">
                                                    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Universitas</span>
                                                        <span class="info-box-number"><?php echo $universitas ?></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box bg-gradient-success">
                                                    <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Provinsi</span>
                                                        <span class="info-box-number"><?php echo $provinsi ?></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box bg-gradient-warning">
                                                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                                                    <div class="info-box-content">
                                                        <span class="info-box-text">Regional</span>
                                                        <span class="info-box-number"><?php echo $regional ?></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box bg-gradient-danger">
                                                    <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text"><strong>Nasional</strong></span>
                                                        <span class="info-box-number"><?php echo $nasional ?></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-12">
                                                <div class="info-box bg-gradient-warning">
                                                    <span class="info-box-icon"><i class="fas fa-comments"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-text"><strong>Internasional</strong></span>
                                                        <span class="info-box-number"><?php echo $internasional ?></span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->

                                        </div>


                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="">
                                            <!-- timeline item -->
                                            <div>
                                                <div>
                                                    <?= form_open_multipart('mahasiswa/edit'); ?>
                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-2">
                                                            <b>Picture</b>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <img src="<?= base_url('assets/vendor/dist/img/') . $user['image']; ?>" class="img-thumbnail">
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-end">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </div>

                                                    </form>

                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form action="<?= base_url('mahasiswa/changepassword'); ?>" method="post">

                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password">
                                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="new_password1">New Password</label>
                                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>

                                            </div>
                                            <div class="form-group">
                                                <label for="new_password2">Repeat Password</label>
                                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>

                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Change Password</button>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    </div>
    </div>