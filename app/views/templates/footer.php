</main>
<!--START modal logout-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" data-bs-keyboard="false" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Apakah Anda Ingin Keluar ?</h5>
                <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Silahkan Klik Tombol "Logout" Jika Anda Ingin Mengakhiri Sesi Anda Saat Ini</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Batal</button>
                <a href="<?= BASEURL; ?>/SignIn/doLogout" type="submit" class="btn btn-success kostumbtn">Logout</a>
            </div>
        </div>
    </div>
</div>
<!--END modal logout-->
<!-- START Tombol Back to Top -->
<button id="btnBackToTop" class="btn btn-ungu rounded-circle">
    <i class="bi bi-arrow-bar-up"></i>
</button>
<!-- END start Tombol Back to Top -->
<!--START bagian footer-->
<footer class="py-4 mt-auto footer-temp">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
                    <span>Copyright &copy; 2026 SIMPADA By
                        <a href="https://github.com/nwarsyh" class="text-decoration-none" target="_blank">Anwarsyah</a></span>
            <span> Reference By :
                        <a href="https://startbootstrap.com/theme/sb-admin-2" target="_blank" class="text-decoration-none">SB Admin 2025</a>
                    </span>
        </div>
    </div>
</footer>
<!--END bagian footer-->
</div>
</div>
<!--END MENU DAN KONTEN-->
<!--javascript bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!--untuk dua dibawah ini usahakan tetap berada paling bawah, diatas adalah library"-->
<!--javascript dari sb admin-->
<script src="<?= ASSET_URL; ?>/vendor/sb-admin/js/scripts.js"></script>
<!--java script tambahan akuuu-->
<script src="<?= ASSET_URL; ?>/mystyle/js/myscript.js"></script>
<!--koneksi ke demo sweet alert-->
<script src="<?= ASSET_URL; ?>/mystyle/js/sweetalert.js"></script>
<!--javascript datta table-->
<!--<script src="--><?//= ASSET_URL; ?><!--/vendor/jQuery/jquery-3.7.1.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="--><?//= ASSET_URL; ?><!--/vendor/dataTables/dataTables.js"></script>-->
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
<script src="<?= ASSET_URL; ?>/mystyle/js/dataTables_demo.js"></script>
<script>
    const BASEURL = "<?= BASEURL ?>";
</script>
<?php if (!empty($dataSimpanPinjam['customJs'])) : ?>
    <?php foreach ($dataSimpanPinjam['customJs'] as $js) : ?>
        <script src="<?= ASSET_URL; ?>/mystyle/js/master/<?= $js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>