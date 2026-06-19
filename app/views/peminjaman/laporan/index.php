<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulLapPeminjaman']; ?></h6>
                </div>
                <form action="<?= BASEURL?>/Peminjaman/LapPeminjaman/index" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3"><small>Note : Sebelum Cetak Filter Telebih Dahulu</small></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_awal_lappeminajaman" class="form-label">Pilih Tanggal Awal</label>
                                    <input id="tgl_awal_lappeminajaman" name="tgl_awal_lappeminajaman" required type="date" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_awal_akhirpeminajaman" class="form-label">Pilih Tanggal Akhir</label>
                                    <input id="tgl_awal_akhirpeminajaman" name="tgl_awal_akhirpeminajaman" required type="date" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-success kostumbtn">
                                    <i class="bi bi-search me-2"></i> Cari Laporan
                                </button>
                                <a href="<?= BASEURL; ?>/Peminjaman/LapPeminjaman/cetaklaporanpeminjaman?tgl_awal_lappeminajaman=<?= $_POST['tgl_awal_lappeminajaman'] ?? '' ?>&tgl_awal_akhirpeminajaman=<?= $_POST['tgl_awal_akhirpeminajaman'] ?? '' ?>"
                                   target="_blank" class="btn btn-ungu kostumbtn">
                                    <i class="bi bi-printer me-2"></i> Cetak Laporan
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <hr class="anwar-separator anwar-separator-dot"/>
                <div class="card-body">
                    <table class="table table-striped table-sm dataTable-table" id="tableAnwar">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#</th>
                            <th class="text-center">Nomor Dokumen</th>
                            <th class="text-center">Tanggal Peminjaman</th>
                            <th class="text-center">Tanggal Rencana Pengembalian</th>
                            <th class="text-center">Status Peminjaman</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataLaporanPeminjaman'] as $dataPeminjaman):
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
                            </tr>
                            <?php $No++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
