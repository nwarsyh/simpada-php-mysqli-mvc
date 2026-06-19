<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5><?= $dataSimpanPinjam['SubJudulPeminjaman'] ;?></h5>
                                <button type="button" class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahPeminjaman">
                                    <i class="bi bi-plus fa-sm text-white-50"></i> Tambah <?= $dataSimpanPinjam['SubJudulPeminjaman'] ;?>
                                </button>
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
                    <table class="table table-striped" id="table1">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">Nomor Dokumen</th>
                            <th class="text-center">Tanggal Peminjaman</th>
                            <th class="text-center">Tanggal Rencana Pengembalian</th>
                            <th class="text-center">Status Peminjaman</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $No = 1;
                            foreach ($dataSimpanPinjam['dataPeminjaman'] as $dataPeminjaman):
                                if($dataPeminjaman['status_peminjaman'] == "Menunggu Konfirmasi"){
                                    $iconStatus = "bi bi-arrow-clockwise"; $WarnaButton = 'btn-warning';
                                } else if($dataPeminjaman['status_peminjaman'] == "Peminjaman Aktif"){
                                    $iconStatus = "bi bi-cpu"; $WarnaButton = 'btn-success';
                                } else if($dataPeminjaman['status_peminjaman'] == "Sudah Dikembalikan") {
                                    $iconStatus = "bi bi-check2-circle"; $WarnaButton = 'btn-primary';
                                } else if($dataPeminjaman['status_peminjaman'] == "Diterima"){
                                    $iconStatus = "bi bi-check"; $WarnaButton = 'btn-success';
                                } else if($dataPeminjaman['status_peminjaman'] == "Ditolak"){
                                    $iconStatus = "bi bi-x"; $WarnaButton = 'btn-danger';
                                } else{
                                    $iconStatus = "bi bi-ban"; $WarnaButton = 'btn-info';
                                }
                                ?>
                            <tr class="text-center">
                                <td><?= $No; ?></td>
                                <td><?= $dataPeminjaman['nomor_dokumen'] ;?></td>
                                <td><?= FormatDate($dataPeminjaman['tgl_peminjaman']) ;?></td>
                                <td><?= FormatDate($dataPeminjaman['tgl_rencana_pengembalian']) ;?></td>
                                <td>
                                    <button type="button" class="btn btn-sm costumbtn text-white <?= $WarnaButton; ?>">
                                        <i class="<?= $iconStatus?>"></i> <?= $dataPeminjaman['status_peminjaman']; ?>
                                    </button>
                                </td>
                                <td>
                                    <?php if ($dataPeminjaman['status_peminjaman'] == "Menunggu Konfirmasi"):?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#detailPeminjaman<?= $dataPeminjaman['id_peminjaman'];?>"
                                           class="btn btn-success btn-sm alert-confirm-hapus costumbtn">
                                            <i class="bi bi-eye"></i> Detail Peminjaman
                                        </a><br><br>
                                        <a href="#"
                                           class="btn btn-warning btn-sm costumbtn text-white">
                                            <i class="bi bi-pen"></i> Ubah Peminjaman
                                        </a><br><br>
                                        <a href="<?= BASEURL?>/Peminjaman/deletePeminjaman/<?=$dataPeminjaman['id_peminjaman']; ?>"
                                           class="btn btn-danger btn-sm alert-confirm-hapus costumbtn">
                                            <i class="bi bi-trash"></i> Hapus Peminjaman
                                        </a>
                                        <?php elseif ($dataPeminjaman['status_peminjaman'] == "Ditolak"):?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#keteranganDitolak<?= $dataPeminjaman['id_peminjaman'];?>"
                                           class="btn btn-danger btn-sm costumbtn">
                                            <i class="bi bi-c"></i> Peminjaman Ditolak Peminjaman
                                        </a>
                                        <?php elseif ($dataPeminjaman['status_peminjaman'] == "Diterima"):?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#keteranganDiterima<?= $dataPeminjaman['id_peminjaman'];?>"
                                           class="btn btn-success btn-sm costumbtn">
                                            <i class="bi bi-chart"></i> Ambil Dokumen
                                        </a>
                                    <?php else :?>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#detailPeminjaman<?= $dataPeminjaman['id_peminjaman'];?>"
                                           class="btn btn-success btn-sm costumbtn">
                                            <i class="bi bi-eye"></i> Detail Peminjaman
                                        </a><br><br>
                                        <a href="#"
                                           class="btn btn-info btn-sm costumbtn">
                                            <i class="bi bi-printer"></i> Cetak Bukti
                                        </a>
                                    <?php endif;?>
                                </td>
                            </tr>
                                <!--START Modal Peminjaman Diterima-->
                                <div class="modal fade" id="detailPeminjaman<?= $dataPeminjaman['id_peminjaman'];?>" tabindex="-1" aria-labelledby="keteranganDiterimaLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="keteranganDiterimaLabel">Detail Peminjaman</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="list-group">
                                                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1"><?= $dataPeminjaman['nomor_dokumen'] ;?> | <?= $dataPeminjaman['kode_dokumen'] ;?></h5>
                                                                </div>
                                                                <p class="mb-1"><?= $dataPeminjaman['nama_dokumen'] ;?></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ol class="list-group mt-3">
                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto">
                                                                    <div class="fw-bold">Pengelola Dokumen</div>
                                                                    <?= $dataPeminjaman['nama_departemen'] ;?>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto">
                                                                    <div class="fw-bold">Lokasi Dokumen</div>
                                                                    Lemari No. <?= $dataPeminjaman['nomor_lemari']; ?> |
                                                                    Rak No.<?= $dataPeminjaman['nomor_rak']; ?> |
                                                                    Box No.<?= $dataPeminjaman['nomor_box']; ?> |
                                                                    Warna Map. <?= $dataPeminjaman['warna_map']; ?>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto">
                                                                    <div class="fw-bold">Wilayah Dokumen</div>
                                                                    <?= $dataPeminjaman['kelurahan_dokumen']; ?>,
                                                                    <?= $dataPeminjaman['kecamatan_dokumen']; ?>,
                                                                    <?= $dataPeminjaman['kabkota_dokumen']; ?>,
                                                                    <?= $dataPeminjaman['provinsi_dokumen']; ?>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto">
                                                                    <div class="fw-bold">Tanggal Peminjaman</div>
                                                                    <?= FormatDate($dataPeminjaman['tgl_peminjaman']) ;?>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                                <div class="ms-2 me-auto">
                                                                    <div class="fw-bold">Tanggal Pengembalian</div>
                                                                    <?= FormatDate($dataPeminjaman['tgl_pengembalian']) ;?>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <?php
                                                        $fileArsip = $dataPeminjaman['file_dokumen'];
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
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--START Modal Peminjaman Diterima-->
                                <!--START Modal Peminjaman Diterima-->
                                <div class="modal fade" id="keteranganDiterima<?= $dataPeminjaman['id_peminjaman'];?>" tabindex="-1" aria-labelledby="keteranganDiterimaLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="keteranganDiterimaLabel">Catatan Konfirmasi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="list-group">
                                                    <button type="button" class="list-group-item list-group-item-action bg-success" aria-current="true">
                                                        Catatan Admin
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-action"><?= $dataPeminjaman['catatan_admin_peminjaman'];?></button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--START Modal Peminjaman Diterima-->
                                <!--START Modal Peminjaman Ditolak-->
                                <div class="modal fade" id="keteranganDitolak<?= $dataPeminjaman['id_peminjaman'];?>" tabindex="-1" aria-labelledby="keteranganDitolakLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="keteranganDiterimaLabel">Catatan Konfirmasi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="list-group">
                                                    <button type="button" class="list-group-item list-group-item-action bg-success" aria-current="true">
                                                        Catatan Admin
                                                    </button>
                                                    <button type="button" class="list-group-item list-group-item-action"><?= $dataPeminjaman['catatan_admin_peminjaman'];?></button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--START Modal Peminjaman Ditolak-->
                                <?php $No++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!--Start Tambah Account-->
