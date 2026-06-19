<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulBackupDatabase'] ?></h6>
                    <!-- Tombol Action -->
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/BackupDatabase/startBackupDatabse" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-database me-2"></i> <?= $dataSimpanPinjam['SubJudulBackupDatabase'] ?>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        Fitur ini hanya mem-backup database. Sebaiknya juga melakukan penyimpanan file backup database ini ke tempat penyimpanan yang terpisah. Silakan backup dokumen file lainnya secara manual
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END Bagian Konten CRUD-->
</div>
