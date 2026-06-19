<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulLapTransaksi']; ?></h6>
                </div>
                <form action="<?= BASEURL?>/Transaksi/LapTransaksi/index" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3"><small>Note : Sebelum Cetak Filter Telebih Dahulu</small></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_awal_laptransaksi" class="form-label">Pilih Tanggal Awal</label>
                                    <input id="tgl_awal_laptransaksi" name="tgl_awal_laptransaksi" required type="date" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_akhir_laptransaksi" class="form-label">Pilih Tanggal Akhir</label>
                                    <input id="tgl_akhir_laptransaksi" name="tgl_akhir_laptransaksi" required type="date" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-success kostumbtn">
                                    <i class="bi bi-search me-2"></i> Cari Laporan
                                </button>
                                <a href="<?= BASEURL; ?>/Transaksi/LapTransaksi/cetaklaptransaksi?tgl_awal_laptransaksi=<?= $_POST['tgl_awal_laptransaksi'] ?? '' ?>&tgl_akhir_laptransaksi=<?= $_POST['tgl_akhir_laptransaksi'] ?? '' ?>"
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
                            <th class="text-center">NIP Karyawan</th>
                            <th class="text-center">Nama Karyawan</th>
                            <th class="text-center">Nomor Dokumen</th>
                            <th class="text-center">Tanggal Peminjaman</th>
                            <th class="text-center">Tanggal Rencana</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataTransaksi'] as $dataTransaksi):
                            if($dataTransaksi['status_peminjaman'] == "Menunggu Konfirmasi"){
                                $warnadot = "status-menunggu";
                            } else if($dataTransaksi['status_peminjaman'] == "Peminjaman Aktif"){
                                $warnadot = "status-aktif";
                            } else if($dataTransaksi['status_peminjaman'] == "Sudah Dikembalikan") {
                                $warnadot = "status-kembali";
                            } else if($dataTransaksi['status_peminjaman'] == "Diterima"){
                                $warnadot = "status-diapprove";
                            } else if($dataTransaksi['status_peminjaman'] == "Ditolak"){
                                $warnadot = "status-ditolak";
                            } else{
                                $warnadot = "status-lainnya";
                            }
                            ?>
                            <tr class="text-center">
                                <td><?= $No; ?></td>
                                <td><?= $dataTransaksi['nip_karyawan'] ;?></td>
                                <td><?= $dataTransaksi['nama_depan_karyawan'] ;?> <?= $dataTransaksi['nama_belakang_karyawan'] ;?></td>
                                <td><?= $dataTransaksi['nomor_dokumen'] ;?></td>
                                <td><?= FormatDate($dataTransaksi['tgl_peminjaman']) ;?></td>
                                <td><?= FormatDate($dataTransaksi['tgl_rencana_pengembalian']) ;?></td>
                                <td>
                                    <div class="status-peminjaman <?= $warnadot; ?>">
                                        <span class="status-dot"></span>
                                        <?= $dataTransaksi['status_peminjaman']; ?>
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
    <!--END Bagian Konten CRUD-->
</div>
