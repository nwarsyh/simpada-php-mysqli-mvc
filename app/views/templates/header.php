<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <title><?= $dataSimpanPinjam['JudulWeb']; ?></title>
    <meta name="title" content="<?= $dataSimpanPinjam['JudulWeb']; ?>" />
    <!-- Style Untuk Bootstrap -->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!--Style untuk Bootstrap Icon-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/bootsrap-icon/bootstrap-icons.css" type="text/css">
    <!--untuk dua dibawah ini usahakan tetap berada paling bawah, diatas adalah library"-->

    <!--style untuk datatable-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/dataTables/dataTables_css.css" type="text/css">
    <!--Koneksi Link ke Library Sweet ALert-->
    <script src="<?= ASSET_URL; ?>/vendor/sweetalert/sweetalert2@11.js"></script>
    <!--style dari sb_admin-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/sb-admin/css/styles.css" type="text/css">
    <!--style tambahan atau yang dikostum sendiri-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/mystyledark.css" type="text/css">
    <!--Tambahan khusus siaplikasi-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/mystyle/css/added.css" type="text/css">
</head>
<body class="sb-nav-fixed">
<?php Flasher::flasherToast(); ?>
<?php
$roleUser = $_SESSION['role_accounts'];
?>
<!--START bagian brand sebelah kiri atas-->
<nav class="sb-topnav navbar navbar-expand shadow-lg">
    <div class="container-fluid">
        <!-- Navbar Brand -->
        <?php
        $roleUser = $_SESSION['role_accounts'];
        ?>
        <?php if($roleUser == 'Admin'): ?>
        <a class="navbar-brand px-3 d-flex align-items-center" href="<?= BASEURL; ?>/Admin">
            <i class="bi bi-emoji-wink me-1 rotate-n-15"></i>
            SIMPADA<sup>*</sup>
        </a>
        <?php endif; ?>
        <?php if($roleUser == 'Arsiparis'): ?>
            <a class="navbar-brand px-3 d-flex align-items-center" href="<?= BASEURL; ?>/Arsiparis">
                <i class="bi bi-emoji-wink me-1 rotate-n-15"></i>
                SIMPADA<sup>*</sup>
            </a>
        <?php endif; ?>
        <?php if($roleUser == 'Staff'): ?>
            <a class="navbar-brand px-3 d-flex align-items-center" href="<?= BASEURL; ?>/Staff">
                <i class="bi bi-emoji-wink me-1 rotate-n-15"></i>
                SIMPADA<sup>*</sup>
            </a>
        <?php endif; ?>
        <!--END bagian brand sebelah kiri atas-->
        <!--START bagian SWICTH, MENU dan CARI-->
        <!-- Sidebar Toggle + Search -->
        <div class="d-flex align-items-center">
            <!-- Sidebar Toggle -->
            <button class="btn btn-link btn-sm" id="themeToggle">
                <i class="bi bi-moon"></i>
            </button>
            <button class="btn btn-link btn-sm" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <!--END bagian SWICTH, MENU dan CARI-->
        <!--START bagian PESAN, NOTIF, MENU USER-->
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto me-3 d-flex align-items-center">
                <?php if(in_array ($roleUser, ['Admin', 'Arsiparis'])): ?>
                    <!-- bagian Pesan masa retensi-->
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" id="msgDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-envelope headermenu"></i>
                            <span class="position-absolute top-2 start-100 translate-middle badge rounded-pill bg-ungu"><?= $dataSimpanPinjam['dataJmlMelewatiRetensi']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="msgDropdown" style="width: 320px;">
                            <li class="px-3 py-2 border-bottom"><strong>Pesan Retensi</strong></li>
                            <?php foreach ($dataSimpanPinjam['dataMelewatiRetensi'] as $dataMelewatiRetensi): ?>
                            <li class="px-3 py-2 d-flex align-items-start">
                                <a href="<?= BASEURL?>/Dokumen" class="dropdown-item">
                                    <strong><?= $dataMelewatiRetensi['nomor_dokumen']; ?></strong>
                                    <p>melewati masa retensi selama<br>
                                        <strong class="text-danger"><?= $dataMelewatiRetensi['melewatiretensi']; ?> hari</strong></p>
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li class="text-center"><a href="#" class="dropdown-item text-ungu">Lihat semua pesan</a></li>
                        </ul>
                    </li>
                <!-- bagian Notifications Masa Retensi-->
                <li class="nav-item dropdown me-3">
                    <a class="nav-link position-relative" href="#" id="notifDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell-slash headermenu"></i>
                        <span class="position-absolute top-2 start-100 translate-middle badge rounded-pill bg-danger"><?= $dataSimpanPinjam['dataJmlMemasukiRetensi']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="notifDropdown" style="width: 300px;">
                        <li class="px-3 py-2 border-bottom"><strong>Notifikasi Retensi</strong></li>
                        <?php foreach ($dataSimpanPinjam['dataMemasukiRetensi'] as $dataMemasukiRetensi):
                        if ($dataMemasukiRetensi['memasukiretensi'] <= 7) {
                            $WarnaIcon = 'bg-danger';
                        } elseif ($dataMemasukiRetensi['memasukiretensi'] <= 14) {
                            $WarnaIcon = 'bg-warning';
                        } else {
                            $WarnaIcon = 'bg-primary';
                        }
                        ?>
                            <li class="px-3 py-2 d-flex align-items-start">
                                <a href="<?= BASEURL?>/Dokumen" class="dropdown-item">
                                    <strong><?= $dataMemasukiRetensi['nomor_dokumen']; ?></strong>
                                    <p>Memasuki masa retensi dalam<br>
                                        <strong class="text-danger"><?= $dataMemasukiRetensi['memasukiretensi']; ?> hari</strong></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li><hr class="dropdown-divider"></li>
                        <li class="text-center"><a href="#" class="dropdown-item text-ungu">Lihat semua notifikasi</a></li>
                    </ul>
                </li>
                    <!-- bagian Notifications Peminjaman-->
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" id="notifDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell headermenu"></i>
                            <span class="position-absolute top-2 start-100 translate-middle badge rounded-pill bg-warning"><?= $dataSimpanPinjam['dataJmldataTelambat']; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="notifDropdown" style="width: 300px;">
                            <li class="px-3 py-2 border-bottom"><strong>Notifikasi Peminjaman</strong></li>
                                <?php foreach ($dataSimpanPinjam['dataTelambat'] as $dataTerlambat) : ?>
                                <?php
                                $selisihAwal  = new DateTime($dataTerlambat['tgl_peminjaman']);
                                $selisihAkhir  = new DateTime(date('Y-m-d'));
                                $Keterlambatan = $selisihAwal->diff($selisihAkhir)->days;
                                ?>
                                    <li class="px-3 py-2 d-flex align-items-start">
                                        <img src="<?= BASEURL?>/public/media/profil/<?= $dataTerlambat['foto_profil_karyawan']; ?>" class="rounded-circle me-2" width="40" height="40">
                                        <div>
                                            <small>Oleh : <?= $dataTerlambat['nama_depan_karyawan']; ?> <?= $dataTerlambat['nama_belakang_karyawan']; ?></small><br>
                                            <small>Dok : <?= $dataTerlambat['nomor_dokumen']; ?></small><br>
                                            <small style="font-weight: bold; font-style: italic; color: red;">Pengembalian Terlambat</small><br>
                                            <small>Rencana : <?= FormatDate($dataTerlambat['tgl_rencana_pengembalian']); ?></small><br>
                                            <small style="font-weight: bold; font-style: italic; color: red;">Keterlambatan : <?= $Keterlambatan; ?> hari</small>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                            <li><hr class="dropdown-divider"></li>
                            <li class="text-center"><a href="<?= BASEURL; ?>/Peminjaman" class="dropdown-item text-ungu">Lihat semua notifikasi</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center" id="navbarDropdown"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-lg-inline small headermenu"><?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']; ?></span>
                        <img class="rounded-circle" src="<?= BASEURL?>/public/media/profil/<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']; ?>" alt="profile" width="32" height="32">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="navbarDropdown">
                        <li class="px-3 py-2 text-center border-bottom">
                            <img src="<?= BASEURL?>/public/media/profil/<?= $dataSimpanPinjam['userAktifNow']['foto_profil_karyawan']; ?>" class="rounded-circle mb-2" width="60" height="60">
                            <h6 class="mb-0"><?= $dataSimpanPinjam['userAktifNow']['nama_depan_karyawan']; ?> <?= $dataSimpanPinjam['userAktifNow']['nama_belakang_karyawan']; ?></h6>
                            <small class="text-muted"><?= $dataSimpanPinjam['userAktifNow']['nip_karyawan']; ?></small>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center" href="<?= BASEURL; ?>/Profil"><i class="bi bi-person me-2 text-primary"></i> Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--END bagian PESAN, NOTIF, MENU USER-->
    </div>
</nav>