<div class="modal fade"
     id="tambahPeminjaman"
     tabindex="-1"
     aria-labelledby="tambahPeminjamanLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahPeminjamanLabel">Tambah Peminjaman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL?>/Peminjaman/createPeminjaman" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="dokumenInput" class="form-label">Nomor Dokumen</label>
                                <input id="dokumenInput" onkeyup="searchDocuments()" placeholder="Ketik minimal 5 karakter..." type="text" class="form-control form-control-sm">
                                <input name="id_karyawan" id="id_karyawan" value="<?= $dataSimpanPinjam['userAktifNow']['id_karyawan']?>" type="hidden" class="form-control form-control-sm">
                                <input name="doc_id" id="selectedDocId" value="" type="hidden" class="form-control form-control-sm">
                                <input name="jml_doc" id="jmlDoc" value="" type="hidden" class="form-control form-control-sm">

                                <div id="suggestions" style="border: 1px solid #ccc; max-height: 150px; overflow-y: auto; display: none;"></div>
                                <div id="dokumenDetails" style="display:none;">
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                        <tbody>
                                        <tr>
                                            <th>Nomor Dokumen</th>
                                            <th>:</th>
                                            <td><span id="nomorDokumen"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Dokumen</th>
                                            <th>:</th>
                                            <td><span id="namaDokumen"></span> | <span id="kodeDokumen"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Kategori Dokumen</th>
                                            <th>:</th>
                                            <td><span id="kategoriDokumen"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Pengelola Dokumen</th>
                                            <th>:</th>
                                            <td><span id="pengelolaDokumen"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Lokasi Dokumen</th>
                                            <th>:</th>
                                            <td>Lemari No.<span id="nomorLemari"></span>
                                                Rak No.<span id="nomorRak"></span>
                                                Box No.<span id="nomorBox"></span>
                                                Warna Map.<span id="warnaMap"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Wilayah Dokumen</th>
                                            <th>:</th>
                                            <td>Provinsi : <span id="provinsiDokumen"></span><br>
                                                Kabupaten : <span id="kabkotaDokumen"></span><br>
                                                Kecamatan : <span id="kecamatanDokumen"></span><br>
                                                Kelurahan : <span id="kelurahanDokumen"></span></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="tanggal_rencana_kembali" class="form-label">Tanggal Rencana Pengembalian</label>
                                <input id="tanggal_rencana_kembali" name="tanggal_rencana_kembali" type="date" class="form-control form-control-sm">
                            </div>
                            <div class="form-group mb-2">
                                <label for="catatan_peminjaman" class="form-label">Catatan Peminjaman</label>
                                <textarea id="catatan_peminjaman" name="catatan_peminjaman" class="form-control" placeholder="Catatan Peminjaman Jika Ada" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary costumbtn" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary costumbtn">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END Tambah Account-->