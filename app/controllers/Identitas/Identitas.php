<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.19
 */
class Identitas extends Controller
{
    protected $IdentitasService; /**ini manggil service karyawan*/
    public function __construct()
    {
        parent::__construct();
        $this->IdentitasService = new IdentitasService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Identitas | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['customJs'] = ['identitymaster.js'];
        $dataSimpanPinjam['SubJudulIdentitas'] = $this->model('Identitas/IdentitasModel')->GetJudulIdentitas();
        $dataSimpanPinjam['dataIdentitas'] = $this->model('Identitas/IdentitasModel')->panggilDataIdentitas();
//        $dataSimpanPinjam['dataProvinsi']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataIdentitas']['provinsi_identitas']);
//        $dataSimpanPinjam['dataKabupaten']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataIdentitas']['kabkota_identitas']);
//        $dataSimpanPinjam['dataKecamatan']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataIdentitas']['kecamatan_identitas']);
//        $dataSimpanPinjam['dataKelurahan']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataIdentitas']['kelurahan_identitas']);

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
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('identitas/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    /*ini bagian ajax pilih wilayah*/
    public function panggilWilayahAjax()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $level = $_POST['level'];
            $idParent = isset($_POST['idParent']) ? $_POST['idParent'] : null;

            $dataSimpanPinjam = $this->model('Dokumen/DokumenModel')->panggilDataWilayah($level, $idParent);

            header('Content-Type: application/json');
            echo json_encode($dataSimpanPinjam);
        }
    }
    public function updateIdentitas()
    {
        $IdentitasValidasi = new Validasi();
        $IdentitasValidasi->validasi($_POST,
            IdentitasRequest::updateRequestIdentitas(),
            IdentitasRequest::attributeRequestIdentitas());
        if ($IdentitasValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $IdentitasValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Identitas');
            exit;

        }
        $updateIdentitas = $this->IdentitasService->updateIdentitasService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateIdentitas['type'])  . ' !!!',
            $updateIdentitas['kategori'],
            $updateIdentitas['message'],
            $updateIdentitas['type']);
        header('Location: ' . BASEURL . '/Identitas');
        exit;
    }
}