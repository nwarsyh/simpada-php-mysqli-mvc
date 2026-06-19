<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.19
 */
class Profil extends Controller
{
    protected $ProfilService; /**ini manggil service karyawan*/
    public function __construct()
    {
        parent::__construct();
        $this->ProfilService = new ProfilService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Profil | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulProfil'] = $this->model('Profil/ProfilModel')->GetJudulProfil();
        $this->view('templates/header', $dataSimpanPinjam);
        $this->view('templates/sidebar', $dataSimpanPinjam);
        $this->view('profil/index', $dataSimpanPinjam);
        $this->view('templates/footer', $dataSimpanPinjam);
    }
    public function updateProfil()
    {
        $ProfilValidasi = new Validasi();
        $ProfilValidasi->validasi($_POST,
            ProfileRequest::updateteRequestProfil(),
            ProfileRequest::attributesRequestProfil());
        if ($ProfilValidasi->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $ProfilValidasi->firstError(), 'error');
            header('Location: ' . BASEURL . '/Profil');
            exit;

        }
        $updateProfil = $this->ProfilService->updateProfilService($_POST);
        Flasher::setFlasherToast(strtoupper(
                $updateProfil['type'])  . ' !!!',
            $updateProfil['kategori'],
            $updateProfil['message'],
            $updateProfil['type']);
        header('Location: ' . BASEURL . '/Profil');
        exit;
    }
    public function updatePassword()
    {
        $ValidasiPassword = new Validasi();
        $ValidasiPassword->validasi($_POST,
            ProfileRequest::updateRequestPassword(),
            ProfileRequest::attributesRequestPassword());
//        var_dump(($ValidasiSignIn));
        if ($ValidasiPassword->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $ValidasiPassword->firstError(), 'error');
            header('Location: ' . BASEURL . '/Profil');
            exit;
        }
        $updatePassword = $this->ProfilService->updatePasswordService($_POST);
        if ($updatePassword['status']) {
            /** session_destroy();
            menghapus: $_SESSION termasuk flash message, flash tidak muncul.*/

            session_destroy();
            Flasher::setFlasherToast(strtoupper(
                    $updatePassword['type']) . ' !!!',
                $updatePassword['kategori'],
                $updatePassword['message'],
                $updatePassword['type']);
            header('Location: ' . BASEURL . '/SignIn');
            exit;
        }
        Flasher::setFlasherToast(strtoupper(
                $updatePassword['type']) . ' !!!',
            $updatePassword['kategori'],
            $updatePassword['message'],
            $updatePassword['type']);
        header('Location: ' . BASEURL . '/Profil');
        exit;

    }
}