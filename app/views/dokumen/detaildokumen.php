<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulDetailDokumen'] ;?></h6>
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/Dokumen" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-arrow-bar-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    $No = 1;
                    $StatusDokumen =  $dataSimpanPinjam['dataDokumenByID']['status_dokumen'];
                    if($StatusDokumen == "Aktif"){
                        $iconStatus = "bi bi-check"; $WarnaButton = 'btn-primary';
                    } else if($StatusDokumen == "Tidak Aktif"){
                        $iconStatus = "bi bi-x"; $WarnaButton = 'btn-danger';
                    } else if($StatusDokumen == "Permanen") {
                        $iconStatus = "bi bi-file-lock2"; $WarnaButton = 'btn-success';
                    } else if($StatusDokumen == "Dimusnahkan") {
                        $iconStatus = "bi bi-fire"; $WarnaButton = 'btn-warning';
                    } else{
                        $iconStatus = "bi bi-ban"; $WarnaButton = 'btn-info';
                    }
                    $TanggalAwal = new DateTime($dataSimpanPinjam['dataDokumenByID']['tgl_awal_dokumen']);
                    $TanggalAkhir = new DateTime($dataSimpanPinjam['dataDokumenByID']['tgl_retensi_dokumen']);
                    $MasaRestensi = $TanggalAwal->diff($TanggalAkhir)->y;
                    ?>
                    <div class="row">
                        <div class="col-md-5">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Masa Retensi</div>
                                        (<?= $MasaRestensi; ?> Tahun) <?= FormatDate($dataSimpanPinjam['dataDokumenByID']['tgl_awal_dokumen']); ?> s/d
                                        <?= FormatDate($dataSimpanPinjam['dataDokumenByID']['tgl_retensi_dokumen']); ?>
                                    </div>
                                    <button type="button" class="btn kostumbtn text-white <?= $WarnaButton; ?>">
                                        <i class="<?= $iconStatus?>"></i> <?= $StatusDokumen ;?>
                                    </button>
                                </li>
                            </ol>
                            <?php
                            $fileArsip = $dataSimpanPinjam['dataDokumenByID']['file_dokumen'];
                            $filePath = BASEURL . '/public/media/dokumen/' . $fileArsip;
                            $fileType = pathinfo($fileArsip, PATHINFO_EXTENSION);
                            ?>
                            <?php if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                <img src="<?= $filePath; ?>" alt="Preview" style="max-width: 100%; height: auto;">
                            <?php elseif ($fileType === 'pdf'): ?>
                                <iframe src="<?= $filePath; ?>" style="width: 100%; height: 500px;" frameborder="0"></iframe>
                            <?php elseif (in_array($fileType, ['doc', 'docx', 'xls', 'xlsx'])): ?>
                                <div class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold mb-3">
                                            Mohon Maaf!!!, Saat Ini File Ekstensi 'doc', 'docx', 'xls', 'xlsx'
                                            belum dapat dipreview langsung. Silahkan Download File :</div>
                                        <a href="<?= $filePath; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-download fa-sm text-white-50"></i> Download File
                                        </a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <span>Tipe file tidak dapat dipreview</span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-7">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Kode Dan Nomor Dokumen</div>
                                        <?= $dataSimpanPinjam['dataDokumenByID']['kode_dokumen']; ?> |
                                        <?= $dataSimpanPinjam['dataDokumenByID']['nomor_dokumen']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nama Dokumen</div>
                                        <?= $dataSimpanPinjam['dataDokumenByID']['nama_dokumen']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Kategori Dokumen</div>
                                        <?= $dataSimpanPinjam['dataDokumenByID']['nama_kategori']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Unit Pengelola</div>
                                        <?= $dataSimpanPinjam['dataDokumenByID']['nama_departemen']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Lokasi Dokumen</div>
                                        Lemari No. <?= $dataSimpanPinjam['dataDokumenByID']['nomor_lemari']; ?> |
                                        Rak No.<?= $dataSimpanPinjam['dataDokumenByID']['nomor_rak']; ?> |
                                        Box No.<?= $dataSimpanPinjam['dataDokumenByID']['nomor_box']; ?> |
                                        Warna Map. <?= $dataSimpanPinjam['dataDokumenByID']['warna_map']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Wilayah Dokumen</div>
                                        <?= $dataSimpanPinjam['dataProvinsi']; ?>,
                                        <?= $dataSimpanPinjam['dataKabupaten']; ?>,
                                        <?= $dataSimpanPinjam['dataKecamatan']; ?>,
                                        <?= $dataSimpanPinjam['dataKelurahan']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Jumlah Dokumen</div>
                                        <?= $dataSimpanPinjam['dataDokumenByID']['jumlah_dokumen']; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Awal Dokumen</div>
                                        <?= FormatDate($dataSimpanPinjam['dataDokumenByID']['tgl_awal_dokumen']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Retensi Dokumen</div>
                                        <?= FormatDate($dataSimpanPinjam['dataDokumenByID']['tgl_retensi_dokumen']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Insert</div>
                                        <?= FormatDateTime($dataSimpanPinjam['dataDokumenByID']['create_at_dokumen']); ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Tanggal Update</div>
                                        <?= FormatDateTime($dataSimpanPinjam['dataDokumenByID']['update_at_dokumen']); ?>
                                    </div>
                                </li>
                            </ol>
                        </div>
                </div>
                <div class="card-footer d-flex justify-content-end align-items-center">
                    <div class="d-flex gap-2">
                        <a href="<?= BASEURL; ?>/Dokumen" class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center">
                            <i class="bi bi-arrow-bar-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
