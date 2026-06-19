<!--end::App Main-->
<!--begin::Footer-->
<footer class="app-footer">
    <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline">
        <a href="https://adminlte.io" class="text-decoration-none">Ref Design By : AdminLTE.i</a></div>
    <!--end::To the end-->
    <!--begin::Copyright-->
    <span>
        Copyright &copy; 2026&nbsp;Simpan Pinjam Dokumen
        <a href="https://github.com/nwarsyh" class="text-decoration-none">Anwarsyah</a>.
    </span>
    <!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--bagian jquery untuk wilayah-->
<script src="<?= ASSET_URL; ?>/vendor/jquery/jquery.min.js" crossorigin="anonymous"></script>


<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="<?= ASSET_URL; ?>/vendor/overlayscrollbars/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="<?= ASSET_URL; ?>/vendor/popper/popper.min.js" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="<?= ASSET_URL; ?>/vendor/bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>

<!--ini untuk datatable atau simple datatable-->
<script src="<?= ASSET_URL; ?>/vendor/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= ASSET_URL; ?>/myassets/js/simple-datatables.js"></script>

<!--demo sweetalert-->
<script src="<?= ASSET_URL; ?>/vendor/sweetalert/sweetalert_demo.js"></script>
<script src="<?= ASSET_URL; ?>/myassets/js/my_script.js"></script>

<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
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


<script>
    const BASEURL = "<?= BASEURL ?>";
</script>
<?php if (!empty($dataSimpanPinjam['customJs'])) : ?>
    <?php foreach ($dataSimpanPinjam['customJs'] as $js) : ?>
        <script src="<?= ASSET_URL; ?>/myassets/master/<?= $js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>
<!--end::Body-->
</html>
