<main class="app-main">
    <!--<div class="app-content-header">p;</div>-->
    <div class="app-content mt-3">
        <div class="container-fluid">
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
            ?>
            <div class="card">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h5><?= $dataSimpanPinjam['SubJudulDetailDokumen'] ;?></h5>
                        <a href="<?= BASEURL; ?>/Dokumen" type="button" class="btn btn-sm btn-primary shadow-sm">
                            <i class="bi bi-arrow-bar-left text-white-50"></i>Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <?php
                            $fileArsip = $dataSimpanPinjam['dataDokumenByID']['file_dokumen'];
                            $filePath = BASEURL . '/public/media/dokumen/' . $fileArsip;
                            $fileType = pathinfo($fileArsip, PATHINFO_EXTENSION);
                            ?>
                            <?php if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                <!--                                        <img src="--><?//= BASEURL; ?><!--/public/img/dokumen/--><?//= $getArsipDigital['get_ArsipByID']['file_arsip']; ?><!--" alt="Preview" style="max-width: 100%; height: auto;">-->
                                <img src="<?= $filePath; ?>" alt="Preview" style="max-width: 100%; height: auto;">
                            <?php elseif ($fileType === 'pdf'): ?>
                                <!--                                        <iframe src="--><?//= BASEURL; ?><!--/public/img/dokumen/--><?//= $getArsipDigital['get_ArsipByID']['file_arsip']; ?><!--" style="width: 100%; height: 500px;" frameborder="0"></iframe>-->
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
                                    <button type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>">
                                        <i class="<?= $iconStatus?>"></i> <?= $StatusDokumen ;?>
                                    </button>
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
                </div>
                <div class="card-footer">
                    <div class="d-sm-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-sm btn-danger costumbtn text-white">
                            <i class="bi bi-ban text-white-50"></i>
                            <span> Batal</span>
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary costumbtn">
                            <i class="bi bi-floppy text-white-50"></i>
                            <span> Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>