<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/06/2026
 * Time: 02.06
 */
class Dokumen extends Controller
{
    protected $DokumenService; /**ini manggil service karyawan*/
    public function __construct()
    {
        /*parent::__construct(); dipakai jika __construct(); lebih dari satu
        untuk kasus ini karena controlller parent dari BaseContoller
        dan BaseController Punya __construct(); Global Data*/
        parent::__construct();
        $this->DokumenService = new DokumenService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulDokumen'] = $this->model('Dokumen/DokumenModel')->GetJudulDokumen();
        $dataSimpanPinjam['dataDokumen'] = $this->model('Dokumen/DokumenModel')->panggilDataDokumen();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('dokumen/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function tambahdokumen()
    {
        $dataSimpanPinjam['customJs'] = ['wilayahmaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulTambahDokumen'] = $this->model('Dokumen/DokumenModel')->GetJudulTambahDokumen();
        $dataSimpanPinjam['dataDepartemen'] = $this->model('Admin/DepartemenModel')->panggilDataDepartemen();
        $dataSimpanPinjam['dataKategori'] = $this->model('Admin/KategoriModel')->panggilDataKategori();
        $dataSimpanPinjam['dataLokasi'] = $this->model('Admin/LokasiModel')->panggilDataLokasi();
        $dataSimpanPinjam['dataWilayah'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(2);
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('dokumen/tambahdokumen', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function ubahdokumen($id_dokumen)
    {
        $dataSimpanPinjam['customJs'] = ['wilayahmaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulUbahDokumen'] = $this->model('Dokumen/DokumenModel')->GetJudulUbahDokumen();
        $dataSimpanPinjam['dataDokumenByID'] = $this->model('Dokumen/DokumenModel')->panggilDataDokumenByID($id_dokumen);
        $dataSimpanPinjam['dataDepartemen'] = $this->model('Admin/DepartemenModel')->panggilDataDepartemen();
        $dataSimpanPinjam['dataKategori'] = $this->model('Admin/KategoriModel')->panggilDataKategori();
        $dataSimpanPinjam['dataLokasi'] = $this->model('Admin/LokasiModel')->panggilDataLokasi();
        $dataSimpanPinjam['dataWilayah'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(2);
        // Kalau ada provinsi terpilih → load kabupaten
        if (!empty($dataSimpanPinjam['dataDokumenByID']['provinsi_dokumen'])) {
            $dataSimpanPinjam['dataKabupaten'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(5, $dataSimpanPinjam['dataDokumenByID']['provinsi_dokumen']);
        } else {
            $dataSimpanPinjam['dataKabupaten'] = [];
        }
        // Kalau ada kabupaten terpilih → load kecamatan
        if (!empty($dataSimpanPinjam['dataDokumenByID']['kabkota_dokumen'])) {
            $dataSimpanPinjam['dataKecamatan'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(8, $dataSimpanPinjam['dataDokumenByID']['kabkota_dokumen']);
        } else {
            $dataSimpanPinjam['dataKecamatan'] = [];
        }
        // Kalau ada kecamatan terpilih → load kelurahan
        if (!empty($dataSimpanPinjam['dataDokumenByID']['kec_dokumen'])) {
            $dataSimpanPinjam['dataKelurahan'] = $this->model('Dokumen/DokumenModel')->panggilDataWilayah(13, $dataSimpanPinjam['dataDokumenByID']['kec_dokumen']);
        } else {
            $dataSimpanPinjam['dataKelurahan'] = [];
        }
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('dokumen/ubahdokumen', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function detaildokumen($id_dokumen)
    {
        $dataSimpanPinjam['JudulWeb'] = 'Dokumen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulDetailDokumen'] = $this->model('Dokumen/DokumenModel')->GetJudulDetailDokumen();
        $dataSimpanPinjam['dataDokumenByID'] = $this->model('Dokumen/DokumenModel')->panggilDataDokumenByID($id_dokumen);

        $dataSimpanPinjam['dataProvinsi']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataDokumenByID']['provinsi_dokumen']);
        $dataSimpanPinjam['dataKabupaten']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataDokumenByID']['kabkota_dokumen']);
        $dataSimpanPinjam['dataKecamatan']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataDokumenByID']['kec_dokumen']);
        $dataSimpanPinjam['dataKelurahan']  = $this->model('Dokumen/DokumenModel')->panggilNamaWilayahSesuaiKode($dataSimpanPinjam['dataDokumenByID']['kel_dokumen']);

        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('dokumen/detaildokumen', $dataSimpanPinjam);
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
    public function createDokumen()
    {
        $DokumenValidasi = new Validasi();
        $DokumenValidasi->validasi($_POST,
            DokumenRequest::createRequestDokumen(),
            DokumenRequest::attributesRequestDokumen());
        if ($DokumenValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $DokumenValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Dokumen/tambahdokumen');
            exit;

        }
        $createDokumen = $this->DokumenService->createDokumenService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createDokumen['type'])  . ' !!!',
            $createDokumen['kategori'],
            $createDokumen['message'],
            $createDokumen['type']);
        header('Location: ' . BASEURL . '/Dokumen');
        exit;
    }
    public function updateDokumen()
    {
        $redirectLaman = $_POST['redirect_dokumen'];
        $DokumenValidasi = new Validasi();
        $DokumenValidasi->validasi($_POST,
            DokumenRequest::updateRequestDokumen(),
            DokumenRequest::attributesRequestDokumen());
        if ($DokumenValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $DokumenValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Dokumen/ubahdokumen/'. $redirectLaman);
            exit;

        }
        $updateDokumen = $this->DokumenService->updateDokumenService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateDokumen['type'])  . ' !!!',
            $updateDokumen['kategori'],
            $updateDokumen['message'],
            $updateDokumen['type']);
        header('Location: ' . BASEURL . '/Dokumen/ubahdokumen/' . $redirectLaman);
        exit;
    }
}