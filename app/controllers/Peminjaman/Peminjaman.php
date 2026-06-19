<?php
class Peminjaman extends Controller
{
    protected $PeminjamanService;
    public function __construct()
    {
        parent::__construct();
        $this->PeminjamanService = new PeminjamanService();
    }
    public function index()
    {
        $dataSimpanPinjam['customJs'] = ['caridokumenmaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Laman Peminjaman';
        $dataSimpanPinjam['SubJudulPeminjaman'] = $this->model('Peminjaman/PeminjamanModel')->GetJudulPeminjaman();
        $karyawanInLogin = $this->GlobalData['userAktifNow']['id_karyawan'];
        $dataSimpanPinjam['dataPeminjaman'] = $this->model('Peminjaman/PeminjamanModel')->panggilDataPeminjaman($karyawanInLogin);
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('peminjaman/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function cariDokumen() {
        $NomorDokumen = $_GET['pilihDokumen'] ?? '';
        header('Content-Type: application/json');
        $dataSimpanPinjam = $this->model('Peminjaman/PeminjamanModel')->cariDataDokumen($NomorDokumen);
        if (!$dataSimpanPinjam) {
            echo json_encode(['debug' => 'Query jalan tapi kosong']);
            return;
        }
        echo json_encode($dataSimpanPinjam);
    }
    public function createPeminjaman()
    {
        $PeminjamanValidasi = new Validasi();
        $PeminjamanValidasi->validasi($_POST,
            PeminjamanRequest::createRequestLokasi(),
            PeminjamanRequest::attributesRequestLokasi());
        if ($PeminjamanValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $PeminjamanValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Peminjaman');
            exit;
        }
        $createPeminjaman = $this->PeminjamanService->createPeminjamanService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createPeminjaman['type'])  . ' !!!',
            $createPeminjaman['kategori'],
            $createPeminjaman['message'],
            $createPeminjaman['type']);
        header('Location: ' . BASEURL . '/Peminjaman');
        exit;
    }
    public function deletePeminjaman($id_peminjaman)
    {
        $deletePeminjaman = $this->PeminjamanService->deletePeminjamanService($id_peminjaman);
        Flasher::setFlasherToast(strtoupper(
                $deletePeminjaman['type'])  . ' !!!',
            $deletePeminjaman['kategori'],
            $deletePeminjaman['message'],
            $deletePeminjaman['type']);
        header('Location: ' . BASEURL . '/Peminjaman');
        exit;
    }
    public function cetakInvoice($id_peninjaman)
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Cetak Invoice Peminjaman';
        $karyawanInLogin = $this->GlobalData['userAktifNow']['id_karyawan'];
        $dataSimpanPinjam['dataInvoice'] = $this->model('Peminjaman/PeminjamanModel')->panggilDetaiLLaporan($id_peninjaman);
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
        $this->view('peminjaman/laporan/cetakinvoice', $dataSimpanPinjam);
    }
}
