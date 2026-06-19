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
            <a href="<?= BASEURL; ?>/SignIn" class="text-ungu text-decoration-none"><i class="bi bi-bookmark-plus"></i> Registrasi Aplikasi</a>
        </h4>
        <!-- Form Login -->
        <form action="<?= BASEURL; ?>/SignIn/doRegistrasiKaryawan" method="post">
            <!-- Nama Lengkap -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person-check text-ungu"></i></span>
                <input name="nama_depan" id="nama_depan" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Nama Depan" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person-check text-ungu"></i></span>
                <input name="nama_belakang" id="nama_belakang" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Nama Belakang" required>
            </div>
            <!--Username-->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person text-ungu"></i></span>
                <input name="username" id="username" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Username" required>
            </div>
            <!-- Password -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock text-ungu"></i></span>
                <input name="password_awal" id="password_awal" type="password" class="form-control form-control-sm form-loginsatu " placeholder="Password" required>
            </div>
            <!-- Ulangi Password -->
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock-fill text-ungu"></i></span>
                <input name="password_ulang" id="password_ulang" type="password" class="form-control form-control-sm form-loginsatu" placeholder="Ulangi Password" required>
            </div>
            <!-- Tombol Login -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-ungu btn-sm d-flex align-items-center justify-content-center">
                    <i class="bi bi-bookmark-plus me-2"></i> Daftar
                </button>
            </div>
        </form>
        <!-- Links -->
        <div class="d-flex justify-content-between mb-4">
            <a href="<?= BASEURL; ?>/SignIn" class="small text-decoration-none text-ungu"><i class="bi bi-reply me-2"></i>Kembali</a>
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
<!--java script tambahan akuuu-->
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
<!--java script tambahan akuuu-->
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
</body>
</html>