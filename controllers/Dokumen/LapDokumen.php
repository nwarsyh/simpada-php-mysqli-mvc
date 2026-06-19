<?php
class LapDokumen extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Laporan Arsip';
        $dataSimpanPinjam['SubJudulLapDokumen'] = $this->model('Dokumen/LapDokumenModel')->GetJudulLapDokumen();
        $dataSimpanPinjam['dataLaporanDokumen'] = $this->model('Dokumen/LapDokumenModel')->panggilDataLaporanAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TglAwal = $_POST['tgl_awal_lapdokumen'];
            $TglAkhir = $_POST['tgl_akhir_lapdokumen'];
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
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Cetak Lapoan Arsip';
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
        $TglAwal = $_GET['tgl_awal_lapdokumen'] ?? null;
        $TglAkhir = $_GET['tgl_akhir_lapdokumen'] ?? null;
        if ($TglAwal && $TglAkhir) {
            $dataSimpanPinjam['dataLaporanDokumen'] = $this->model('Dokumen/LapDokumenModel')->panggilDataLaporanDokumen($TglAwal, $TglAkhir);
        }else{
            Flasher::setFlasherToast('Untuk Cetak', 'Laporan', 'Filter Telebih Dahulu', 'error');
            header('Location: ' . BASEURL . '/Dokumen/LapDokumen');
            exit;
        }
        $this->view('dokumen/laporan/cetaklaporandokumen', $dataSimpanPinjam);
    }
}