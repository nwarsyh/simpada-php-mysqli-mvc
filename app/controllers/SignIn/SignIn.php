<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 01.19
 */
class SignIn extends Controller
{
    public function __construct()
    {
        $this->ProfilService = new ProfilService();
    }
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SignIn | Simpan Pinjam Dokumen';
        $dataSimpanPinjam['SubJudulSignIn'] = $this->model('SignIn/SignInModel')->GetJudulSignIn();
        $this->view('signin/index', $dataSimpanPinjam);
    }
    public function registerform()
    {
        $dataSimpanPinjam['JudulWeb'] = 'Registrasi | Simpan Pinjam Dokumen';
        $this->view('signin/registerform', $dataSimpanPinjam);
    }
    public function doRegistrasiKaryawan()
    {
        $ValidasiSignIn = new Validasi();
        $ValidasiSignIn->validasi($_POST, SignInRequest::createRequestRegister(), SignInRequest::attributesRequestRegister());
//        var_dump(($ValidasiSignIn));
        if ($ValidasiSignIn->hasErrors()) {
            Flasher::setFlasherToast('Mohon Maaf', 'Validasi', $ValidasiSignIn->firstError(), 'error');
            header('Location: ' . BASEURL . '/SignIn/registerform');
            exit;
        }
        $doRegisterKaryawan = $this->SignInService->createServiceRegister($_POST);
        Flasher::setFlasherToast(strtoupper(
                $doRegisterKaryawan['type']) . ' !!!',
            $doRegisterKaryawan['kategori'],
            $doRegisterKaryawan['message'],
            $doRegisterKaryawan['type']);
        header('Location: ' . BASEURL . '/SignIn');
        exit;
    }
    public function doSignInKaryawan()
    {
        // Cek apakah request berasal dari form (POST)
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/SignIn');
            exit;
        }
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        if (empty($Username) || empty($Password)) {
            Flasher::setFlasherToast('Gagal!', 'Username dan Password', 'Tidak Boleh Kosong.', 'error');
            header('Location: ' . BASEURL . '/SignIn');
            exit;
        }
        $doSignInKaryawan = $this->model('SignIn/SignInModel')->getSignInKaryawan($Username);
        if ($doSignInKaryawan && password_verify($Password, $doSignInKaryawan['pass_accounts'])) {
            $_SESSION['loginsistem'] = true;
            $_SESSION['id_accounts'] = $doSignInKaryawan['id_accounts'];
            $_SESSION['user_accounts'] = $doSignInKaryawan['user_accounts'];
            $_SESSION['id_karyawan'] = $doSignInKaryawan['id_karyawan'];
            $_SESSION['role_accounts'] = $doSignInKaryawan['role_accounts'];
            $_SESSION['nama_depan_karyawan'] = $doSignInKaryawan['nama_depan_karyawan'];
            $_SESSION['nama_belakang_karyawan'] = $doSignInKaryawan['nama_belakang_karyawan'];
            // Redirect sesuai role
            if ($doSignInKaryawan['role_accounts'] === 'Admin') {
                Flasher::setFlasherToast('Berhasil ', 'Selamat ', 'Datang ' . $_SESSION['nama_depan_karyawan']  .$_SESSION['nama_depan_karyawan'], 'success');
                header('Location: ' . BASEURL . '/Admin');
            } elseif ($doSignInKaryawan['role_accounts'] === 'Arsiparis') {
                Flasher::setFlasherToast('Berhasil ', 'Selamat ', 'Datang ' . $_SESSION['nama_depan_karyawan'] .$_SESSION['nama_depan_karyawan'], 'success');
                header('Location: ' . BASEURL . '/Arsiparis');
            } elseif ($doSignInKaryawan['role_accounts'] === 'Staff') {
                Flasher::setFlasherToast('Berhasil ', 'Selamat ', 'Datang ' . $_SESSION['nama_depan_karyawan'] .$_SESSION['nama_depan_karyawan'], 'success');
                header('Location: ' . BASEURL . '/Staff');
            } else {
                Flasher::setFlasherToast('Gagal!', 'Username Atau Password', ' Anda Tidak Sesuai.', 'error');
                header('Location: ' . BASEURL . '/SignIn');
            }
            exit;
        } else {
            // Ini bagian  handle login gagal
            Flasher::setFlasherToast('Gagal!', 'Gagal!', 'Username atau Password salah.', 'error');
            header('Location: ' . BASEURL . '/SignIn');
            exit;
        }
    }

    public function dologout()
    {
//        $_SESSION = [];
        session_destroy();
        header('Location: ' . BASEURL . '/signin');
        exit;
    }

}