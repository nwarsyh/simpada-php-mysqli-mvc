<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 18.50
 */
class Karyawan extends Controller
{
    protected $KaryawanService; /**ini manggil service karyawan*/
    public function __construct()
    {
        parent::__construct();
        $this->KaryawanService = new KaryawanService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Karyawan | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulKaryawan'] = $this->model('Admin/KaryawanModel')->GetJudulMasterKaryawan();
        $dataSimpanPinjam['dataKaryawan'] = $this->model('Admin/KaryawanModel')->panggilDataKaryawan();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/karyawan/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function tambahkaryawan()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Karyawan | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulTambahKaryawan'] = $this->model('Admin/KaryawanModel')->GetJudulMasterTambahKaryawan();
        $dataSimpanPinjam['dataDepartemen'] = $this->model('Admin/DepartemenModel')->panggilDataDepartemen();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/karyawan/tambahkaryawan', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function ubahkaryawan($id_karyawan)
    {
        $dataSimpanPinjam['JudulWeb'] = 'Karyawan | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulUbahKaryawan'] = $this->model('Admin/KaryawanModel')->GetJudulMasterUbahKaryawan();
        $dataSimpanPinjam['dataKaryawanByID'] = $this->model('Admin/KaryawanModel')->panggilDataKaryawanByID($id_karyawan);
        $dataSimpanPinjam['dataDepartemen'] = $this->model('Admin/DepartemenModel')->panggilDataDepartemen();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/karyawan/ubahkaryawan', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function detailkaryawan($id_karyawan)
    {
        $dataSimpanPinjam['JudulWeb'] = 'Karyawan | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulDetailKaryawan'] = $this->model('Admin/KaryawanModel')->GetJudulMasterDetailKaryawan();
        $dataSimpanPinjam['dataKaryawanByID'] = $this->model('Admin/KaryawanModel')->panggilDataKaryawanByID($id_karyawan);
        $dataSimpanPinjam['dataDepartemen'] = $this->model('Admin/DepartemenModel')->panggilDataDepartemen();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('admin/karyawan/detailkaryawan', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function createKaryawan()
    {
        $KaryawanValidasi = new Validasi();
        $KaryawanValidasi->validasi($_POST,
            KaryawanRequest::createRequestKaryawan(),
            KaryawanRequest::attributesRequestKaryawan());
        if ($KaryawanValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $KaryawanValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Karyawan/tambahkaryawan');
            exit;

        }
        $createKaryawan = $this->KaryawanService->createKaryawanService($_POST);
        if ($createKaryawan['status']){
            Flasher::setFlasherToast(strtoupper(
                    $createKaryawan['type'])  . ' !!!',
                $createKaryawan['kategori'],
                $createKaryawan['message'],
                $createKaryawan['type']);
            header('Location: ' . BASEURL . '/Admin/Karyawan');
            exit;
        }
        Flasher::setFlasherToast(strtoupper(
                $createKaryawan['type'])  . ' !!!',
            $createKaryawan['kategori'],
            $createKaryawan['message'],
            $createKaryawan['type']);
        header('Location: ' . BASEURL . '/Admin/Karyawan/tambahkaryawan');
        exit;
    }
    public function updateKaryawan()
    {
        $redirect = $_POST['redirect_id'];
        $KaryawanValidasi = new Validasi();
        $KaryawanValidasi->validasi($_POST,
            KaryawanRequest::updateRequestKaryawan(),
            KaryawanRequest::attributesRequestKaryawan());
        if ($KaryawanValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $KaryawanValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Admin/Karyawan//ubahkaryawan/'. $redirect);
            exit;

        }
        $updateKaryawan = $this->KaryawanService->updateKaryawanService($_POST);
        if ($updateKaryawan['status']){
            Flasher::setFlasherToast(strtoupper(
                    $updateKaryawan['type'])  . ' !!!',
                $updateKaryawan['kategori'],
                $updateKaryawan['message'],
                $updateKaryawan['type']);
            header('Location: ' . BASEURL . '/Admin/Karyawan/ubahkaryawan/'. $redirect);
            exit;
        }
        Flasher::setFlasherToast(strtoupper(
                $updateKaryawan['type'])  . ' !!!',
            $updateKaryawan['kategori'],
            $updateKaryawan['message'],
            $updateKaryawan['type']);
        header('Location: ' . BASEURL . '/Admin/Karyawan/ubahkaryawan/'. $redirect);
        exit;
    }
    public function deleteKaryawan($id_karyawan)
    {
        $deleteKaryawan = $this->KaryawanService->deleteKaryawanService($id_karyawan);
        Flasher::setFlasherToast(strtoupper(
                $deleteKaryawan['type'])  . ' !!!',
            $deleteKaryawan['kategori'],
            $deleteKaryawan['message'],
            $deleteKaryawan['type']);
        header('Location: ' . BASEURL . '/Admin/Karyawan');
        exit;
    }

}