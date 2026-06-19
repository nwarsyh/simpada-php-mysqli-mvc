<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $dataSimpanPinjam['JudulWeb']; ?></title>
    <meta name="title" content="<?= $dataSimpanPinjam['JudulWeb']; ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="<?= ASSET_URL; ?>/vendor/sb-admin/js/scripts.js"></script>
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
</body>
</html>