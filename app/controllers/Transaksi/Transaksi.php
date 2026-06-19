<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/06/2026
 * Time: 01.43
 */
class Transaksi extends Controller
{
    protected $TransaksiService; /**ini manggil service karyawan*/
    public function __construct()
    {
        /*parent::__construct(); dipakai jika __construct(); lebih dari satu
        untuk kasus ini karena controlller parent dari BaseContoller
        dan BaseController Punya __construct(); Global Data*/
        parent::__construct();
        $this->TransaksiService = new TransaksiService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Transaksi | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulTransaksi'] = $this->model('Transaksi/TransaksiModel')->GetJudulTransaksi();
        $dataSimpanPinjam['dataTransaksi'] = $this->model('Transaksi/TransaksiModel')->panggilDataTransaksi();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('transaksi/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function updateKonfirmasiTransaksi()
    {
        $TransaksiValidasi = new Validasi();
        $TransaksiValidasi->validasi($_POST,
            TransaksiRequest::updateRequestKonfirmasiTransaksi(),
            TransaksiRequest::attributesRequestKonfirmasiTransaksi());
        if ($TransaksiValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $TransaksiValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Transaksi');
            exit;
        }
        $updateKonfirmasiTransaksi = $this->TransaksiService->updateKonfirmasiTransaksiService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateKonfirmasiTransaksi['type'])  . ' !!!',
            $updateKonfirmasiTransaksi['kategori'],
            $updateKonfirmasiTransaksi['message'],
            $updateKonfirmasiTransaksi['type']);
        header('Location: ' . BASEURL . '/Transaksi');
        exit;
    }
    public function updateAktifTransaksi()
    {
        $TransaksiValidasi = new Validasi();
        $TransaksiValidasi->validasi($_POST,
            TransaksiRequest::updateRequestAktifTransaksi(),
            TransaksiRequest::attributesRequestAktifTransaksi());
        if ($TransaksiValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $TransaksiValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Transaksi');
            exit;
        }
        $updateAktifTransaksi = $this->TransaksiService->updateAktifTransaksiService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateAktifTransaksi['type'])  . ' !!!',
            $updateAktifTransaksi['kategori'],
            $updateAktifTransaksi['message'],
            $updateAktifTransaksi['type']);
        header('Location: ' . BASEURL . '/Transaksi');
        exit;
    }
}