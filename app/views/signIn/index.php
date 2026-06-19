<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $dataSimpanPinjam['JudulWeb']; ?></title>
    <meta name="title" content="<?= $dataSimpanPinjam['JudulWeb']; ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.22.1/dist/sweetalert2.all.min.js "></script>
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/sb-admin/css/styles.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyledark.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/login.css" type="text/css">
</head>
<body class="login-formsatu">
<?php Flasher::flasherToast(); ?>
<div class="card login-cardsatu">
    <div class="card-body p-4">
        <h4 class="text-center  mb-4">
            <a href="<?= BASEURL; ?>/SignIn" class="text-ungu text-decoration-none"><i class="bi bi-box-arrow-in-right"></i> Login SIMPADA</a>
        </h4>
        <form action="<?= BASEURL; ?>/SignIn/doSignInKaryawan" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-person text-ungu"></i></span>
                <input name="username" id="username" type="text" class="form-control form-control-sm form-loginsatu" placeholder="Username" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-lock text-ungu"></i></span>
                <input name="password" id="password" type="password" class="form-control form-control-sm form-loginsatu " placeholder="Password" required>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-ungu btn-sm d-flex align-items-center justify-content-center">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                </button>
            </div>
        </form>
    </div>
    <footer class="text-center mt-4 text-muted small">
        <span>Copyright &copy; 2026 SIMPADA By
            <a href="https://github.com/nwarsyh" target="_blank" class="text-decoration-none">Anwarsyah</a>
        </span>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="<?= ASSET_URL; ?>/vendor/sb-admin/js/scripts.js"></script>
<script src="<?= ASSET_URL; ?>/mystyle/js/sweetalert.js"></script>
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
</body>
</html>