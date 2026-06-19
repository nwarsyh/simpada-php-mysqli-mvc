<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/06/2026
 * Time: 20.25
 */
class LapDokumen extends Controller
{

    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulLapDokumen'] = $this->model('Dokumen/LapDokumenModel')->GetJudulLapDokumen();
        $dataSimpanPinjam['dataLaporanDokumen'] = $this->model('Dokumen/LapDokumenModel')->panggilDataLaporanAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TglAwal = $_POST['tgl_awal_lapdokumen'];
            $TglAkhir = $_POST['tgl_akhir_lapdokumen'];
            // VALIDASI
            if ($TglAwal > $TglAkhir) {
                Flasher::setFlasherToast('Gagal', 'Tanggal Awal >', 'Tanggal Akhir', 'error');
                header('Location: ' . BASEURL . '/Dokumen/LapDokumen');
                exit;
            }
            $dataSimpanPinjam['dataLaporanDokumen'] = $this->model('Dokumen/LapDokumenModel')->panggilDataLaporanDokumen($TglAwal, $TglAkhir);
        }
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('dokumen/laporan/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function cetaklaporandokumen()
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

        $TglAwal = $_GET['tgl_awal_lapdokumen'] ?? null;
        $TglAkhir = $_GET['tgl_akhir_lapdokumen'] ?? null;
        if ($TglAwal && $TglAkhir) {
            $dataSimpanPinjam['dataLaporanDokumen'] = $this->model('Dokumen/LapDokumenModel')->panggilDataLaporanDokumen($TglAwal, $TglAkhir);
        }else{
            // var_dump($dataSimpanPinjam['dataLaporanDokumen']);
//            var_dump($TglAwal);
//            var_dump($TglAkhir);
            Flasher::setFlasherToast('Untuk Cetak', 'Laporan', 'Filter Telebih Dahulu', 'error');
            header('Location: ' . BASEURL . '/Dokumen/LapDokumen');
            exit;

        }
        $this->view('dokumen/laporan/cetaklaporandokumen', $dataSimpanPinjam);

    }
}