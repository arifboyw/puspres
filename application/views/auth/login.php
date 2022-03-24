<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PusPres UNP</title>
    <style>
        body {
            background-image: url("<?= base_url(); ?>assets/img/5156620.jpg");
            background-size: 1180px 620px;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center mt-3">
                <img src="<?= base_url(); ?>assets/vendor/dist/img/unp.png" alt="KIPK Logo" class="brand-image img-circle bg-white elevation-3" height="70" width="75">
                <h1><b>Pusat Prestasi 2</b></h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Login</p>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('auth') ?>">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/vendor//plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/vendor//plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/vendor//dist/js/adminlte.min.js"></script>
</body>

</html>