<?php
class SignIn extends Controller
{
    public function index()
    {
        $dataSimpanPinjam['JudulWeb'] = 'SIMPADA | Login';
        $dataSimpanPinjam['SubJudulSignIn'] = $this->model('SignIn/SignInModel')->GetJudulSignIn();
        $this->view('signin/index', $dataSimpanPinjam);
    }
    public function doSignInKaryawan()
    {
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
            Flasher::setFlasherToast('Gagal!', 'Gagal!', 'Username atau Password salah.', 'error');
            header('Location: ' . BASEURL . '/SignIn');
            exit;
        }
    }
    public function dologout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/signin');
        exit;
    }
}