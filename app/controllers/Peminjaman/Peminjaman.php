<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/06/2026
 * Time: 18.01
 */
class Peminjaman extends Controller
{
    protected $PeminjamanService; /**ini manggil service karyawan*/
    public function __construct()
    {
        /*parent::__construct(); dipakai jika __construct(); lebih dari satu
        untuk kasus ini karena controlller parent dari BaseContoller
        dan BaseController Punya __construct(); Global Data*/
        parent::__construct();
        $this->PeminjamanService = new PeminjamanService();
    }
    public function index()
    {

        $dataSimpanPinjam['customJs'] = ['caridokumenmaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
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

//        if (strlen($keyword) < 5) {
//            echo json_encode([]);
//            return;
//        }
        $dataSimpanPinjam = $this->model('Peminjaman/PeminjamanModel')->cariDataDokumen($NomorDokumen);
        // debug dulu
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
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $karyawanInLogin = $this->GlobalData['userAktifNow']['id_karyawan'];
        $dataSimpanPinjam['dataInvoice'] = $this->model('Peminjaman/PeminjamanModel')->panggilDetaiLLaporan($id_peninjaman);
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
        $this->view('peminjaman/laporan/cetakinvoice', $dataSimpanPinjam);
    }
}
