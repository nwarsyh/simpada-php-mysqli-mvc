<?php
class ProfilService
{

    protected $ProfilModel;
    protected $SignInModel;
    public function __construct()
    {
        $this->ProfilModel = new ProfilModel();
        $this->SignInModel = new SignInModel();
    }
    public function updateProfilService($updateprofil)
    {
        $profilKaryawanLama = $_POST['profil_lama'];
        $profilKaryawanBaru = UpdateMedia('profil', 'public/media/profil', $profilKaryawanLama);
        if (!$profilKaryawanBaru['status']) {
            return [
                'status' => false,
                'kategori' => 'Data Profil',
                'message' => $profilKaryawanBaru['message'],
                'type' => 'error'

            ];
        }
        $updateprofil['profil'] = $profilKaryawanBaru['dokumen'];
        $createProfilService = $this->ProfilModel->ubahDataProfil($updateprofil);
        if ($createProfilService === false) {
            return [
                'status' => false,
                'kategori' => 'Data Profil',
                'message' => 'Gagal Diupdate',
                'type' => 'error'
            ];
        }
        if ($createProfilService === 0) {
            return [
                'status' => false,
                'kategori' => 'Data Profil',
                'message' => 'Tidak Ada Yang Diupdate',
                'type' => 'warning'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Profil',
            'message' => 'Berhasil Diupdate',
            'type' => 'success'
        ];
    }
    public function updatePasswordService($updatepassword)
    {
        $Username = $_SESSION['user_accounts'];
        $Authentication = $this->SignInModel->getSignInKaryawan($Username);
        $PasswordLama = trim($_POST['password_lama']);
        if (password_verify($PasswordLama, $Authentication['pass_accounts'])) {
            $Password = trim($_POST['password']);
            $KonfirmasiPassword = trim($_POST['password_confirm']);
            if ($Password !== $KonfirmasiPassword) {
                return [
                    'status' => false,
                    'kategori' => 'Konfirmasi Password',
                    'message' => 'Tidak Sesuai',
                    'type' => 'error'
                ];
            }
            $updatePasswordService = $this->ProfilModel->ubahDataPassword($updatepassword);
            if ($updatePasswordService === false) {
                return [
                    'status' => false,
                    'kategori' => 'Data Password',
                    'message' => 'Gagal Diupdate',
                    'type' => 'error'
                ];
            }
            if ($updatePasswordService === 0) {
                return [
                    'status' => false,
                    'kategori' => 'Data Password',
                    'message' => 'Tidak Ada Yang Diupdate',
                    'type' => 'warning'
                ];
            }
            return [
                'status' => true,
                'kategori' => 'Data Password',
                'message' => 'Berhasil Diupdate',
                'type' => 'success'
            ];
        } else {
            return [
                'status' => false,
                'kategori' => 'Password Baru dan',
                'message' => 'Password Lama Tidak Sesuai',
                'type' => 'warning'
            ];
        }
    }
}