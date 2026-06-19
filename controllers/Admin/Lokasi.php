<?php
class Lokasi extends Controller
{
    protected $LokasiService;
    public function __construct()
    {
        parent::__construct();
        $this->LokasiService = new LokasiService();
    }
    public function index()
    {
        $dataSimpanPinjam['customJs'] = ['lokasimaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Master Lokasi';
        $dataSimpanPinjam['SubJudulLokasi'] = $this->model('Admin/LokasiModel')->GetJudulMasterLokasi();
        $dataSimpanPinjam['dataLokasi'] = $this->model('Admin/LokasiModel')->panggilDataLokasi();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/lokasi/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function createLokasi()
    {
        $LokasiValidasi = new Validasi();
        $LokasiValidasi->validasi($_POST,
            LokasiRequest::createRequestLokasi(),
            LokasiRequest::attributesRequestLokasi());
        if ($LokasiValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $LokasiValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Lokasi');
            exit;
        }
        $createLokasi = $this->LokasiService->createLokasiService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createLokasi['type'])  . ' !!!',
            $createLokasi['kategori'],
            $createLokasi['message'],
            $createLokasi['type']);
        header('Location: ' . BASEURL . '/Admin/Lokasi');
        exit;
    }
    public function updateLokasi()
    {
        $LokasiValidasi = new Validasi();
        $LokasiValidasi->validasi($_POST,
            LokasiRequest::updateRequestLokasi(),
            LokasiRequest::attributesRequestLokasi());
        if ($LokasiValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $LokasiValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Lokasi');
            exit;
        }
        $updateLokasi = $this->LokasiService->updateLokasiService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateLokasi['type'])  . ' !!!',
            $updateLokasi['kategori'],
            $updateLokasi['message'],
            $updateLokasi['type']);
        header('Location: ' . BASEURL . '/Admin/Lokasi');
        exit;
    }
    public function deleteLokasi($id_lokasi)
    {
        $deleteLokasi = $this->LokasiService->deleteLokasiService($id_lokasi);
        Flasher::setFlasherToast(strtoupper(
                $deleteLokasi['type'])  . ' !!!',
            $deleteLokasi['kategori'],
            $deleteLokasi['message'],
            $deleteLokasi['type']);
        header('Location: ' . BASEURL . '/Admin/Lokasi');
        exit;
    }
}