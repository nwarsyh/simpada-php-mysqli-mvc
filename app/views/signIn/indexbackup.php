<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $dataSimpanPinjam['JudulWeb']; ?></title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="<?= $dataSimpanPinjam['JudulWeb']; ?>" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance."/>
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant"/>
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="<?= ASSET_URL; ?>/css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/fontsource/index.css">
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/overlayscrollbars/overlayscrollbars.min.css"/>
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/vendor/bootstrap-icons/bootstrap-icons.min.css">
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--bagina untuk sweet lert-->
    <script src="<?= ASSET_URL; ?>/vendor/sweetalert/sweetalert2@11.js"></script>

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/css/adminlte.css" />
    <link rel="stylesheet" href="<?= ASSET_URL; ?>/myassets/css/my_css.css" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="login-page bg-body-secondary">
<?php Flasher::flasherToast(); ?>
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <a href="<?= BASEURL; ?>/SignIn" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                <h1 class="mb-0">Welcome !!!</h1>
            </a>
        </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

            <form action="<?= BASEURL; ?>/SignIn/doSignInKaryawan" method="post">
                <div class="input-group input-group-sm mb-3">
                    <input name="username" id="username" type="text" class="form-control" placeholder="Username" />
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <input name="password" id="password" type="password" class="form-control" placeholder="Password" />
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                </div>

                <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    <button type="submit" class="btn btn-primary costumbtn">
                        <i class="bi bi-box-arrow-in-right me-2"></i> SignIn
                    </button>
                </div>
            </form>
            <div class="row mb-1">
                <div class="col-6">
                        <a href="#" class="text-decoration-none text-danger">Lupa Password ?</a>
                </div>
                <!-- /.col -->
                <div class="col-6 text-end">
                        <a href="<?= BASEURL; ?>/signin/registerform" class="text-center text-decoration-none text-success"> Daftar Akun ? </a>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="<?= ASSET_URL; ?>/vendor/overlayscrollbars/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="<?= ASSET_URL; ?>/vendor/popper/popper.min.js" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="<?= ASSET_URL; ?>/vendor/bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->

<!--demo sweetalert-->
<script src="<?= ASSET_URL; ?>/vendor/sweetalert/sweetalert_demo.js"></script>
<script src="<?= ASSET_URL; ?>/assets/myassets/js/my_script.js"></script>

<script src="<?= ASSET_URL; ?>/js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;
        if (
            sidebarWrapper &&
            OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
        !isMobile
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
<!--end::OverlayScrollbars Configure--><!--begin::Color Mode Toggle (#6010)-->
<script>
    (() => {
        'use strict';
    const STORAGE_KEY = 'lte-theme';
    const getStoredTheme = () => localStorage.getItem(STORAGE_KEY);
    const setStoredTheme = (theme) => localStorage.setItem(STORAGE_KEY, theme);
    const prefersDark = () => globalThis.matchMedia('(prefers-color-scheme: dark)').matches;
    const getPreferredTheme = () => {
        const stored = getStoredTheme();
        if (stored) return stored;
        return prefersDark() ? 'dark' : 'light';
    };
    const setTheme = (theme) => {
        const resolved = theme === 'auto' ? (prefersDark() ? 'dark' : 'light') : theme;
        document.documentElement.setAttribute('data-bs-theme', resolved);
    };
    setTheme(getPreferredTheme());
    const showActiveTheme = (theme) => {
        // Highlight the active dropdown option
        document.querySelectorAll('[data-bs-theme-value]').forEach((el) => {
            el.classList.remove('active');
        el.setAttribute('aria-pressed', 'false');
        const check = el.querySelector('.bi-check-lg');
        if (check) check.classList.add('d-none');
    });
        const active = document.querySelector(`[data-bs-theme-value="${theme}"]`);
        if (active) {
            active.classList.add('active');
            active.setAttribute('aria-pressed', 'true');
            const check = active.querySelector('.bi-check-lg');
            if (check) check.classList.remove('d-none');
        }
        // Sync the topbar trigger icon
        document.querySelectorAll('[data-lte-theme-icon]').forEach((icon) => {
            icon.classList.toggle('d-none', icon.dataset.lteThemeIcon !== theme);
    });
    };
    globalThis.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        const stored = getStoredTheme();
    if (!stored || stored === 'auto') setTheme(getPreferredTheme());
    });
    document.addEventListener('DOMContentLoaded', () => {
        showActiveTheme(getPreferredTheme());
    document.querySelectorAll('[data-bs-theme-value]').forEach((toggle) => {
        toggle.addEventListener('click', () => {
        const theme = toggle.getAttribute('data-bs-theme-value');
    setStoredTheme(theme);
    setTheme(theme);
    showActiveTheme(theme);
    });
    });
    });
    })();
</script>
<!--end::Color Mode Toggle-->
<!--end::Script-->
</body>
<!--end::Body-->
</html>
