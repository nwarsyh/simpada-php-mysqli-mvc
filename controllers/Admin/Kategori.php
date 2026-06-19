<?php
class Kategori extends Controller
{
    protected $KategoriService;
    public function __construct()
    {
        parent::__construct();
        $this->KategoriService = new KategoriService();
    }
    public function index()
    {
        $dataSimpanPinjam['customJs'] = ['kategorimaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Master Kategori';
        $dataSimpanPinjam['SubJudulKategori'] = $this->model('Admin/KategoriModel')->GetJudulMasterKategori();
        $dataSimpanPinjam['dataKategori'] = $this->model('Admin/KategoriModel')->panggilDataKategori();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/kategori/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function createKategori()
    {
        $KategoriValidasi = new Validasi();
        $KategoriValidasi->validasi($_POST,
            KategoriRequest::createRequestKategori(),
            KategoriRequest::attributesRequestKategori());
        if ($KategoriValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $KategoriValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Kategori');
            exit;
        }
        $createKategori = $this->KategoriService->createKategoriService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createKategori['type'])  . ' !!!',
            $createKategori['kategori'],
            $createKategori['message'],
            $createKategori['type']);
        header('Location: ' . BASEURL . '/Admin/Kategori');
        exit;
    }
    public function updateKategori()
    {
        $KategoriValidasi = new Validasi();
        $KategoriValidasi->validasi($_POST,
            KategoriRequest::updateRequestKategori(),
            KategoriRequest::attributesRequestKategori());
        if ($KategoriValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $KategoriValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Kategori');
            exit;
        }
        $updateKategori = $this->KategoriService->updateKategoriService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateKategori['type'])  . ' !!!',
            $updateKategori['kategori'],
            $updateKategori['message'],
            $updateKategori['type']);
        header('Location: ' . BASEURL . '/Admin/Kategori');
        exit;
    }
    public function deleteKategori($id_kategori)
    {
        $deleteKategori = $this->KategoriService->deleteKategoriService($id_kategori);
        Flasher::setFlasherToast(strtoupper(
                $deleteKategori['type'])  . ' !!!',
            $deleteKategori['kategori'],
            $deleteKategori['message'],
            $deleteKategori['type']);
        header('Location: ' . BASEURL . '/Admin/Kategori');
        exit;
    }
}