<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?= BASEURL; ?>/Admin" class="brand-link">
            <!--begin::Brand Image-->
            <img src="<?= ASSET_URL; ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"/>
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation" aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="<?= BASEURL; ?>/Admin" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-database"></i>
                        <p>
                            Master Data
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Admin/Departemen" class="nav-link"><i class="nav-icon bi bi-circle text-danger"></i><p>Master Departemen</p></a></li>
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Admin/Kategori" class="nav-link"><i class="nav-icon bi bi-circle text-warning"></i><p>Master Kategori</p></a></li>
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Admin/Lokasi" class="nav-link"><i class="nav-icon bi bi-circle text-info"></i><p>Master Lokasi</p></a></li>
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Admin/Karyawan" class="nav-link"><i class="nav-icon bi bi-circle text-success"></i><p>Master Karyawan</p></a></li>
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Admin/Account" class="nav-link"><i class="nav-icon bi bi-circle text-light"></i><p>Master Account</p></a></li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-files"></i>
                        <p>Dokumen<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Dokumen" class="nav-link"><i class="nav-icon bi bi-circle text-danger"></i><p>Master Dokumen</p></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-grid"></i>
                        <p>Peminjaman<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Peminjaman" class="nav-link"><i class="nav-icon bi bi-circle text-danger"></i><p>Peminjaman Dokumen</p></a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-file-earmark-bar-graph"></i>
                        <p>Transaksi<i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= BASEURL; ?>/Transaksi" class="nav-link"><i class="nav-icon bi bi-circle text-danger"></i><p>Kelola Peminjaman</p></a></li>
                    </ul>
                </li>

                <li class="nav-header">Lainnya</li>
                <li class="nav-item">
                    <a href="<?= BASEURL; ?>/BackupDatabase/BackupDatabase" class="nav-link"><i class="nav-icon bi bi-layer-backward"></i><p>Backup Database</p></a>
                </li>
                <li class="nav-item">
                    <a href="<?= BASEURL; ?>/Identitas/Identitas" class="nav-link"><i class="nav-icon bi bi-gear-wide"></i><p>Identitas</p></a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->

            <!-- Docs CTA (bottom of sidebar) -->
            <div class="p-3 mt-3 border-top border-secondary border-opacity-25">
                <a href="#" class="btn btn-sm btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right" aria-hidden="true"></i> Logout
                </a>
            </div>
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->