<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulStaff']; ?> Peminjaman</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-pink shadow-sm">
                                    <i class="bi bi-file-bar-graph-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Menunggu Konfirmasi</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['ttlMenungguKonfirmasiUsers']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-ungu shadow-sm">
                                    <i class="bi bi-bank2"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pinjaman Aktif</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['ttlPinjamanAktifUsers']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-warning shadow-sm">
                                    <i class="bi bi-tags-fill text-white"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pinjaman Selesai</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['ttlPinjamanSelesaiUsers']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-danger shadow-sm">
                                    <i class="bi bi-pin-map"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pengembalian Terlambat</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['ttlPinjamanTerlambatUsers']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-info shadow-sm">
                                    <i class="bi bi-person-lines-fill text-white"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pinjaman Ditolak</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['ttlPinjamanDitolakUsers']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm">
                                    <i class="bi bi-people-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pinjaman</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['ttlPinjamanUsers']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center bg-danger">
                    <h6 class="m-0 font-weight-bold">Pengembalian Terlambat</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($dataSimpanPinjam['dataPinjamanTerlambatUsers'])): ?>
                        <?php foreach ($dataSimpanPinjam['dataPinjamanTerlambatUsers'] as $dataTerlmabatUsers) :
                            $selisihAwal  = new DateTime($dataTerlmabatUsers['tgl_peminjaman']);
                            $selisihAkhir  = new DateTime(date('Y-m-d'));
                            $lamaPeminjaman = $selisihAwal->diff($selisihAkhir)->days;
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <ol type="1" >
                                    <li>
                                        <div class="ms-2 me-auto">
                                            <div>Anda Belum Mengembalikan Dokumen : <span  class="fw-bold"><?= $dataTerlmabatUsers['nomor_dokumen']; ?> - <?= $dataTerlmabatUsers['nama_dokumen']; ?> (<?= $dataTerlmabatUsers['kode_dokumen']; ?>)</span></div>
                                            Batas Pengembalian Dokumen : <b><?= FormatDate($dataTerlmabatUsers['tgl_rencana_pengembalian']); ?></b>
                                        <div>Sesuai Dengan Rencana Pengembalian, Silahkan Kembalikan Dokumen Atau Minta Perpanjangan Waktu Dengan Administrator</div>
                                            <span>Lama Keterlambatan : <b><?= $lamaPeminjaman; ?> Hari</b></span>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>
                        <div class="alert alert-primary" role="alert">
                            <p>Anda Belum Punya Dokumen Dengan Status Menunggu Konfirmasi</p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center bg-warning">
                    <h6 class="m-0 font-weight-bold">Menunggu Konfirmasi</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($dataSimpanPinjam['dataMenungguKonfirmasiUsers'])): ?>
                        <?php foreach ($dataSimpanPinjam['dataMenungguKonfirmasiUsers'] as $dataMenungguUsers) : ?>
                            <div class="alert alert-warning" role="alert">
                                <ol type="1" >
                                    <li>
                                        <div class="ms-2 me-auto">
                                            <div>Dokumen : <span  class="fw-bold"><?= $dataMenungguUsers['nomor_dokumen']; ?> - <?= $dataMenungguUsers['nama_dokumen']; ?> (<?= $dataMenungguUsers['kode_dokumen']; ?>)</span></div>
                                            Yang Akan Anda Dipinjam sedang : <b>Menunggu Konfirmasi Dari Administrator</b>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>
                        <div class="alert alert-primary" role="alert">
                            <p>Anda Belum Punya Dokumen Dengan Status Menunggu Konfirmasi</p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center bg-success">
                    <h6 class="m-0 font-weight-bold">Peminjaman Aktif</h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($dataSimpanPinjam['dataPinjamanAktifUsers'])): ?>
                        <?php foreach ($dataSimpanPinjam['dataPinjamanAktifUsers'] as $dataPinjamanAktifUsers) : ?>
                            <div class="alert alert-success" role="alert">
                                <ol type="1" >
                                    <li>
                                        <div class="ms-2 me-auto">
                                            <div>Anda Sedang Meminjam Dokumen : <span  class="fw-bold"><?= $dataPinjamanAktifUsers['nomor_dokumen']; ?> - <?= $dataPinjamanAktifUsers['nama_dokumen']; ?> (<?= $dataPinjamanAktifUsers['kode_dokumen']; ?>)</span></div>
                                            Batas Pengembalian Dokumen : <b><?= FormatDate($dataPinjamanAktifUsers['tgl_rencana_pengembalian']); ?></b>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        <?php endforeach;?>
                    <?php else: ?>
                        <div class="alert alert-success" role="alert">
                            <p>Anda Belum Punya Dokumen Dengan Status Peminjaman Aktif</p>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>