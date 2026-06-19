<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 18.50
 */
class Departemen extends Controller
{
    protected $DepartemenService; /**ini manggil service karyawan*/
    public function __construct()
    {
        /*parent::__construct(); dipakai jika __construct(); lebih dari satu
        untuk kasus ini karena controlller parent dari BaseContoller
        dan BaseController Punya __construct(); Global Data*/
        parent::__construct();
        $this->DepartemenService = new DepartemenService();
    }
    public function index()
    {
        $dataSimpanPinjam['customJs'] = ['departemenmaster.js'];
        $dataSimpanPinjam['JudulWeb'] = 'Departemen | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulDepartemen'] = $this->model('Admin/DepartemenModel')->GetJudulMasterDepartemen();
        $dataSimpanPinjam['dataDepartemen'] = $this->model('Admin/DepartemenModel')->panggilDataDepartemen();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/departemen/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function createDepartemen()
    {
        $DepartemenValidasi = new Validasi();
        $DepartemenValidasi->validasi($_POST,
            DepartemenRequest::createRequestDepartemen(),
            DepartemenRequest::attributesRequestDepartemen());
        if ($DepartemenValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $DepartemenValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Departemen');
            exit;

        }
        $createDepartemen = $this->DepartemenService->createDepartemenService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $createDepartemen['type'])  . ' !!!',
            $createDepartemen['kategori'],
            $createDepartemen['message'],
            $createDepartemen['type']);
        header('Location: ' . BASEURL . '/Admin/Departemen');
        exit;
    }
    public function updateDepartemen()
    {
        $DepartemenValidasi = new Validasi();
        $DepartemenValidasi->validasi($_POST,
            DepartemenRequest::updateRequestDepartemen(),
            DepartemenRequest::attributesRequestDepartemen());
        if ($DepartemenValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $DepartemenValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Departemen');
            exit;
        }

        $updateDepartemen = $this->DepartemenService->updateDepartemenService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateDepartemen['type'])  . ' !!!',
            $updateDepartemen['kategori'],
            $updateDepartemen['message'],
            $updateDepartemen['type']);
        header('Location: ' . BASEURL . '/Admin/Departemen');
        exit;
    }
    public function deleteDepartemen($id_departemen)
    {
        $deleteDepartemen = $this->DepartemenService->deleteDepartemenService($id_departemen);
        Flasher::setFlasherToast(strtoupper(
                $deleteDepartemen['type'])  . ' !!!',
            $deleteDepartemen['kategori'],
            $deleteDepartemen['message'],
            $deleteDepartemen['type']);
        header('Location: ' . BASEURL . '/Admin/Departemen');
        exit;
    }
}