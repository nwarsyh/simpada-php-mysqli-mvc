<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 18.51
 */
class Lokasi extends Controller
{
    protected $LokasiService; /**ini manggil service karyawan*/
    public function __construct()
    {
        /*parent::__construct(); dipakai jika __construct(); lebih dari satu
        untuk kasus ini karena controlller parent dari BaseContoller
        dan BaseController Punya __construct(); Global Data*/
        parent::__construct();
        $this->LokasiService = new LokasiService();
    }
    public function index()
    {
        $dataSimpanPinjam['customJs'] = ['lokasimaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'Lokasi | Simpan Pinjam Dokumen';
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