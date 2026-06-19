<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12 col-lg-12 col-md-12">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulAdmin']; ?> Peminjaman</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-xl-3 col-md-6">
                            <div class="cardv4 border-cardv4-ungu">
                                <div class="cardv4-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-ungu mb-1 cardv4-content">
                                                Menunggu Konfirmasi
                                            </div>
                                            <div class="cardv4-angka mb-0"><?= $dataSimpanPinjam['totalMenungguKonfirmasi']; ?></div>
                                        </div>
                                        <div class="col-auto cardv4-icon text-ungu">
                                            <i class="bi bi-clipboard-minus-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="cardv4 border-cardv4-success">
                                <div class="cardv4-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-success mb-1 cardv4-content">
                                                Peminjaman Aktif
                                            </div>
                                            <div class="cardv4-angka mb-0"><?= $dataSimpanPinjam['totalPeminjamanAktif']; ?></div>
                                        </div>
                                        <div class="col-auto cardv4-icon text-success">
                                            <i class="bi bi-clipboard-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="cardv4 border-cardv4-warning">
                                <div class="cardv4-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-warning mb-1 cardv4-content">
                                                Peminjaman Selesai
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="cardv4-angka"><?= $dataSimpanPinjam['totalPeminjamanSelesai']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto cardv4-icon text-warning">
                                            <i class="bi bi-clipboard-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="cardv4 border-cardv4-pink">
                                <div class="cardv4-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-pink mb-1 cardv4-content">
                                                Total Peminjaman
                                            </div>
                                            <div class="cardv4-angka mb-0"><?= $dataSimpanPinjam['totalPeminjaman']; ?></div>
                                        </div>
                                        <div class="col-auto cardv4-icon text-pink">
                                            <i class="bi bi-clipboard-data-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 col-md-8">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"><?= $dataSimpanPinjam['SubJudulAdmin']; ?> Grafik Dokumen</h6>
                    <small>pebaiki label saat mode gelap</small>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <?php
                        /*var_dump($dataSimpanPinjam['dataGrafik']);*/
                        $labelGrafik = [];
                        $nilaiGrafik = [];
                        foreach ($dataSimpanPinjam['dataGrafik'] as $dataGrafik) :
                        $labelGrafik[] = $dataGrafik['status_dokumen'];
                        $nilaiGrafik[] = $dataGrafik['total_dokumen'];
                        ?>
                        <div class="chart-pie pt-4 d-flex justify-content-center">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-md-4">
            <div class="card mycard">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Judul -->
                    <h6 class="m-0 font-weight-bold"> <?= $dataSimpanPinjam['SubJudulAdmin']; ?> Total Data</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-lg-12 col-md-12">
                            <div class="info-box mb-2">
                                <span class="info-box-icon text-bg-pink shadow-sm">
                                    <i class="bi bi-file-bar-graph-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Dokumen</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['totalDokumen']; ?></span>
                                </div>
                            </div>
                            <div class="info-box mb-2">
                                <span class="info-box-icon text-bg-ungu shadow-sm">
                                    <i class="bi bi-bank2"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Departemen</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['totalDepartemen']; ?></span>
                                </div>
                            </div>
                            <div class="info-box mb-2">
                                <span class="info-box-icon text-bg-warning shadow-sm">
                                    <i class="bi bi-tags-fill text-white"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Kategori</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['totalKategori']; ?></span>
                                </div>
                            </div>
                            <div class="info-box mb-2">
                                <span class="info-box-icon text-bg-danger shadow-sm">
                                    <i class="bi bi-pin-map"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Lokasi</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['totalLokasi']; ?></span>
                                </div>
                            </div>
                            <div class="info-box mb-2">
                                <span class="info-box-icon text-bg-info shadow-sm">
                                    <i class="bi bi-person-lines-fill text-white"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Karyawan</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['totalKaryawan']; ?></span>
                                </div>
                            </div>
                            <div class="info-box mb-2">
                                <span class="info-box-icon text-bg-success shadow-sm">
                                    <i class="bi bi-people-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total User</span>
                                    <span class="info-box-number"><?= $dataSimpanPinjam['totalAccount']; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--ini bagian scrip js chart-->
<script src="<?= ASSET_URL; ?>/vendor/charts/chart.umd.min.js"></script>
<!--<script src="<?/*= ASSET_URL; */?>/mystyle/js/chart-pie-demo.js"></script>-->
<script>
    // Set default font dan warna
    Chart.defaults.font.family = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.color = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart").getContext("2d");
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?= json_encode($labelGrafik); ?>,
            datasets: [{
                data: <?= json_encode($nilaiGrafik); ?>,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            }],
        },
    });

</script>