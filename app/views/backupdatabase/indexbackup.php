<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulBackupDatabase'] ;?></h5>
                                <a href="<?= BASEURL; ?>/BackupDatabase/startBackupDatabse" type="button" class="btn btn-sm btn-primary shadow-sm">
                                    <i class="bi bi-database text-white-50"></i> <?= $dataSimpanPinjam['SubJudulBackupDatabase'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        Fitur ini hanya mem-backup database. Sebaiknya juga melakukan penyimpanan file backup database ini ke tempat penyimpanan yang terpisah. Silakan backup dokumen file lainnya secara manual
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>