<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 08/06/2026
 * Time: 16.59
 */
class SignInService
{
    protected $SignInModel;
    public function __construct()
    {
        $this->SignInModel = new SignInModel();
    }
    public function createServiceRegister($createRegister)
    {
        $Password = $_POST['password_awal'];
        $PasswordKonfirmasi  = $_POST['password_ulang'];
        if ($Password !== $PasswordKonfirmasi) {
            return [
                'status' => false,
                'kategori' => 'Password Baru',
                'message' => 'Tidak Sesuai',
                'type' => 'error'
            ];
        }
        $createServiceRegister = $this->SignInModel->tambahRegistrasiUsers($createRegister);
        if (!$createServiceRegister) {
            return [
                'status' => false,
                'kategori' => 'Data Account',
                'message' => 'Gagal Disimpan',
                'type' => 'error'
            ];
        }
        return [
            'status' => true,
            'kategori' => 'Data Account',
            'message' => 'Berhasil Disimpan',
            'type' => 'success'
        ];
    }
}