<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulPeminjaman'] ;?></h6>
                    <div class="d-flex gap-2">
                        <button class="btn kostumbtn btn-ungu shadow-sm d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#tambahPeminjaman">
                            <i class="bi bi-plus me-1"></i> Tambah <?= $dataSimpanPinjam['SubJudulPeminjaman'] ;?>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <small class="text-danger"><b>Note : </b>untuk diterima revisi beri timer waktu ambil </small>
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
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
                                $warnadot = "status-menunggu";
                            } else if($dataPeminjaman['status_peminjaman'] == "Peminjaman Aktif"){
                                $warnadot = "status-aktif";
                            } else if($dataPeminjaman['status_peminjaman'] == "Sudah Dikembalikan") {
                                $warnadot = "status-kembali";
                            } else if($dataPeminjaman['status_peminjaman'] == "Diterima"){
                                $warnadot = "status-diapprove";
                            } else if($dataPeminjaman['status_peminjaman'] == "Ditolak"){
                                $warnadot = "status-ditolak";
                            } else{
                                $warnadot = "status-lainnya";
                            }
                        ?>
                        <tr class="text-center">
                            <td><?= $No; ?></td>
                            <td><?= $dataPeminjaman['nomor_dokumen'] ;?></td>
                            <td><?= FormatDate($dataPeminjaman['tgl_peminjaman']) ;?></td>
                            <td><?= FormatDate($dataPeminjaman['tgl_rencana_pengembalian']) ;?></td>
                            <td>
                                <div class="status-peminjaman <?= $warnadot; ?>">
                                    <span class="status-dot"></span>
                                    <?= $dataPeminjaman['status_peminjaman']; ?>
                                </div>
                            </td>
                            <td>
                                <?php if ($dataPeminjaman['status_peminjaman'] == "Menunggu Konfirmasi"):?>
                                <div class="table-action">
                                    <button class="kostumbtn btn table-action-btn">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="table-action-menu">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#detailPeminjaman<?= $dataPeminjaman['id_peminjaman'];?>">
                                            <i class="bi bi-eye text-ungu"></i> Detail Peminjaman
                                        </a>
                                        <a href="#">
                                            <i class="bi bi-pen text-warning"></i> Ubah Peminjaman
                                        </a>
                                        <a href="<?= BASEURL?>/Peminjaman/deletePeminjaman/<?=$dataPeminjaman['id_peminjaman']; ?>">
                                            <i class="bi bi-trash text-danger"></i> Hapus Peminjaman
                                        </a>
                                    </div>
                                </div>
                                <?php elseif ($dataPeminjaman['status_peminjaman'] == "Ditolak"):?>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#keteranganDitolak<?= $dataPeminjaman['id_peminjaman'];?>">
                                                <i class="bi bi-x text-danger"></i> Peminjaman Ditolak
                                            </a>
                                        </div>
                                    </div>
                                <?php elseif ($dataPeminjaman['status_peminjaman'] == "Diterima"):?>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#keteranganDiterima<?= $dataPeminjaman['id_peminjaman'];?>">
                                                <i class="bi bi-check text-primary"></i> Pinjaman Diapprove
                                            </a>
                                        </div>
                                    </div>
                                <?php else :?>
                                    <div class="table-action">
                                        <button class="kostumbtn btn table-action-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="table-action-menu">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#detailPeminjaman<?= $dataPeminjaman['id_peminjaman'];?>">
                                                <i class="bi bi-eye text-ungu"></i> Detail Peminjaman
                                            </a>
                                            <a target="_blank" href="<?= BASEURL; ?>/Peminjaman/Peminjaman/cetakInvoice/<?= $dataPeminjaman['id_peminjaman'];?>">
                                                <i class="bi bi-printer text-success"></i> Cetak Bukti
                                            </a>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </td>
                        </tr>
                            <div class="modal fade" id="keteranganDiterima<?= $dataPeminjaman['id_peminjaman'];?>"
                                 tabindex="-1" aria-labelledby="keteranganDiterimaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="keteranganDiterimaLabel">Catatan Konfirmasi</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="list-group">
                                                <button type="button" class="list-group-item bg-success" aria-current="true">
                                                    Catatan Admin
                                                </button>
                                                <button type="button" class="list-group-item list-group-item-action"><?= $dataPeminjaman['catatan_admin_peminjaman'];?></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="keteranganDitolak<?= $dataPeminjaman['id_peminjaman'];?>"
                                 tabindex="-1" aria-labelledby="keteranganDitolakLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="keteranganDitolakLabel">Catatan Konfirmasi</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
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
                                            <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="detailPeminjaman<?= $dataPeminjaman['id_peminjaman'];?>"
                                 tabindex="-1" aria-labelledby="detailPeminjamanLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="detailPeminjamanLabel">Detail Pinjaman</h1>
                                            <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
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
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $No++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahPeminjaman"
     tabindex="-1" aria-labelledby="tambahPeminjamanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahPeminjamanLabel">Tambah Peminjaman</h1>
                <button class="btn bg-ungu kostumbtn text-light" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= BASEURL?>/Peminjaman/createPeminjaman" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="dokumenInput" class="form-label">Nomor Dokumen</label>
                                <input id="dokumenInput" onkeyup="searchDocuments()" placeholder="Ketik minimal 5 karakter..." type="text" class="form-control form-control-sm form-loginsatu">
                                <input name="id_karyawan" id="id_karyawan" value="<?= $dataSimpanPinjam['userAktifNow']['id_karyawan']?>" type="hidden" class="form-control form-control-sm form-loginsatu">
                                <input name="doc_id" id="selectedDocId" value="" type="hidden" class="form-control form-control-sm form-loginsatu">
                                <input name="jml_doc" id="jmlDoc" value="" type="hidden" class="form-control form-control-sm form-loginsatu">

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
                                <input id="tanggal_rencana_kembali" name="tanggal_rencana_kembali" type="date" class="form-control form-control-sm form-loginsatu">
                            </div>
                            <div class="form-group mb-2">
                                <label for="catatan_peminjaman" class="form-label">Catatan Peminjaman</label>
                                <textarea id="catatan_peminjaman" name="catatan_peminjaman" class="form-control form-loginsatu" placeholder="Catatan Peminjaman Jika Ada" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-ungu kostumbtn" data-bs-dismiss="modal">Batal</button>
                    <button type="reset" class="btn btn-danger kostumbtn">Reset</button>
                    <button type="submit" class="btn btn-primary kostumbtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('click', function(e) {
        document.querySelectorAll('.table-action-menu')
            .forEach(menu => {
            if (!menu.parentElement.contains(e.target)) {
            menu.classList.remove('show');
        }
    });
        if (e.target.closest('.table-action-btn')) {
            const menu = e.target
                .closest('.table-action')
                .querySelector('.table-action-menu');
            menu.classList.toggle('show');
        }
    });
</script>




