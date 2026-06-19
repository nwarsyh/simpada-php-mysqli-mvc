<?php
class LapPeminjaman extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['customJs'] = ['caridokumenmaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Laporan Peminjaman';
        $dataSimpanPinjam['SubJudulLapPeminjaman'] = $this->model('Peminjaman/LapPeminjamanModel')->GetJudulLapPeminjaman();
        $karyawanInLogin = $this->GlobalData['userAktifNow']['id_karyawan'];
        $dataSimpanPinjam['dataLaporanPeminjaman'] = $this->model('Peminjaman/PeminjamanModel')->panggilDataPeminjaman($karyawanInLogin);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TglAwal = $_POST['tgl_awal_lappeminajaman'];
            $TglAkhir = $_POST['tgl_awal_akhirpeminajaman'];
            if ($TglAwal > $TglAkhir) {
                Flasher::setFlasherToast('Gagal', 'Tanggal Awal >', 'Tanggal Akhir', 'error');
                header('Location: ' . BASEURL . '/Peminjaman/LapPeminjaman');
                exit;
            }
            $dataSimpanPinjam['dataLaporanPeminjaman'] = $this->model('Peminjaman/LapPeminjamanModel')->panggilDataLaporanPeminjaman($karyawanInLogin, $TglAwal, $TglAkhir);
        }
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('peminjaman/laporan/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function cetaklaporanpeminjaman()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Cetak Laporan Peminjaman';
        $karyawanInLogin = $this->GlobalData['userAktifNow']['id_karyawan'];
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
        $TglAwal = $_GET['tgl_awal_lappeminajaman'] ?? null;
        $TglAkhir = $_GET['tgl_awal_akhirpeminajaman'] ?? null;
        if ($TglAwal && $TglAkhir) {
            $dataSimpanPinjam['dataLaporanPeminjaman'] = $this->model('Peminjaman/LapPeminjamanModel')->panggilDataLaporanPeminjaman($karyawanInLogin, $TglAwal, $TglAkhir);
        }else{
            Flasher::setFlasherToast('Untuk Cetak', 'Laporan', 'Filter Telebih Dahulu', 'error');
            header('Location: ' . BASEURL . '/Dokumen/LapDokumen');
            exit;
        }
        $this->view('peminjaman/laporan/cetaklaporanpeminjaman', $dataSimpanPinjam);
    }
}