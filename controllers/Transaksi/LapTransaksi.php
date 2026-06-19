<?php
class LapTransaksi extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Laporan Transaksi';
        $dataSimpanPinjam['SubJudulLapTransaksi'] = $this->model('Transaksi/LapTransaksiModel')->GetJudulLapTransaksi();
        $dataSimpanPinjam['dataTransaksi'] = $this->model('Transaksi/TransaksiModel')->panggilDataTransaksi();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TglAwal = $_POST['tgl_awal_laptransaksi'];
            $TglAkhir = $_POST['tgl_akhir_laptransaksi'];
            if ($TglAwal > $TglAkhir) {
                Flasher::setFlasherToast('Gagal', 'Tanggal Awal >', 'Tanggal Akhir', 'error');
                header('Location: ' . BASEURL . '/Transaksi/LapTransaksi');
                exit;
            }
            $dataSimpanPinjam['dataTransaksi'] = $this->model('Transaksi/LapTransaksiModel')->panggilDataLapTransaksi($TglAwal, $TglAkhir);
        }
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('transaksi/laporan/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function cetaklaptransaksi()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Cetak Laporan Transaksi';
        $dataSimpanPinjam['dataIdentitas'] = $this->model('Identitas/IdentitasModel')->panggilDataIdentitas();
        $dataSimpanPinjam['dataWilayah'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(2);
        if (!empty($dataSimpanPinjam['dataIdentitas']['provinsi_identitas'])) {
            $dataSimpanPinjam['dataKabupaten'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(5, $dataSimpanPinjam['dataIdentitas']['provinsi_identitas']);
        } else {
            $dataSimpanPinjam['dataKabupaten'] = [];
        }
        if (!empty($dataSimpanPinjam['dataIdentitas']['kabkota_identitas'])) {
            $dataSimpanPinjam['dataKecamatan'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(8, $dataSimpanPinjam['dataIdentitas']['kabkota_identitas']);
        } else {
            $dataSimpanPinjam['dataKecamatan'] = [];
        }
        if (!empty($dataSimpanPinjam['dataIdentitas']['kecamatan_identitas'])) {
            $dataSimpanPinjam['dataKelurahan'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(13, $dataSimpanPinjam['dataIdentitas']['kecamatan_identitas']);
        } else {
            $dataSimpanPinjam['dataKelurahan'] = [];
        }
        $TglAwal = $_GET['tgl_awal_laptransaksi'] ?? null;
        $TglAkhir = $_GET['tgl_akhir_laptransaksi'] ?? null;
        if ($TglAwal && $TglAkhir) {
            $dataSimpanPinjam['dataTransaksi'] = $this->model('Transaksi/LapTransaksiModel')->panggilDataLapTransaksi($TglAwal, $TglAkhir);
        }else{
            Flasher::setFlasherToast('Untuk Cetak', 'Laporan', 'Filter Telebih Dahulu', 'error');
            header('Location: ' . BASEURL . '/Transaksi/LapTransaksi');
            exit;
        }
        $this->view('transaksi/laporan/cetaklaptransaksi', $dataSimpanPinjam);
    }
}