<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/06/2026
 * Time: 19.06
 */
class LapTransaksi extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulLapTransaksi'] = $this->model('Transaksi/LapTransaksiModel')->GetJudulLapTransaksi();
        $dataSimpanPinjam['dataTransaksi'] = $this->model('Transaksi/TransaksiModel')->panggilDataTransaksi();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TglAwal = $_POST['tgl_awal_laptransaksi'];
            $TglAkhir = $_POST['tgl_akhir_laptransaksi'];
            // VALIDASI
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
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['dataIdentitas'] = $this->model('Identitas/IdentitasModel')->panggilDataIdentitas();
        $dataSimpanPinjam['dataWilayah'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(2);
        // Kalau ada provinsi terpilih → load kabupaten
        if (!empty($dataSimpanPinjam['dataIdentitas']['provinsi_identitas'])) {
            $dataSimpanPinjam['dataKabupaten'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(5, $dataSimpanPinjam['dataIdentitas']['provinsi_identitas']);
        } else {
            $dataSimpanPinjam['dataKabupaten'] = [];
        }
        // Kalau ada kabupaten terpilih → load kecamatan
        if (!empty($dataSimpanPinjam['dataIdentitas']['kabkota_identitas'])) {
            $dataSimpanPinjam['dataKecamatan'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(8, $dataSimpanPinjam['dataIdentitas']['kabkota_identitas']);
        } else {
            $dataSimpanPinjam['dataKecamatan'] = [];
        }
        // Kalau ada kecamatan terpilih → load kelurahan
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
            // var_dump($dataSimpanPinjam['dataLaporanDokumen']);
//            var_dump($TglAwal);
//            var_dump($TglAkhir);
            Flasher::setFlasherToast('Untuk Cetak', 'Laporan', 'Filter Telebih Dahulu', 'error');
            header('Location: ' . BASEURL . '/Transaksi/LapTransaksi');
            exit;

        }
        $this->view('transaksi/laporan/cetaklaptransaksi', $dataSimpanPinjam);
    }
}