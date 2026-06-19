<?php
class Identitas extends Controller
{
    protected $IdentitasService;
    public function __construct()
    {
        parent::__construct();
        $this->IdentitasService = new IdentitasService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Identitas Aplikasi';
        $dataSimpanPinjam['customJs'] = ['identitymaster.js'];
        $dataSimpanPinjam['SubJudulIdentitas'] = $this->model('Identitas/IdentitasModel')->GetJudulIdentitas();
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
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('identitas/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
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