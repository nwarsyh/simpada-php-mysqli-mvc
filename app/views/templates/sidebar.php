<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav mt-3">
                    <?php
                    $roleUser = $_SESSION['role_accounts'];
                    ?>
                    <?php if($roleUser == 'Admin'): ?>
                    <div class="sb-sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="<?= BASEURL; ?>/Admin">
                        <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                        Dashboard
                    </a>
                    <?php endif; ?>
                    <?php if($roleUser == 'Arsiparis'): ?>
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="<?= BASEURL; ?>/Arsiparis">
                            <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                            Dashboard
                        </a>
                    <?php endif; ?>
                    <?php if($roleUser == 'Staff'): ?>
                        <div class="sb-sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="<?= BASEURL; ?>/Staff">
                            <div class="sb-nav-link-icon"><i class="bi bi-house"></i></div>
                            Dashboard
                        </a>
                    <?php endif; ?>
                    <hr class="anwar-separator anwar-separator-dot"/>
                    <?php if($roleUser == 'Admin'): ?>
                    <div class="sb-sidenav-menu-heading">Master</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#masterData" aria-expanded="false" aria-controls="myLibrary">
                        <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                        Master Data
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                    </a>
                    <div class="collapse" id="masterData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= BASEURL; ?>/Admin/Departemen"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Master Departemen</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Admin/Kategori"><div class="sb-nav-link-icon"><i class="bi bi-circle text-warning"></i></div>Master Kategori</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Admin/Lokasi"><div class="sb-nav-link-icon"><i class="bi bi-circle text-danger"></i></div>Master Lokasi</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Admin/Karyawan"><div class="sb-nav-link-icon"><i class="bi bi-circle text-info"></i></div>Master Karyawan</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Admin/Account"><div class="sb-nav-link-icon"><i class="bi bi-circle text-success"></i></div>Account</a>
                        </nav>
                    </div>
                    <hr class="anwar-separator anwar-separator-dot"/>
                    <?php endif; ?>
                    <?php if(in_array ($roleUser, ['Admin', 'Arsiparis'])): ?>
                    <div class="sb-sidenav-menu-heading">Arsip & Dokumen</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#masterArsip" aria-expanded="false" aria-controls="myLibrary">
                        <div class="sb-nav-link-icon"><i class="bi bi-journals"></i></div>
                        Arsip
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                    </a>
                    <div class="collapse" id="masterArsip" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= BASEURL; ?>/Dokumen"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Kelola Arsip</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Dokumen/LapDokumen"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Laporan Arsip</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#masterTransaksi" aria-expanded="false" aria-controls="myLibrary">
                        <div class="sb-nav-link-icon"><i class="bi bi-ui-radios-grid"></i></div>
                        Transaksi
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                    </a>
                    <div class="collapse" id="masterTransaksi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= BASEURL; ?>/Transaksi"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Kelola Peminjaman</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Transaksi/LapTransaksi"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Laporan Transaksi</a>
                        </nav>
                    </div>
                    <?php endif; ?>
                    <?php if(in_array ($roleUser, ['Admin', 'Arsiparis', 'Staff'])): ?>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#masterDokumen" aria-expanded="false" aria-controls="myLibrary">
                        <div class="sb-nav-link-icon"><i class="bi bi-list-columns"></i></div>
                        Peminjaman
                        <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down"></i></div>
                    </a>
                    <div class="collapse" id="masterDokumen" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= BASEURL; ?>/Peminjaman"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Peminjaman Dokumen</a>
                            <a class="nav-link" href="<?= BASEURL; ?>/Peminjaman/LapPeminjaman"><div class="sb-nav-link-icon"><i class="bi bi-circle text-ungu"></i></div>Laporan Peminjaman</a>
                        </nav>
                    </div>
                    <hr class="anwar-separator anwar-separator-dot"/>
                    <?php endif; ?>
                    <?php if($roleUser == 'Admin'): ?>
                    <div class="sb-sidenav-menu-heading">Lainnya</div>

                    <a class="nav-link" href="<?= BASEURL; ?>/Identitas/Identitas">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-gear-wide"></i></div>
                        Identitas Aplikasi
                    </a>
                    <?php endif; ?>
                    <a class="nav-link" href="<?= BASEURL; ?>/Profil">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-person"></i></div>
                        Profil Anda
                    </a>
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <div class="sb-nav-link-icon">
                            <i class="bi bi-box-arrow-right"></i></div>
                        Logout
                    </a>
                    <hr class="anwar-separator anwar-separator-dot"/>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>