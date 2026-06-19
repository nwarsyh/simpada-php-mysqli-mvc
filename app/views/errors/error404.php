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
    <!--style tambahan atau yang dikostum sendiri-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyledark.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/login.css" type="text/css">
</head>
<body class="error-page">
<div class="error-card">
    <div class="error-code">404</div>
    <h2 class="error-message">Oops! Halaman yang kamu cari tidak ditemukan.</h2>
    <p class="mb-4">Mungkin link salah ketik, atau halaman sudah dipindahkan.</p>
    <div>
        <a href="<?= BASEURL; ?>/Admin" class="btn btn-ungu error-btn">
            <i class="fas fa-home me-1"></i> Dashboard
        </a>
        <a href="javascript:history.back()" class="btn btn-light error-btn">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>
<!--javascript bootstrap-->
<script src="<?= ASSET_URL; ?>/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!--untuk dua dibawah ini usahakan tetap berada paling bawah, diatas adalah library"-->
<!--javascript dari sb admin-->
<script src="<?= ASSET_URL; ?>/vendor/sb-admin/js/scripts.js"></script>
<!--java script tambahan akuuu-->
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
</body>
</html>