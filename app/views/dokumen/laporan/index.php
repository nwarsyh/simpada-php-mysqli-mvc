<div class="container-fluid mt-4">
    <!--START Bagian Konten CRUD-->
    <div class="row">
        <div class="col-md-12">
            <!--start bagian card general-->
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulLapDokumen']; ?></h6>
                </div>
                <form action="<?= BASEURL?>/Dokumen/LapDokumen/index" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3"><small>Note : Tanggal Awal Dan Tanggal Akhir Ditentukan Dari Tanggal Awal Dokumen</small></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_awal_lapdokumen" class="form-label">Pilih Tanggal Awal</label>
                                    <input id="tgl_awal_lapdokumen" name="tgl_awal_lapdokumen" required type="date" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tgl_akhir_lapdokumen" class="form-label">Pilih Tanggal Akhir</label>
                                    <input id="tgl_akhir_lapdokumen" name="tgl_akhir_lapdokumen" required type="date" class="form-control form-control-sm form-loginsatu">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-success kostumbtn">
                                    <i class="bi bi-search me-2"></i> Cari Laporan
                                </button>
                                <a href="<?= BASEURL; ?>/Dokumen/LapDokumen/cetaklaporandokumen?tgl_awal_lapdokumen=<?= $_POST['tgl_awal_lapdokumen'] ?? '' ?>&tgl_akhir_lapdokumen=<?= $_POST['tgl_akhir_lapdokumen'] ?? '' ?>"
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
                            <th class="text-center">Nama Dokumen</th>
                            <th class="text-center">Masa Retensi</th>
                            <th class="text-center">Status Dokumen</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $No = 1;
                        foreach ($dataSimpanPinjam['dataLaporanDokumen'] as $dataLapDokumen):
                            if($dataLapDokumen['status_dokumen'] == "Aktif"){
                                $warnadot = "status-dokumen-aktif";
                            } else if($dataLapDokumen['status_dokumen'] == "Tidak Aktif"){
                                $warnadot = "status-dokumen-tidakaktif";
                            } else if($dataLapDokumen['status_dokumen'] == "Dimusnahkan") {
                                $warnadot = "status-dokumen-dimusnahkan";
                            } else if($dataLapDokumen['status_dokumen'] == "Permanen"){
                                $warnadot = "status-dokumen-permanen";
                            } else{
                                $warnadot = "status-dokumen-lainnya";
                            }


                            if($dataLapDokumen['status_dokumen'] == "Aktif"){
                                $iconStatus = "bi bi-check"; $WarnaButton = 'bg-primary';
                            } else if($dataLapDokumen['status_dokumen'] == "Tidak Aktif"){
                                $iconStatus = "bi bi-x"; $WarnaButton = 'bg-danger';
                            } else if($dataLapDokumen['status_dokumen'] == "Permanen") {
                                $iconStatus = "bi bi-file-lock2"; $WarnaButton = 'bg-success';
                            } else if($dataLapDokumen['status_dokumen'] == "Dimusnahkan") {
                                $iconStatus = "bi bi-fire"; $WarnaButton = 'bg-warning';
                            } else{
                                $iconStatus = "bi bi-ban"; $WarnaButton = 'bg-info';
                            }
                            $TanggalAwal = new DateTime($dataLapDokumen['tgl_awal_dokumen']);
                            $TanggalAkhir = new DateTime($dataLapDokumen['tgl_retensi_dokumen']);
                            $MasaRestensi = $TanggalAwal->diff($TanggalAkhir)->y;
                            ?>
                            <tr class="text-center">
                                <td><?= $No; ?></td>
                                <td><?= $dataLapDokumen['provinsi_dokumen'] ;?></td>
                                <td>(<?= $dataLapDokumen['kode_dokumen'] ;?>) <?= $dataLapDokumen['nama_dokumen'] ;?></td>
                                <td>
                                    <?= FormatDate($dataLapDokumen['tgl_awal_dokumen']) ;?><br>
                                    s/d <?= FormatDate($dataLapDokumen['tgl_retensi_dokumen']) ;?><br>
                                    (<?= $MasaRestensi ;?> Tahun)
                                </td>
                                <td>
                                    <div class="status-peminjaman <?= $warnadot; ?>">
                                        <span class="status-dot"></span>
                                        <?= $dataLapDokumen['status_dokumen']; ?>
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
