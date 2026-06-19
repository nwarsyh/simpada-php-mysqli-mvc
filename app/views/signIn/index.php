<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $dataSimpanPinjam['JudulWeb']; ?></title>
    <meta name="title" content="<?= $dataSimpanPinjam['JudulWeb']; ?>" />
    <!--Jenis Font Yang digunakan-->
    <!--Jenis Font Yang digunakan-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!--Style untuk Bootstrap Icon-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/bootsrap-icon/bootstrap-icons.css" type="text/css">
    <!--untuk dua dibawah ini usahakan tetap berada paling bawah, diatas adalah library"-->
    <!--Koneksi Link ke Library Sweet ALert-->
    <script src="<?= ASSET_URL; ?>/vendor/sweetalert/sweetalert2@11.js"></script>
    <!--style tambahan atau yang dikostum sendiri-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyledark.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/login.css" type="text/css">
</head>
<body class="login-formsatu">
<?php Flasher::flasherToast(); ?>
<div class="card login-cardsatu">
    <div class="card-body p-4">
        <!-- Judul -->
        <h4 class="text-center  mb-4">
            <a href="<?= BASEURL; ?>/SignIn" class="text-ungu text-decoration-none"><i class="bi bi-box-arrow-in-right"></i> Login Aplikasi</a>
        </h4>
        <!-- Form Login -->
        <form action="<?= BASEURL; ?>/SignIn/doSignInKaryawan" method="post">
            <!-- Username -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person text-ungu"></i></span>
                <input name="username" id="username" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Username" required>
            </div>
            <!-- Password -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock text-ungu"></i></span>
                <input name="password" id="password" type="password" class="form-control form-control-sm form-loginsatu " placeholder="Password" required>
            </div>
            <!-- Tombol Login -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-ungu btn-sm d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                </button>
            </div>
        </form>
        <!-- Links -->
        <div class="d-flex justify-content-between mb-4">
            <a href="<?= BASEURL; ?>/signin/registerform" class="small text-decoration-none text-primary">Belum Punya Akun ?</a>
            <a href="#" class="small text-decoration-none text-danger">Forgot Password ?</a>
        </div>
    </div>
    <footer class="text-center mt-4 text-muted small">
        &copy; 2025 Anwarsyah. All rights reserved. | v1.0
    </footer>
</div>
<!--javascript bootstrap-->
<script src="<?= ASSET_URL; ?>/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!--untuk dua dibawah ini usahakan tetap berada paling bawah, diatas adalah library"-->
<!--javascript dari sb admin-->
<script src="<?= ASSET_URL; ?>/vendor/sb-admin/js/scripts.js"></script>
<!--koneksi ke demo sweet alert-->
<script src="<?= ASSET_URL; ?>/mystyle/js/sweetalert.js"></script>
<!--java script tambahan akuuu-->
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
</body>
</html>